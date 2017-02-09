<?php

interface IConnectDatabase {
    //put your code here


    CONST HOST = 'mysql:host=localhost;dbname=db30';
   // CONST HOST = 'mysql:host=utb-mysql.du.se;dbname=db30';
    CONST USER = 'root';
    CONST PASSWORD = 'FJJAcyMU';
    public static function connect();
}
?>
