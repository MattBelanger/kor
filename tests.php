<?php
ini_set('display_errors',2);
error_reporting(E_ALL &~ E_NOTICE);

require_once('simpletest/autorun.php');
include('bootstrap.php');

class UserTestCase extends UnitTestCase {

    function setUp() {
        $_SESSION['user'] = null;
    }
    function tearDown() {
        $_SESSION['user'] = null;
    }

    function testSuccessfulAuth() {
        $user = new User();

        $this->assertTrue($user->authenticate('admin@teamkor.com', 'drive'));
    }

    function testDeniedAuth() {
        $user = new User();

        $this->assertFalse($user->authenticate('admin@teamkor.com', 'notdrive'));
        $this->assertFalse($user->authenticate('admin', 'drive'));
        $this->assertFalse($user->authenticate('wronguser', 'wrongpass'));
    }

    function testIsLoggedIn() {
        $user = new User();

        $this->assertFalse(User::isLoggedIn());
        $this->assertTrue($user->authenticate('admin@teamkor.com', 'drive'));
        $this->assertTrue(User::isLoggedIn());
        $this->assertEqual($user->getName(), 'admin@teamkor.com');
    }

    function testLogout() {
        $user = new User();

        $this->assertFalse(User::isLoggedIn());
        $this->assertTrue($user->authenticate('admin@teamkor.com', 'drive'));
        $this->assertTrue(User::isLoggedIn());
        $user->logout();
        $this->assertFalse(User::isLoggedIn());
    }
}

class RouterTestCase extends UnitTestCase {

    function testLoginRouting() {
        $route = new Router('login');
        $this->assertEqual($route->getController(), 'user');
        $this->assertEqual($route->getAction(), 'loginPage');
    }

    function test404Routing() {
        $route = new Router('badurl');
        $this->assertEqual($route->getController(), 'system');
        $this->assertEqual($route->getAction(), 'errorPage');
    }
}

class CarsTestCase extends UnitTestCase {

    private $dataSource;

    function setUp() {
        $this->dataSource = BASE_DIR.'/data/test.json';
    }
    
    function testAll() {
        $cars = new Cars($this->dataSource);
        $cars->useAll();
        
        $output = json_decode($cars->getJson(), true);
        $this->assertIsA($output['cars'], 'array');
        $this->assertEqual(count($output['cars']), 3);
    }

    function testFilter() {
        $cars = new Cars($this->dataSource);

        $cars->useAll();
        
        $allCars = json_decode($cars->getJson(), true);

        $cars->filterData(array('make' => 'honda'));
        $output = json_decode($cars->getJson(), true);

        $this->assertIsA($output['cars'], 'array');
        $this->assertEqual(count($output['cars']), 1);
    }

    function testNone() {
        $cars = new Cars($this->dataSource);
        $cars->useNone();

        $output = json_decode($cars->getJson(), true);
        $this->assertIsA($output['cars'], 'array');
        $this->assertEqual(count($output['cars']), 0);
    }
        
}

?>
