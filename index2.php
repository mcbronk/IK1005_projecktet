<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


include_once './Model/WatchesTableGateWay.php';
$model = new WatchesTableGateWay();


//$queryArr = explode('/', urldecode($_SERVER['PATH_INFO']));


//Splittrar URL
$queryArray=explode("/",$_SERVER['QUERY_STRING']);

//Om klassen och metoden finns
if (method_exists($model,$queryArray[0])){
    //OM server behöver metoden post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //Hämtar och kolla metoden för add,update och delete
        switch ($queryArray[0]){
            //add metoden
            case 'addWatch':
                //Hämtar data
                $id = filter_var(trim($_POST['id']));
                $name = filter_var(trim($_POST['namn']));
                $brand = filter_var(trim($_POST['marke']));
                $category = filter_var(trim($_POST['kategori']));
                $desc = filter_var(trim($_POST['beskrivning']));
                $storage = filter_var(trim($_POST['lager']));
                $price = filter_var(trim($_POST['pris']));
                $pic = filter_var(trim($_POST['bildurl']));

                //Skickar data till metoden
                $model ->addWatch($id,$name,$brand,$category,$desc,$storage,$price,$pic);

                break;



            //Uppdatera metoden
            case 'updateWatch':
                $id = filter_var(trim($_POST['id']));
                $name = filter_var(trim($_POST['namn']));
                $brand = filter_var(trim($_POST['marke']));
                $category = filter_var(trim($_POST['kategori']));
                $desc = filter_var(trim($_POST['beskrivning']));
                $storage = filter_var(trim($_POST['lager']));
                $price = filter_var(trim($_POST['pris']));
                $pic = filter_var(trim($_POST['bildurl']));
                //Inhämtad data skickas till meotden
                $model ->updateWatch($id,$name,$brand,$category,$desc,$storage,$price,$pic);

                break;

                //ta bort metoden
            case 'deleteWatch':
                //Tar väck på ID
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
                echo json_encode($model ->getAllWatches());
                break;
        }
    }

}

?>