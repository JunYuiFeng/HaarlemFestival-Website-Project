<?php
class User
{
    private string $username;
    private string $email;
    private string $password;
    private string $userType;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function validate()
    {
        if ($this->username == 'admin' && $this->password == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of userType
     */ 
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set the value of userType
     *
     * @return  self
     */ 
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    public function createUser(){
        return $this->username;
    }

    public function getUser($username){
        return $this->username;
    }
    public function removeUser(){
        return $this->username;
    }
    public function updateUser(){
        return $this->username;
    }
}
