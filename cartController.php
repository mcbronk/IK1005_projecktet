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



        if($_SESSION['cart']){
            $this->cart=array();
        }
        else{
            $this->cart=$_SESSION['cart'];
        }
    }

    public function addToCart($id) {
        //lägg till i kundvagn och visa kundvagn sidan

        $produkt[0]=0;
        //om produktid inte finns lägg till produkt och sätt dess antal till 1
        if(!array_key_exists($id, $this->cart)){
            $this->cart[$id]=array($produkt[0],1);
            $_SESSION['cart']=$this->cart;
        }
        //annars öka dess antal med 1
        else{
            $this->cart[$id][1]++;
            $_SESSION['cart']=$this->cart;
        }



        $this -> showCart();

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
            $productArray = $_SESSION ['cart'];
            $this -> $this = $this ->display($productArray, './header.php');
            $this -> $this -> display ($productArray, './header.php');
        } else {

        }
    }


}



?>