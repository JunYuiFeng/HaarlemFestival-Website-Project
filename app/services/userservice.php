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

    public function getById($id): User
    {
        return $this->repository->getById($id);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function CreateUser($username, $email, $password, $userType)
    {
        return $this->repository->CreateUser($username, $email, $password, $userType);
    }

    public function updateUsernameAndEmail($username, $email, $id)
    {
        return $this->repository->updateUsernameAndEmail($username, $email, $id);
    }

    public function updateProfilePicture($profilePicture, $id)
    {
        return $this->repository->updateProfilePicture($profilePicture, $id);
    }

    public function updatePassword($password, $id)
    {
        return $this->repository->setNewPassword($password, $id);
    }

    public function editUserAsAdmin($id, $username, $email, $userType)
    {
        return $this->repository->editUserAsAdmin($id, $username, $email, $userType);
    }
    public function checkPassowrd($password)
    {

        return $this->repository->checkPassowrd($password);
    }

    public function sendConfirmationEmail(string $email, $username): bool
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


            $mail->addAddress($email, $username);     //Add a recipient

            $mail->Subject = 'Profile Information has been updated';
            $mail->Body    = "<p>Dear {$username}, <br> Your profile information has been updated.</p>";
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

        return $this->repository->editUser($username, $email, $password, $id);
    }
    public function deleteUser($id)
    {
        return $this->repository->deleteUser($id);
    }

    public function getByUsername($username): User
    {
        return $this->repository->getByUsername($username);
    }

    public function getByEmail($email): User
    {
        return $this->repository->getByEmail($email);
    }

    public function validateUsernameAndEmail($username, $email, $id = null)
    {
        if ($username == '' || $email == '')
            return "Please fill all the fields";

        if (!$this->checkEmailAvailability($email, $id))
            return "Email is already taken";

        if (!$this->checkUsernameAvailability($username, $id))
            return "Username is already taken";

        if (!(strlen($username) > 1 && strlen($username) < 30  && ctype_alnum($username)))
            return "Username can contain only letters and numbers";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return "Email is invalid";

        return TRUE;
    }

    public function validatePassword($password)
    {
        if (strlen($password) >= 6 && strlen($password) < 50) {
            return TRUE;
        } else {
            return "Password should be at least 6 characters and maximum 50";
        }
    }

    public function register(string $email, string $username, string $password): string
    {
        $users = $this->repository->getAll();
        $loginUser = NULL;

        foreach ($users as $user) {
            if ($email == $user->getEmail()) {
                return "Email already registered";
            }
            if ($username == $user->getUsername()) {
                return "Username already registered";
            }
        }
        if (strlen($username) > 1 && strlen($username) < 30  && ctype_alnum($username)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($password) >= 6 && strlen($password) < 50) {
                    $hasshedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $id = $this->repository->createUser($username, $email, $hasshedPassword, 1);
                    return $id;
                } else {
                    return "Password should be at least 6 characters and maximum 50";
                }
            } else {
                return "Email is invalid";
            }
        } else {
            return "Username can contain only letters and numbers";
        }

        return FALSE;
    }



    public function checkUsernameAvailability($username, $id = NULL): bool
    {
        $user = $this->repository->getByUsername($username);
        if ($user != null) {
            if ($id != NULL) {
                if ($user->getId() == $id) {
                    return TRUE;
                }
            }
            return FALSE;
        }
        return TRUE;
    }

    public function checkEmailAvailability($email, $id = NULL): bool
    {
        $user = $this->repository->getByEmail($email);
        if ($user != null) {
            if ($id != NULL) {
                if ($user->getId() == $id) {
                    return TRUE;
                }
            }
            return FALSE;
        }
        return TRUE;
    }
}
