<?php

include 'Controller.php';

$controller = new Controller();
$controller->doRequest($_SERVER['QUERY_STRING']);
?>