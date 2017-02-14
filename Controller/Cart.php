<?php
include_once './Model/WatchesTableGateWay.php';
include_once 'ViewHelper.php';
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 2017-02-14
 * Time: 08:21
 */

class Cart
{

    private $cart;
    private $view;

    /**
     * Cart constructor.
     */
    public function __construct()
    {


        $this->cart = array();
        $this -> view = new ViewHelper();
    }





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
//Metod för att visa kundvagnen.
    public function showCart () {

        if ($_SESSION ['cart']) {

            //Plockar ut alla värden ur bilmärken
            $totalcounter =0;
            foreach($_SESSION['cart'] as $kundvagnscounter){

                $totalcounter = $totalcounter + $kundvagnscounter[1];
            }
            $_SESSION['kundvagncount']=$totalcounter;

            $productArray = $_SESSION ['cart'];
            $dataArray = array("product" => $productArray,'counter'=>$totalcounter);




        }
        $this->view->display($dataArray , 'cartV2');
    }
}