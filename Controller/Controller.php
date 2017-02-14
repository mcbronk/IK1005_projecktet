<?php
include_once './Model/WatchesTableGateWay.php';
include_once 'validationWatch.php';
include_once 'ViewHelper.php';


class Controller {
    private $arrayData;
    private $view;


    function __construct() {
        $this->arrayData = array();
        $this ->view = new ViewHelper();

    }



    public function goToFirstPage() { //Funktion för att gå till förrsta sidan.
        $model=new WatchesTableGateWay(); //Skapar upp ett objekt att WatchesTableGateWay
        $watches=$model->getAllWatches(); // anropar modellens metod getAllWatches för att hämta alla produkter från databasen. Spar resultatet till $watches.
        $dataArray=array('watch'=>$watches); // Skapar upp en array $dataArray och fyller den med $watches från ovan. namnger denna sedan till 'watches'.

        $this-> view -> display($dataArray,'homepage'); // Kör funtionen display och laddar vyn med, det sparade datat från getAllWatches och presenterar det i vyn homepage.php

    }


    // Metod för att hämta alla produkter
    public function getAllWatches() {
        $model=new WatchesTableGateWay();
        $watches=$model->getAllWatches();
        $dataArray=array('watch'=>$watches);

        $this-> view -> display($dataArray,'view');
    }



    //Metod för att hämta produkter baserat på ID:
    public function getWatchesById($id) {
        $model=new WatchesTableGateWay();
        $watches=$model->getWatchesById($id);
        $dataArray=array('watch'=>$watches);

        $this-> view -> display($dataArray,'productview');
    }



    //Metod för att hämta produkter baserat på dess kategori.
    public function getWatchesByCategory($category) {
        $model = new WatchesTableGateWay();
        $categoryProduct = $model -> getWatchesByCategory($category);
        $dataArray = array("watch" => $categoryProduct);

        $this-> view -> display($dataArray, 'view');
    }


    //Metod för sökning.
    public function getSearch() {

        $model = new WatchesTableGateWay();

        $categoryProduct = $model -> search();
        $dataArray = array("watch" => $categoryProduct);

        $this-> view -> display($dataArray, 'view');
    }












}




?>