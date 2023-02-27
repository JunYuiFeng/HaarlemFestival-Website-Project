<?php

include_once __DIR__ . "/../services/userManagement.php";

class user{
    function __construct($newuser){
        $this->user = $newuser;
    }
    public function getUser(){
        $repository = new UserManagement();
        $users = $repository->getAll();
        return $users;
    }

}

