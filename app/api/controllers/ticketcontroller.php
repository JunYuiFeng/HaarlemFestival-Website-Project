<?php
require_once __DIR__ . '/controller.php';
include_once("../services/ticketservice.php");

require  '../vendor/autoload.php';

class TicketController extends Controller
{
    private $ticketService;


    function __construct()
    {
        parent::__construct();
        $this->ticketService = new TicketService();
        header("Content-Type: application/json");
    }

    public function validate()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $ticketStatus = $this->ticketService->validateToken($token);
            $this->respond($ticketStatus);
        }
    }

    public function updateStatus()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $this->respond($this->ticketService->setTicketAsUsed($token));
        }
    }
}
