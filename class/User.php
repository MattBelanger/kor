<?php

class User {

    function authenticate($user, $password) {
        if ($user == 'admin@teamkor.com' && $password == 'drive') {
            $this->saveUser($user);
            return true;
        }
        return false;
    }

    function logout() {
        $_SESSION['user'] = null;
    }

    function getName() {
        if (self::isLoggedIn()) {
            return $_SESSION['user']['username'];
        } else {
            return '';
        }
    }
    
    public static function isLoggedIn() {
        return (is_array($_SESSION['user']) && !is_null($_SESSION['user']['username']));
    }
    
    private function saveUser($username) {
        $_SESSION['user'] = array(
            'username' => $username,
            'time' => date('Y-m-d H:i:s'));
    }
}
