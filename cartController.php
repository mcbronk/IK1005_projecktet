<?php

/**
 * Created by PhpStorm.
 * User: Danne
 * Date: 2017-02-04
 * Time: 11:49
 */
include_once './Controller.php';
include_once './WatchesTableGateWay.php';

session_start();
class cartController extends Controller
{

    private $cart;
    function __construct() {







    }


    public function addCart($id) {
        //lägg till i kundvagn och visa kundvagn sidan

        $model = new WatchesTableGateWay();
        if($_SESSION['cart']) {
            $this->cart = array();
            //om produktid inte finns lägg till produkt och sätt dess antal till 1
            if (!array_key_exists($id, $this->cart)) {
                $produkt = $model->getWatchesById($id);
                //Kopplar ID som ett keyvärde till arrayen
                $this->cart = array($produkt);
                //Carten läggs tillbaka i sessionen
                $_SESSION['cart'] = $this->cart;
            } //annars öka dess antal med 1
            //   else {
            //     $this->cart[$id][1]++;
            //   $_SESSION['cart'] = $this->cart;
            //}
        } //slut stora if
        else{
            $_SESSION ['cart'] = $this->cart; // get cart en tom array
            $produkt = $model->getWatchesById($id);
            $this->cart = array ($produkt);
            $_SESSION['cart'] = $this->cart;
        }

        $this->showCart();

    }
    public function removeFromCart($id) {
        //ta bort från kundvagn och visa kundvagns sidan
        if(array_key_exists($id, $this->cart)){
            //minskar antal med 1
            //$this->cart[$id][1]--;
            //tar bort på id
            unset($this->cart[$id]);
        }
        $_SESSION['cart']=$this->cart;

    }

    public function showCart () {

        if ($_SESSION ['cart']) {
            //Plockar ut alla värden ur bilmärken
            $cont = new Controller();
            $productArray = $_SESSION ['cart'];
            $dataArray = array("watch" => $productArray);
            $cont->display($dataArray , 'cart.php');



        }
    }






}



?>
