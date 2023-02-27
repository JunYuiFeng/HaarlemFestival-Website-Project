<?php
require_once __DIR__ . "/../services/usermanagementservice.php";
require_once __DIR__ . "/../models/user.php";

class CmsController{    

    public function usermanagement(){
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
}
?>