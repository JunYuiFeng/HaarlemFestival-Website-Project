<?php
class UserManagementService{
    function __construct($newuser){
        $this->user = $newuser;
    }
    public function getUser(){
        $repository = new UserManagement();
        $users = $repository->getAll();
        return $users;
    }

}

