<?php
require '../vendor/autoload.php';
require_once __DIR__ . '/../repositories/orderrepository.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class InvoiceService
{
    private $orderRepository;

    function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function sendInvoice($email, $attachment, $filename): bool
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

            $mail->addStringAttachment($attachment, $filename);

            $mail->Subject = 'Your Invoice';
            $mail->Body    = "<p><b>Dear " . $name . ", <br><br> Thank you for your purchase for Haarlem Festival 2023! <br><br>Please see your invoice in the attachment.</p>";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->send();

            return TRUE;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return FALSE;
        }
    }

    function updateInvoiceNr($orderId, $invoiceNr)
    {
        $this->orderRepository->updateInvoiceNr($orderId, $invoiceNr);
    }
}