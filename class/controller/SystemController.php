<?php
include('Controller.php');
class SystemController extends Controller {


    function errorPage() {
        include(BASE_DIR.'/views/404.phtml');
        $this->output();
    }
}
