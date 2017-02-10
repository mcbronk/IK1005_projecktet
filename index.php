ini_set('display_errors', 1);
<?php
include_once 'Controller.php';



$controller = new Controller();
$controller->doRequest($_SERVER['QUERY_STRING']);

?>