<?php

interface IConnectDatabase {
    //put your code here

    CONST HOST = 'mysql:host=utb-mysql.du.se;dbname=db30';
    CONST USER = 'db30';
    CONST PASSWORD = 'FJJAcyMU';
    public static function connect();
}
?>
