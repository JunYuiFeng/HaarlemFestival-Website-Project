<?php
require_once __DIR__ . '/controller.php';
include_once("../services/ticketservice.php");

require  '../vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Mpdf\Mpdf;

class TicketController extends Controller
{
    private $ticketService;


    function __construct()
    {
        parent::__construct();
        $this->ticketService = new TicketService();
        header("Content-Type: application/json");
    }

    public function sendTickets()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $body = file_get_contents("php://input");
            $objects = json_decode($body);

            if (!isset($objects->tickets) || !isset($objects->email) || !isset($objects->tickets[0])) { // validating if array and user email was provided
                $this->respondWithError(400, "tickets array or user email was not provided.");
                exit();
            }
            $tickets = $objects->tickets;
            $email = $objects->email;

            foreach ($tickets as $ticket) { // validating if all needed fields exist
                if (!isset($ticket->event) || !isset($ticket->location) || !isset($ticket->date) || !isset($ticket->orderId)) {
                    $this->respondWithError(400, "ticket data is missing.");
                    exit();
                }
            }


            $attachments = array();
            foreach ($tickets as $ticket) {
                $pdfTicket = $this->generateTicket($ticket->event, $ticket->location, $ticket->date, $ticket->orderId);
                array_push($attachments, $pdfTicket);
            }

            if ($this->ticketService->sendTickets($email, $attachments))
                $this->respond("OK");
            else
                $this->respondWithCode(500, "Email could not be sent");
        }
    }

    private function generateTicket($event, $location, $date, $orderId)
    {
        $token = $this->ticketService->generateToken($orderId);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data("http://127.0.0.1/festival/validateticket?token=" . $token)
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
