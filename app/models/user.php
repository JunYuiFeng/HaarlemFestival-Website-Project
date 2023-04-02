<?php

class User implements \JsonSerializable
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $userType;
    private $resetLinkToken;
    private $registrationDate;


    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }


    //public function __construct($username, $password)
    //{
    //    $this->username = $username;
    //   $this->password = $password;
    //}

    // public function __construct($id, $username, $email, $password, $userType)
    // {
    //     $this->id = $id;
    //     $this->username = $username;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->userType = $userType;
    // }

    public function validate()
    {
        if ($this->username == 'admin' && $this->password == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUserType()
    {
         if($this->userType == 0){
             $this->userType = "admin";
         } else {
             $this->userType = "user";
        }
        return $this->userType;
    }

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set the value of registrationDate
     *
     * @return  self
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }
}