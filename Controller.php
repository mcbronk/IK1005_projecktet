<?php
include_once './WatchesTableGateWay.php';
include_once 'validationWatch.php';

session_start();
class Controller {
    private $user;
    private $psw;
    private $arrayData;


    private $cart;
    function __construct() {
        $this->cart = array();
        $this->arrayData = array();

    }


    public function doRequest($queryString)
    {
        try {


            $queryarray = explode('/', $queryString);
            if (method_exists($this, $queryarray[0])) {

                $this->{$queryarray[0]}($queryarray[1]);
            } else {

                $this->goToFirstPage();

            }


        } catch (Exception $ex) {
            echo $ex->getMessage();
            die();

        }
    }


    //Metod för att sköta templates.
    public function display($dataArray,$viewTemplate) { //display metod.
        if(file_exists($viewTemplate)) { //om det vn i $viewtemplade existerar.
            extract($dataArray); //extrahera arrayen av data

            include_once ($viewTemplate); //ikludera vyn
        }
        else {
            throw new Exception('Finns ingen sådan template');
        }
    }

    public function goToFirstPage() { //Funktion för att gå till förrsta sidan.
        $model=new WatchesTableGateWay(); //Skapar upp ett objekt att WatchesTableGateWay
        $watches=$model->getAllWatches(); // anropar modellens metod getAllWatches för att hämta alla produkter från databasen. Spar resultatet till $watches.
        $dataArray=array('watch'=>$watches); // Skapar upp en array $dataArray och fyller den med $watches från ovan. namnger denna sedan till 'watches'.

        $this->display($dataArray,'./homepage.php'); // Kör funtionen display och laddar vyn med, det sparade datat från getAllWatches och presenterar det i vyn homepage.php

    }

    public function doLogin() { //Metod för adminlogin


        $validateForm = new validationWatch(); //Skapar ett objekt av validatewatch för att kunna göra formulärsvalideringar.
        $errormsg = $validateForm -> validateWatchForm(); // $validatewatch anropar metoden validateWatchForm och spar eventuella error i errormsg.


        if(count($errormsg) <= 0) { //FInns det error går vi till else, annars sätts $_SESSION['loggedin'] till TRUE och vi kör likt en vanlig function.

            $_SESSION['loggedin'] = TRUE;
            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this->display($dataArray, './adminvy.php');
        } else {

            $this->arrayDataForView['postatdata']=$_POST; //Kom vi inte in. Spar vi det som skrivits in i formulären och skriver ut dom i inputboxarna igen.
            $this->arrayDataForView['errormessages']=$errormsg; // Spar felmeddelanded och visar dom sedan i vyn.


            $this->display($this -> arrayDataForView, './loginForm.php'); // Laddar vyn loginForm med ata från $_POST och $errormsg.
        }


    }

    public function logOut() { //För att logga ut.

            $_SESSION['loggedin'] = FALSE; //Sätter loggedin till FALSE, på så sätt kan man inte utföra CRUD.
            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches(); //Resten likt ovanstående exempel.
            $dataArray = array('watch' => $watches);

            $this->display($dataArray, './loginForm.php');



    }

    public function doAdmin() { //För att komma till adminSidan

        if($_SESSION['loggedin'] == TRUE) { //KOlla om $_SESSION är TRUE

            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this->display($dataArray, './adminvy.php');  //LIkt ovanstånde procedur, laddar sedan vyn och skickar vidare användaren till adminsidan för CRUD.

        } else {
            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this->display($dataArray, './loginForm.php'); //Annars skicka till loginsidan.


        }



    }
    // Metod för att hämta alla produkter
    public function getAllWatches() {
        $model=new WatchesTableGateWay();
        $watches=$model->getAllWatches();
        $dataArray=array('watch'=>$watches);

        $this->display($dataArray,'./view.php');
    }



    //Metod för att hämta produkter baserat på ID:
    public function getWatchesById($id) {
        $model=new WatchesTableGateWay();
        $watches=$model->getWatchesById($id);
        $dataArray=array('watch'=>$watches);

        $this->display($dataArray,'./productview.php');
    }



    //Metod för att hämta produkter baserat på dess kategori.
    public function getWatchesByCategory($category) {
        $model = new WatchesTableGateWay();
        $categoryProduct = $model -> getWatchesByCategory($category);
        $dataArray = array("watch" => $categoryProduct);

        $this -> display($dataArray, './view.php');
    }


    //Metod för sökning.
    public function getSearch() {

        $model = new WatchesTableGateWay();

        $categoryProduct = $model -> search();
        $dataArray = array("watch" => $categoryProduct);

        $this -> display($dataArray, './view.php');
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
            $this->display($dataArray, './adminvy.php');
     }

        else {

            $this->arrayDataForView['errormessages']=$errormsg;
            $this->arrayDataForView['postatdata']=$_POST;
            $this->display($this -> arrayDataForView, './admin.php');


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
        $this -> display($dataArray, './adminvy.php');


          

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

        $this->display($dataArray,'./adminvy.php');
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
        $this -> display($dataArray, './adminUpdateForm.php');


        //  }//end yttre if för login

    }

    //Metod för addVy
    public function addView() {

       //  if ($_SESSION['loggedin'] == TRUE) {

        $model = new WatchesTableGateWay();

        //$model -> addWatch();
        $product = $model ->getWatchesById();

        $dataArray = array("watch" => $product);
        $this -> display($dataArray, './admin.php');


          }//end yttre if för login

   // }


//Metod för att lägga till i kundvagnen.
    public function addCart($id)
    {
        $model = new WatchesTableGateWay(); //Skapar ett objekt av modellen.
        if ($_SESSION['cart']) { //Finns det en $_SESSION['cart']array går vi vidare annars skickas vi till else.



            $this->cart = $_SESSION['cart']; //Slänger över $_SESSION['cart']till en array som vi sedan modifierar.

            if (!array_key_exists($id, $this->cart)) { //Finns inte id i arrayen skapas ett.
                $produkt = $model->getWatchesById($id);  //Hämtar produkter

                $this->cart[$id] = array($produkt[0], 1); //Lägger till varan i arrayen. Sätter antal till 1.
                $_SESSION['cart'] = $this->cart; //Slänger tillbaka arrayen till $_SESSION.

            } else {

                $this->cart[$id][1]++; //Fanns id i arrayen ökar vi antal med 1.
                $_SESSION['cart'] = $this->cart; //Slänger tillbaka arrayen till $_SESSION
            }

            //ingen session finns
        } else {

//Fanns inte skapas en $_SESSION
            $_SESSION['cart'] = $this->cart; //$this->cart, arrayen vi deklarerade i början slängs in i $_SESSION
            $produkt = $model->getWatchesById($id); //Hämtar produkter fårm modellen.

            $this->cart[$id] = array($produkt[0], 1); //Spar varan i en array.

            $_SESSION['cart'] = $this->cart; //Slänger in arrayen till $_SESSION.
        }
         $this->showCart(); //Efter allt detta, anropas funktionen showCart.




    }

    //Metod för att minska i kundvagnen.
    public function decreaseCart($id) { //LIKT ovanstående förklaring.
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];

            if (array_key_exists($id, $this->cart)) {
                $this->cart[$id][1] --;

            }

            if ($this->cart[$id][1] <= 0) { //Men är antalen mindre än 0 tas varan bort ur kundvagnen. med functionen unset($this->cart[$id]);
                unset($this->cart[$id]);
            }
            $_SESSION['cart'] = $this->cart;

            $this->showCart();
        }
    }


    //Metod för att öka i kundvagnen.
    public function increaseCart($id) { //Samma lika
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];

            if (array_key_exists($id, $this->cart)) {
                $this->cart[$id][1] ++;

            }

            $_SESSION['cart'] = $this->cart;

            $this->showCart();
        }
    }


    //Metod för att ta bort en artikel ur kundvagnen.
    public function removeFromCart($id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];

            if (array_key_exists($id, $this->cart)) {
                unset($this->cart[$id]);

            }

            $_SESSION['cart'] = $this->cart;

            $this->showCart();
        }
    }


    public function endSession() { //Vid tryck på logga ut, körs session_destroy() och vi anropar funktionen getAllWatches.

        session_destroy();
        $this->getAllWatches();
    }

//Metod för att visa kundvagnen.
    public function showCart () { //För att visa kundvagn.

        if ($_SESSION ['cart']) {

            //Plockar ut alla värden ur bilmärken

            $productArray = $_SESSION ['cart']; //hämtar data från $_SESSION
            $dataArray = array("product" => $productArray);




        }
        $this->display($dataArray , 'cartV2.php');
    }






}




$controller = new Controller();
$controller->doRequest($_SERVER['QUERY_STRING']);


?>