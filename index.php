<?php

include ('bootstrap.php');

$router = new Router($_GET['path']);
$router->go();

