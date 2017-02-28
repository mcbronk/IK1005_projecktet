
<?php
include_once 'Controller/Controller.php';
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);

session_start();

function autoLoad($class_name)
{

    $file = './Controller/' . $class_name . '.php';


    if (file_exists($file)) {
        include $file;
    } else {
        $file = './Model/' . $class_name . '.php';
        if (file_exists($file)) {
            include $file;
        }

    }
}

$queryArray=explode("/",$_SERVER['QUERY_STRING']);

if(file_exists("./Controller/{$queryArray[0]}.php")){
    include_once "./Controller/{$queryArray[0]}.php";
    $cont = new $queryArray[0];
} else {
    include_once './Controller/Controller.php';
    $cont = new Controller();
    $cont ->goToFirstPage();
}


if(isset($queryArray[1]) && !isset($queryArray[2])){
    $cont -> {$queryArray[1]}();
}

else if (isset($queryArray[1]) && isset($queryArray[2])){
    $cont -> {$queryArray[1]} ($queryArray[2]);
}






spl_autoload_register('autoLoad');


?>