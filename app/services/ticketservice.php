<?php
require '../vendor/autoload.php';
require_once __DIR__ . "/../repositories/tickettokenrepository.php";
require_once __DIR__ . '/../repositories/dancerepository.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class TicketService
{
    private $repository;
    private $danceRepository;


    function __construct()
    {
        $this->repository = new TicketTokenRepository();
        $this->danceRepository = new DanceRepository();
    }


    public function sendTickets(string $email, array $attachments): bool
    {
        $mail = new PHPMailer(false); //Create an instance; passing `true` enables exceptions
        try {
            //Server settings
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;                                         //Enable SMTP authentication
            $mail->Username   = 'haarlemfestival@sahibthecreator.com';                     //SMTP username
            $mail->Password   = 'WebProjectPassword1$';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

            //Recipients
            $mail->setFrom('haarlemfestival@sahibthecreator.com', 'Haarlem Festival');
            $name = substr($email, 0, strpos($email, '@'));

            $mail->addAddress($email, $name);     //Add a recipient

            for ($i = 0; $i < sizeof($attachments); $i++) {
                $mail->addStringAttachment($attachments[$i], "ticket{$i}.pdf");
            }


            $mail->Subject = 'Your Tickets';
            $mail->Body    = "<p><b>Dear " . $name . ", </b><br> Thank you for your purhcase for Haarlem Festival 2023! <br><br>Please see your tickets in attachments.</p>";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->send();

            return TRUE;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return FALSE;
        }
    }

    public function validateToken($token)
    {
        $ticketToken = $this->repository->getByToken($token);
        if ($ticketToken == null)
            return "Ticked does not exist!";

        if ($ticketToken->getIsUsed())
            return "Ticked has been scanned before!";

        if ($ticketToken->getIsUsed() == false)
            return "Ticket is valid!";
    }

    public function setTicketAsUsed($token)
    {
        return $this->repository->setUsed($token);
    }

    public function generateToken($orderItemId)
    {
        $ticketToken = new TicketToken();
        $ticketToken->setToken(bin2hex(random_bytes(32))); // Generating 64 characters long string for token
        $ticketToken->setOrderItemId($orderItemId);
        while (!$this->repository->create($ticketToken)) {
            // If it returns false, wait for a short time before trying again
            usleep(100000); // Wait for 0.1 seconds
        }
        return $ticketToken->getToken();
    }

    public function deductAvailableTickets($amountToDeduct, $ticketId)
    {
        $this->danceRepository->deductAvailableTickets($amountToDeduct, $ticketId);
    }
}
