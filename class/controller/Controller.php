<?php

class Controller {

    function __construct() {
        ob_start();
    }

    function output() {
        ob_flush();
    }

    protected function authenticateUser() {
        if (!User::isLoggedIn()) {
            include(BASE_DIR.'/views/need_login.phtml');
            $this->output();
            return false;
        }
        return true;
    }
    
}
