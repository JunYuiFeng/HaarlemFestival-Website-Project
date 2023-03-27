<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once __DIR__ . "/../repositories/usersrepository.php";
class UserService
{
    private $repository;
    public function __construct()
    {
        $this->repository = new UsersRepository();
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function CreateUser($username, $email, $password,$userType)
    {
        echo "service";
        return $this->repository->CreateUser($username, $email, $password,$userType);
    }
    public function editUserAsAdmin($username, $email, $id,$userType)
    {
        echo "service";
        return $this->repository->editUserAsAdmin($username, $email, $id, $userType);
    }
    public function checkPassowrd($password){
        
        return $this->repository->checkPassowrd($password);
    }
    
    public function sendLink(string $email): bool
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

            $mail->Subject = 'Update Profile';
            $mail->Body    = "<p> .... </p>";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->send();
            //echo 'Message has been sent';
            return TRUE;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return FALSE;
        }
    }

    public function editUser($username, $email, $password, $id)
    {
        // $otp = rand(100000, 999999);
        // $_SESSION['otp'] = $otp;
        // $_SESSION['mail'] = $email;
        // require __DIR__ . "/../phpmailer/PHPMailerAutoload.php";
        // $mail = new PHPMailer;

        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->Port = 587;
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = 'tls';

        // $mail->Username = "stevengrazius283@gmail.com";
        // $mail->Password = "TolakAngin";

        // $mail->setFrom('stevengrazius283', 'OTP Verification');
        // $mail->addAddress($email);

        // $mail->isHTML(true);
        // $mail->Subject = "Your verify code";
        // $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
        //             <br><br>
        //             <p>With regrads,</p>
        //             <b>Programming with Lam</b>
        //             https://www.youtube.com/channel/UCKRZp3mkvL1CBYKFIlxjDdg";

        // // if (!$mail->send()) {
        // //     
        // // }
        return $this->repository->editUser($username, $email, $password, $id);

    }
    public function deleteUser($id)
    {
        return $this->repository->deleteUser($id);
    }

    public function getByUsername($username)
    {
        return $this->repository->getByUsername($username);
    }

    public function getByEmail($email)
    {
        return $this->repository->getByEmail($email);
    }
}