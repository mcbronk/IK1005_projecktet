<?php
include_once './Model/WatchesTableGateWay.php';
include_once 'ViewHelper.php';
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 2017-02-14
 * Time: 08:27
 */
session_start();
class admin
{

    private $user;
    private $psw;
    private $view;

    /**
     * admin constructor.
     */
    public function __construct()
    {
        $this ->view = new ViewHelper();
    }


    public function doLogin() { //Metod för adminlogin


        $validateForm = new validationWatch(); //Skapar ett objekt av validatewatch för att kunna göra formulärsvalideringar.
        $errormsg = $validateForm -> validateWatchForm(); // $validatewatch anropar metoden validateWatchForm och spar eventuella error i errormsg.


        if(count($errormsg) <= 0) { //FInns det error går vi till else, annars sätts $_SESSION['loggedin'] till TRUE och vi kör likt en vanlig function.

            $_SESSION['loggedin'] = TRUE;
            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this-> view ->display($dataArray, 'adminvy');
        } else {

            $this->arrayDataForView['postatdata']=$_POST; //Kom vi inte in. Spar vi det som skrivits in i formulären och skriver ut dom i inputboxarna igen.
            $this->arrayDataForView['errormessages']=$errormsg; // Spar felmeddelanded och visar dom sedan i vyn.


            $this-> view -> display($this -> arrayDataForView, 'loginForm'); // Laddar vyn loginForm med ata från $_POST och $errormsg.
        }


    }


    public function logOut() { //För att logga ut.

        $_SESSION['loggedin'] = FALSE; //Sätter loggedin till FALSE, på så sätt kan man inte utföra CRUD.
        $model = new WatchesTableGateWay();
        $watches = $model->getAllWatches(); //Resten likt ovanstående exempel.
        $dataArray = array('watch' => $watches);

        $this-> view -> display($dataArray, 'loginForm');



    }


    public function doAdmin() { //För att komma till adminSidan

        if($_SESSION['loggedin'] == TRUE) { //KOlla om $_SESSION är TRUE

            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this-> view -> display($dataArray, 'adminvy');  //LIkt ovanstånde procedur, laddar sedan vyn och skickar vidare användaren till adminsidan för CRUD.

        } else {
            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this-> view -> display($dataArray, 'loginForm'); //Annars skicka till loginsidan.


        }

    }


    public function endSession() { //Vid tryck på logga ut, körs session_destroy() och vi anropar funktionen getAllWatches.

        session_destroy();
        $this->getAllWatches();
    }


    //Metod för att lägga till klocka.
    public function addWatch() {

        if ($_SESSION['loggedin'] == TRUE) {

            $validateForm = new validationWatch();
            $errormsg = $validateForm -> validateWatchForm();

            if(count($errormsg) <= 0) {

                $model = new WatchesTableGateWay();

                $model->addWatch();
                $product = $model->getAllWatches();

                $dataArray = array("watch" => $product);
                $this-> view -> display($dataArray, 'adminvy');
            }

            else {

                $this->arrayDataForView['errormessages']=$errormsg;
                $this->arrayDataForView['postatdata']=$_POST;
                $this-> view -> display($this -> arrayDataForView, 'admin');


            }


            //  }//end yttre if för login

        } else {

            $this->doAdmin();

        }
    }

    //Metod för att uppdatera klocka.
    public function updateWatch() {

        if ($_SESSION['loggedin'] == TRUE) {

            $model = new WatchesTableGateWay();

            $model -> updateWatch();
            $product = $model ->getAllWatches();

            $dataArray = array("watch" => $product);
            $this-> view -> display($dataArray, 'adminvy');




        } else
        {

            $this->doAdmin();
        }
    }


    //Metod för att ta bort klocka.
    public function deleteWatch($id) {

        if($_SESSION['loggedin'] == TRUE) {
            $model=new WatchesTableGateWay();
            $model->deleteWatch($id);
            $watches=$model->getAllWatches();
            $dataArray=array('watch'=>$watches);

            $this-> view -> display($dataArray,'adminvy');
        } else {

            $this->doAdmin();
        }
    }

    //Metod för att visa uppdateringsvyn vid admin.
    public function updateView($id) {

        // if ($_SESSION['loggedin'] == TRUE) {

        $model = new WatchesTableGateWay();

        //$model -> addWatch();
        $product = $model ->getWatchesById($id);

        $dataArray = array("watch" => $product);
        $this-> view -> display($dataArray, 'adminUpdateForm');


        //  }//end yttre if för login

    }

    //Metod för addVy
    public function addView() {

        //  if ($_SESSION['loggedin'] == TRUE) {

        $model = new WatchesTableGateWay();

        //$model -> addWatch();
        $product = $model ->getWatchesById();

        $dataArray = array("watch" => $product);
        $this-> view -> display($dataArray, 'admin');


    }//end yttre if för login

    // }


}