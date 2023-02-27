<?php
class User
{
    private $username;
    private $password;


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
}
