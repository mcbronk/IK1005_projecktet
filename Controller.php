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

    public function goToFirstPage() {
        $model=new WatchesTableGateWay();
        $watches=$model->getAllWatches();
        $dataArray=array('watch'=>$watches);

        $this->display($dataArray,'./homepage.php');

    }

    public function doAdmin() {


        $user = 'admin';
        $psw = 'admin';

        if($_POST['username'] == $user && $_POST['passwd'] == $psw) {
            $model = new WatchesTableGateWay();
            $watches = $model->getAllWatches();
            $dataArray = array('watch' => $watches);

            $this->display($dataArray, './adminvy.php');
        } else {
            echo 'Felaktig information.';
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



    //Metod för att sköta templates.
    public function display($dataArray,$viewTemplate) {
        if(file_exists($viewTemplate)) {
            extract($dataArray);

            include_once ($viewTemplate);
        }
        else {
            throw new Exception('Finns ingen sådan template');
        }
    }


    //Metod för att lägga till klocka.
    public function addWatch() {

      // if ($_SESSION['loggedin'] == TRUE) {

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

        }

        //Metod för att uppdatera klocka.
    public function updateWatch() {

        // if ($_SESSION['loggedin'] == TRUE) {

        $model = new WatchesTableGateWay();

        $model -> updateWatch();
        $product = $model ->getAllWatches();

        $dataArray = array("watch" => $product);
        $this -> display($dataArray, './adminvy.php');


        //  }//end yttre if för login

    }


    //Metod för att ta bort klocka.
    public function deleteWatch($id) {
        $model=new WatchesTableGateWay();
        $model->deleteWatch($id);
        $watches=$model->getAllWatches();
        $dataArray=array('watch'=>$watches);

        $this->display($dataArray,'./adminvy.php');
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
        $model = new WatchesTableGateWay();
        if ($_SESSION['cart']) {



            $this->cart = $_SESSION['cart'];

            if (!array_key_exists($id, $this->cart)) {
                $produkt = $model->getWatchesById($id);

                $this->cart[$id] = array($produkt[0], 1);

                $_SESSION['cart'] = $this->cart;

            } else {

                $this->cart[$id][1]++;
                $_SESSION['cart'] = $this->cart;
            }

            //ingen session finns
        } else {


            $_SESSION['cart'] = $this->cart;
            $produkt = $model->getWatchesById($id);

            $this->cart[$id] = array($produkt[0], 1);

            $_SESSION['cart'] = $this->cart;
        }
         $this->showCart();




    }

    //Metod för att minska i kundvagnen.
    public function decreaseCart($id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
            //om regnummer finns så ta bort ett från antal
            if (array_key_exists($id, $this->cart)) {
                $this->cart[$id][1] --;
                //unset($this->cart[$regnr]); // = $bilarArray[0];
            }
            //om noll antal ta bort hela "bilen" från cartarrayen
            if ($this->cart[$id][1] <= 0) {
                unset($this->cart[$id]);
            }
            $_SESSION['cart'] = $this->cart;
            //visar kundvagn nu med minskat antal för produkten
            $this->showCart();
        }
    }


    //Metod för att öka i kundvagnen.
    public function increaseCart($id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
            //om regnummer finns så ta bort ett från antal
            if (array_key_exists($id, $this->cart)) {
                $this->cart[$id][1] ++;
                //unset($this->cart[$regnr]); // = $bilarArray[0];
            }

            $_SESSION['cart'] = $this->cart;
            //visar kundvagn nu med minskat antal för produkten
            $this->showCart();
        }
    }


    //Metod för att ta bort en artikel ur kundvagnen.
    public function removeFromCart($id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
            //om regnummer finns så ta bort ett från antal
            if (array_key_exists($id, $this->cart)) {
                unset($this->cart[$id]);
                //unset($this->cart[$regnr]); // = $bilarArray[0];
            }
            //om noll antal ta bort hela "bilen" från cartarrayen
            $_SESSION['cart'] = $this->cart;
            //visar kundvagn nu med minskat antal för produkten
            $this->showCart();
        }
    }


    public function endSession() {

        session_destroy();
        $this->getAllWatches();
    }

//Metod för att visa kundvagnen.
    public function showCart () {

        if ($_SESSION ['cart']) {

            //Plockar ut alla värden ur bilmärken

            $productArray = $_SESSION ['cart'];
            $dataArray = array("product" => $productArray);




        }
        $this->display($dataArray , 'cartV2.php');
    }






}




$controller = new Controller();
$controller->doRequest($_SERVER['QUERY_STRING']);


?>