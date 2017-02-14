<?php

interface IConnectDatabase {
    //put your code here


    //CONST HOST = 'mysql:host=localhost;dbname=db30';
    CONST HOST = 'mysql:host=utb-mysql.du.se;dbname=db30';
    CONST USER = 'db30';
    CONST PASSWORD = 'FJJAcyMU';
    public static function connect();

    //Skapar ett interface där vi sätter HOST, USER, PASSWORD för våran mysql koppling.
    //Den statiska funktionen connect(); anropas sedan för att ansluta.
}
?>
