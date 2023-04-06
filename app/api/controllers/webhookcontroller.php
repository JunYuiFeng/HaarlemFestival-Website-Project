<?php
require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/../../services/cartservice.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include_once("../services/ticketservice.php");
include_once("../services/userservice.php");


require_once __DIR__ . '/controller.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Mpdf\Mpdf;


class WebHookController extends Controller
{
    private $orderService;
    private $cartService;
    private $ticketService;
    private $userService;
    private $items;



    function __construct()
    {
        parent::__construct();
        $this->orderService = new OrderService();
        $this->cartService = new CartService();
        $this->ticketService = new TicketService();
        $this->userService = new UserService();
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
            $this->items = $payment->metadata->items;

            /*
             * Update the order in the database.
             */
            $this->orderService->updateOrderStatus($orderId, $payment->status);

            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {

                $this->cartService->deleteCartItemsByUserId($payment->metadata->user_id);
                $customerEmail = $this->userService->getById($payment->metadata->user_id)->getEmail();
                $this->sendTickets($orderId, $customerEmail);

                /*
                 * The payment is paid and isn't refunded or charged back.
                 * At this point you'd probably want to start the process of delivering the product to the customer.
                 */
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
            } elseif ($payment->hasRefunds()) {
                /*
                 * The payment has been (partially) refunded.
                 * The status of the payment is still "paid"
                 */
            } elseif ($payment->hasChargebacks()) {
                /*
                 * The payment has been (partially) charged back.
                 * The status of the payment is still "paid"
                 */
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
    private function sendTickets($orderId, $customerEmail)
    {
        $danceTickets = $this->items->tickets;
        $reservations = $this->items->reservations;

        $tickets = array(); // Initialize an empty array to store the tickets


        foreach ($danceTickets as $danceTicket) {
            for ($i = 0; $i < $danceTicket->quantity; $i++) {
                $ticket = array(
                    "event" => $danceTicket->artist != '' ? $danceTicket->artist . ' | ' . $danceTicket->session : $danceTicket->session,
                    "location" => $danceTicket->venue == '' ? 'Dance Festival' : $danceTicket->venue,
                    "date" => $danceTicket->date,
                    "orderId" => $orderId
                );
                $tickets[] = $ticket;
            }
        }
        foreach ($reservations as $reservation) {
            $ticket = array(
                "event" => "Yummy Festival",
                "location" => $reservation->restaurant,
                "date" => $reservation->date . ' | ' . $reservation->session,
                "orderId" => $orderId
            );
            $tickets[] = $ticket;
        }
        $attachments = array();
        foreach ($tickets as $ticket) {
            $pdfTicket = $this->generateTicket($ticket['event'], $ticket['location'], $ticket['date'], $ticket['orderId']);
            array_push($attachments, $pdfTicket);
        }
        $this->ticketService->sendTickets($customerEmail, $attachments);
    }

    private function generateTicket($event, $location, $date, $orderId)
    {
        $token = $this->ticketService->generateToken($orderId);

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
