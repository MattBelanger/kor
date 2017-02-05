<?php
include('Controller.php');

class DisplayController extends Controller {

    function all() {       
        include(VIEWS.'cars.phtml');
        $this->output();
    }

    function hondas() {
        $this->autenticate();
    }

}
