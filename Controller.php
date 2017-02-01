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

    public function goToFirstPage() {

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

        $this->display($dataArray,'./productview.php');
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


    public function getWatchesByCategory($category) {
        $model = new WatchesTableGateWay();
        $categoryProduct = $model -> getWatchesByCategory($category);
        $dataArray = array("watch" => $categoryProduct);

        $this -> display($dataArray, './view.php');
    }


}



$controller = new Controller();
$controller->doRequest($_SERVER['QUERY_STRING']);


?>