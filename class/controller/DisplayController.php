<?php
include('Controller.php');

class DisplayController extends Controller {

    function all() {       
        $targetUrl = '/cars';
        include(VIEWS.'cars.phtml');
        $this->output();
    }

    function hondas() {
        if ($this->authenticateUser()) {
            $targetUrl = '/data-honda';
            include(VIEWS.'cars.phtml');
            $this->output();
        } 
    }

}
