<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include_once("../repositories/usersrepository.php");


class ResetPasswordService
{
    private $repository;

    function __construct()
    {
        $this->repository = new UsersRepository();
    }


    public function validateEmail(string $email): bool
    {
        $users = $this->repository->getAll();


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        }
        foreach ($users as $user) {
            if ($email == $user->getEmail()) {
                return TRUE;
            }
        }
        return FALSE;
    }
    public function sendLink(string $email): bool
    {
        $token = uniqid();
        $link = '<a href="http://127.0.0.1/myaccount/changepassword?token=' . $token . '" >Reset Password</a>';
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

            $mail->Subject = 'Reset Password';
            $mail->Body    = "<p?>We are very sorry you forgot your password. You can now reset your password with a link below. <br> We would recommend you to save 
            your password somewhere in safe place like notes or txt file.<br><br>" . $link . "</p>";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->send();
            //echo 'Message has been sent';
            $this->repository->setResetLinkToken($email, $token);
            return TRUE;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return FALSE;
        }
    }

    public function checkToken($token)
    {
        return $this->repository->getResetLinkToken($token);
    }

    public function setNewPassword($password, $id): bool
    {
        return $this->repository->setNewPassword($password, $id);
    }
}
