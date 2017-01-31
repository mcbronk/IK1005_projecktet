<?php
include_once './WatchesTableGateWay.php';

class Controller {

    public function doRequest($queryString) {
        try {

            $queryarray=explode('/',$queryString);

            $this->$queryarray[0]($queryarray[1]);


        } catch (Exception $ex) {
            echo $ex->getMessage();
            die();

        }
    }


    public function getAllWatches() {
        $model=new WatchesTableGateWay();
        $watches=$model->getAllWatches();
        $dataArray=array('watch'=>$watches);

        $this->display($dataArray,'./view.php');
    }


    public function getWatchesById($id) {
        var_dump($id);
        $model=new WatchesTableGateWay();
        $watches=$model->getWatchesById($id);
        $dataArray=array('watch'=>$watches);

        $this->display($dataArray,'./view.php');
    }



    public function display($dataArray,$viewTemplate) {
        if(file_exists($viewTemplate)) {
            extract($dataArray);

            include_once ($viewTemplate);
        }
        else {
            throw new Exception('Finns ingen sådan template');
        }
    }


}

$controller = new Controller();
$controller->doRequest($_SERVER['QUERY_STRING']);


?>