<?php
require_once __DIR__ . "/../repositories/usersrepository.php";
class UserService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }
    
    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function addUserAsAdmin($username, $email, $password,$userType)
    {
        echo "service";
        return $this->repository->createUserAdAdmin($username, $email, $password,$userType);
    }
    public function editUserAsAdmin($username, $email, $password, $id,$userType)
    {
        return $this->repository->editUserAsAdmin($username, $email, $password, $id, $userType);
    }
    public function editUser($username, $email, $password, $id)
    {
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['mail'] = $email;
        require __DIR__ . "/../phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = "stevengrazius283@gmail.com";
        $mail->Password = "TolakAngin";

        $mail->setFrom('stevengrazius283', 'OTP Verification');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Your verify code";
        $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Programming with Lam</b>
                    https://www.youtube.com/channel/UCKRZp3mkvL1CBYKFIlxjDdg";

        if (!$mail->send()) {
            ?>
            <script>
                alert("<?php echo "Register Failed, Invalid Email " ?>");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
            </script>
            <?php
        }
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
    
    public function editUserTest($username,$email,$id)
    {
        return $this->repository->editUserTest($username,$email,$id);
    }
}