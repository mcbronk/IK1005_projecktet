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

                $id = filter_var(trim($_POST['id']));
                $name = filter_var(trim($_POST['namn']));
                $brand = filter_var(trim($_POST['marke']));


                $category = filter_var(trim($_POST['kategori']));
                $price = filter_var(trim($_POST['pris']));
                $desc = filter_var(trim($_POST['beskrivning']));
                $storage = filter_var(trim($_POST['lager']));
                $pic = filter_var(trim($_POST['bildurl']));

                $model ->addWatch($id,$name,$brand,$category,$price,$desc,$storage,$pic);

                break;



            case 'updateWatch':
                $id = filter_var(trim($_POST['id']));
                $name = filter_var(trim($_POST['namn']));
                $brand = filter_var(trim($_POST['marke']));


                $category = filter_var(trim($_POST['kategori']));
                $price = filter_var(trim($_POST['pris']));
                $desc = filter_var(trim($_POST['beskrivning']));
                $storage = filter_var(trim($_POST['lager']));
                $pic = filter_var(trim($_POST['bildurl']));

                $model ->updateWatch($id,$name,$brand,$category,$price,$desc,$storage,$pic);

                break;


            case 'deleteWatch':

                $model ->deleteWatch($queryArray[1]);
                break;
        }
    }
    else {

        switch ($queryArray[0]){


            case 'getAllWatches':
                echo json_encode($model ->getAllWatches());
                break;

            case 'getWatchesById':
                echo json_encode($model ->getWatchesById($queryArray[1]));
                break;


            default:
                echo json_encode(getAllWatches());
                break;
        }
    }

}

?>