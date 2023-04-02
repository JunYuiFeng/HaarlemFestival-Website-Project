<?php

class User implements \JsonSerializable
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $userType;
    private $resetLinkToken;
    private $profilePicture;
    private $registrationDate;
    private $masked_password;


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

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
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

    public function getPasswordAsStars()
    {
        $this->masked_password = "";
        foreach (str_split($this->password) as $char) {
            $this->masked_password .= "*";
        }
        return $this->masked_password;
    }



    /**
     * Get the value of userType
     */
    public function getUserType()
    {
        if ($this->userType == 0) {
            return "admin";
        } else if ($this->userType == 1) {
            return "user";
        } else if ($this->userType == 2) {
            return "employee";
        }
        return $this->userType; // in case if statements are false
    }

    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    public function getProfilePicture()
    {
        return $this->profilePicture;;
    }

    /**
     * Set the value of registrationDate
     *
     * @return  self
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
        return $this;
    }

    public function getResetLinkToken()
    {
        return $this->resetLinkToken;;
    }

    /**
     * Set the value of registrationDate
     *
     * @return  self
     */
    public function setResetLinkToken($resetLinkToken)
    {
        $this->resetLinkToken = $resetLinkToken;
        return $this;
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
