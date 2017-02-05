<?php

class Cars {

    private $dataSource;
    private $data;
    private $outputData; //The filtered data

    function __construct($dataSource = '') {
        if ($dataSource) {
            $this->dataSource = $dataSource;
        } else {
            $this->dataSource = BASE_DIR.'/data/car.json';
        }
        $this->loadData();
    }

    function useAll() {
        $this->outputData = $this->data;
    }

    function useNone() {
        $this->outputData = array();
    }

    function filterData($parameters) {
        $fields = array_keys($parameters);
        $field = $fields[0];
        $value = $parameters[$field];
        $this->outputData = array();
        foreach ($this->data as $car) {
            if (strtoupper($car[$field]) == strtoupper($value)) {
                $this->outputData[] = $car;
            }
        }
    }
    
    function getJson() {
        return json_encode($this->outputData);
    }  

    private function loadData() {
        $data = json_decode(file_get_contents($this->dataSource), true);
        $this->data = $data['cars'];
        $this->outputData = $this->data;
    }


}
