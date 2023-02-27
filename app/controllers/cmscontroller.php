<?php
include_once __DIR__ . "/../services/userManagement.php";
include_once __DIR__ . "/../model/User.php";

class CmsController{    
    
    public function usermanagement(){
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
}
?>