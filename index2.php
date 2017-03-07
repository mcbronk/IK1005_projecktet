<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


include_once './Model/WatchesTableGateWay.php';
$model = new WatchesTableGateWay();


//$queryArr = explode('/', urldecode($_SERVER['PATH_INFO']));



$queryArray=explode("/",$_SERVER['QUERY_STRING']);

if (method_exists($model,$queryArray[0])){
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        switch ($queryArray[0]){
            case 'addWatch':

                break;

            case 'updateWatch':

        }
    }
    else {

        switch ($queryArray[0]){


            case 'getAllWatches':
                echo json_encode($model ->getAllWatches());
                break;

            case 'getWatchesById':
                echo json_encode($model ->getWatchesById($queryArray[1]));
            default:

                echo json_encode(getAllWatches());
        }
    }

}

?>