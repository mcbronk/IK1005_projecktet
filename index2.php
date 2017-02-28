<?php

include_once('Model/WatchesTableGateWay.php');


$queryArr = explode('/', urldecode($_SERVER['PATH_INFO']));


if (function_exists($queryArr[1])){

    switch ($queryArr[1]){

        case 'getAllWatchets':
            echo json_encode(getProdukt($queryArr[2]));
            break;
        case 'getAllWatches':
            echo json_encode(getAllWatches());
            break;
        case 'getNews':
            echo json_encode(getNews());
            break;
        case 'getProduktByBrand':
            echo json_encode(getProduktByBrand($queryArr[2],$queryArr[3]));
            break;

        default:

            echo json_encode(getAllProdukt());
    }
}

?>