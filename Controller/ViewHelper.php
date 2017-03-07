<?php

/**
 * Created by PhpStorm.
 * User: danie
 * Date: 2017-02-14
 * Time: 08:15
 */
class ViewHelper
{
    //Metod för att sköta templates.
    public function display($dataArray,$viewTemplate) { //display metod.
        if(file_exists("./View/{$viewTemplate}.php")) { //om det vn i $viewtemplade existerar.
            extract($dataArray); //extrahera arrayen av data

            include_once ("./View/{$viewTemplate}.php"); //ikludera vyn
        }
        else {
            throw new Exception('Finns ingen sådan template');
        }
    }


    
}