<?php

function __autoload($className) { 
    if (file_exists(BASE_DIR.'/class/'.$className . '.php')) { 
        require_once BASE_DIR.'/class/'.$className . '.php'; 
        return true; 
    } else if (file_exists(BASE_DIR.'/class/controller/'.$className . '.php')) {
        require_once BASE_DIR.'/class/controller/'.$className . '.php'; 
        return true; 
    }
    return false; 
} 

