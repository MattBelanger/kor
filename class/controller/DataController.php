<?php

include ('Controller.php');

class DataController extends Controller {

    function all() {
        $cars = new Cars();
        $cars->useAll();
        echo $cars->getJson();
    }

    function filter($parameters) {
        $cars = new Cars();
        if ($this->authenticateUser(false)) {
            $cars->filterData($parameters);
        } else {
            $cars->useNone();
        }
        echo $cars->getJson();
    }

}
