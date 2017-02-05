<?php
include('Controller.php');

class UserController extends Controller {

    function loginPage() {
        if (!isset($_POST['formtoken'])) {
            include(VIEWS.'login_form.phtml');
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->authenticate($username, $password)) {
                include(VIEWS.'login_success.phtml');
            } else {
                $message = 'Invalid user name or password';
                include(VIEWS.'login_form.phtml');
            }
        }
        $this->output();
    }

    function logout() {
        $user = new User();
        $user->logout();
        
        $message = 'You have succesfully logged out';
        include(VIEWS.'login_form.phtml');
    }

}
