<?php
require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/../../services/cartservice.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include_once("../services/ticketservice.php");
include_once("../services/userservice.php");
require_once __DIR__ . '/../../services/sessionservice.php';
require_once __DIR__ . '/../../services/invoiceservice.php';


require_once __DIR__ . '/controller.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Mpdf\Mpdf;
use Ramsey\Uuid\Uuid;


class WebHookController extends Controller
{
    private $orderService;
    private $cartService;
    private $ticketService;
    private $userService;
    private $sessionService;
    private $items;
    private $totalAmount;
    private $VATAmount;
    private $reservationFee;
    private $subTotal;
    private $invoiceService;

    function __construct()
    {
        parent::__construct();
        $this->orderService = new OrderService();
        $this->cartService = new CartService();
        $this->ticketService = new TicketService();
        $this->userService = new UserService();
        $this->sessionService = new SessionService();
        $this->invoiceService = new InvoiceService();
    }

    function index()
    {

        try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey('test_vWU6vr3ypCg9NFQeuE5TbUBjMyv4FP');
            /*
             * Retrieve the payment's current state.
             */
            $payment = $mollie->payments->get(htmlspecialchars($_POST["id"]));

            $orderId = $payment->metadata->order_id;
            $customerName = $this->userService->getById($payment->metadata->user_id)->getUsername();
            $customerEmail = $this->userService->getById($payment->metadata->user_id)->getEmail();
            $this->items = $payment->metadata->items;
            $this->totalAmount = $payment->metadata->totalAmount;
            $this->VATAmount = $payment->metadata->VATAmount;
            $this->reservationFee = $payment->metadata->reservationFee;
            $this->subTotal = $payment->metadata->subTotal;

            // Update order in the database.
            $this->orderService->updateOrderStatus($orderId, $payment->status);

            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {

                $this->cartService->deleteCartItemsByUserId($payment->metadata->user_id);
                $this->sendInvoice($customerName, $customerEmail, $orderId);
                $this->sendTickets($orderId, $customerEmail);

            } elseif ($payment->isOpen()) {
                /*
                 * The payment is open.
                 */
            } elseif ($payment->isPending()) {
                /*
                 * The payment is pending.
                 */
            } elseif ($payment->isFailed()) {
                /*
                 * The payment has failed.
                 */
            } elseif ($payment->isExpired()) {
                /*
                 * The payment is expired.
                 */
            } elseif ($payment->isCanceled()) {
                /*
                 * The payment has been canceled.
                 */
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    private function generateInvoice($customerName, $customerEmail, $orderId)
    {
        $tickets = $this->items->tickets;
        $reservations = $this->items->reservations;
        $totalAmount = $this->totalAmount;
        $VATAmount = $this->VATAmount;
        $reservationFee = $this->reservationFee;
        $subTotal = $this->subTotal;

        $invoiceNr = Uuid::uuid4()->toString();

        ob_start();
        require_once __DIR__ . '/../../views/invoice.php';
        $html = ob_get_clean();
        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $filename = 'invoice-' . $invoiceNr . '.pdf';
        $pdfData = $mpdf->Output($filename, 'S');

        $this->invoiceService->updateInvoiceNr($orderId, $invoiceNr);

        // Save the PDF file to the invoices directory
        $filePath = __DIR__ . '/../../public/invoices/' . $filename;
        file_put_contents($filePath, $pdfData);

        // Return the path to the saved PDF file
        return [
            'filename' => $filename,
            'filePath' => $filePath,
            'pdfData' => $pdfData
        ];
    }

    private function sendInvoice($customerName, $customerEmail, $orderId)
    {
        $invoice = $this->generateInvoice($customerName, $customerEmail, $orderId);
        $pdfData = $invoice['pdfData'];
        $filename = $invoice['filename'];

        $this->invoiceService->sendInvoice($customerEmail, $pdfData, $filename);
    }

    private function sendTickets($orderId, $customerEmail)
    {
        $danceTickets = $this->items->tickets;
        $reservations = $this->items->reservations;

        $tickets = array(); // Initialize an empty array to store the tickets


        foreach ($danceTickets as $danceTicket) {
            $orderItemsItemId = $this->orderService->getOrderItemByOrderIdAndItemId($orderId, $danceTicket->id); // get orderitem id
            $this->ticketService->deductAvailableTickets($danceTicket->quantity, $danceTicket->id);
            for ($i = 0; $i < $danceTicket->quantity; $i++) {
                $ticket = array(
                    "event" => $danceTicket->artist != '' ? $danceTicket->artist . ' | ' . $danceTicket->session : $danceTicket->session,
                    "location" => $danceTicket->venue == '' ? 'Dance Festival' : $danceTicket->venue,
                    "date" => $danceTicket->date,
                    "orderItemId" => $orderItemsItemId['id']
                );
                $tickets[] = $ticket;
            }
        }
        foreach ($reservations as $reservation) {
            $orderItemsItemId = $this->orderService->getOrderItemByOrderIdAndItemId($orderId, $reservation->id);
            $this->sessionService->decreaseSeats($reservation->sessionId, $reservation->amountAbove12 + $reservation->amountUnderOr12);
            $ticket = array(
                "event" => "Yummy Festival",
                "location" => $reservation->restaurant,
                "date" => $reservation->date . ' | ' . $reservation->session,
                "orderItemId" => $orderItemsItemId['id'],
            );
            $tickets[] = $ticket;
        }
        $attachments = array();
        foreach ($tickets as $ticket) {
            $pdfTicket = $this->generateTicket($ticket['event'], $ticket['location'], $ticket['date'], $ticket['orderItemId']);
            array_push($attachments, $pdfTicket);
        }

        $this->ticketService->sendTickets($customerEmail, $attachments);
    }

    private function generateTicket($event, $location, $date, $orderItemId)
    {
        $token = $this->ticketService->generateToken($orderItemId);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($token)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText('Ticket 1')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        $dataUri = $result->getDataUri();

        ob_start();

        require __DIR__ . '/../../views/ticket.php';
        $html = ob_get_clean();

        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $pdfData = $mpdf->Output('', 'S');
        return $pdfData;
    }
}
