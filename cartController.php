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
        $this->cart = array();

    }


    public function addCart($id)
    {



        $model = new WatchesTableGateWay();
        if ($_SESSION['cart']) {


            $this->cart = $_SESSION['cart'];

            if (!array_key_exists($id, $this->cart)) {
                $produkt = $model->getWatchesById($id);

                $this->cart[$id] = array($produkt[0] ,1);

                $_SESSION['cart'] = $this->cart;

            }
            else {

                $this->cart[$id][1] ++;
                $_SESSION['cart'] = $this->cart;
            }
            //ingen session finns
        } else {

            $_SESSION['cart'] = $this->cart;
            $produkt = $model->getWatchesById($id);

            $this->cart[$id] = array($produkt[0], 1);

            $_SESSION['cart'] = $this->cart;
        }
      //  $this->showCart();




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
            $dataArray = array("product" => $productArray);
            $cont->display($dataArray , 'homepage.php');



        }
    }






}



?>
