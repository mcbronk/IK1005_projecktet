<?php
include_once 'IConnectDataBase.php';

class DBConnection implements IConnectDatabase{ //Klassen DBConnection implementerar interfacet iConnectDataBase

    private static $server = IConnectDatabase::HOST; //Spar från interfaces HOST, USER och PASSWORD till egna instansvariabler.
    private static $user = IConnectDatabase::USER;
    private static $password = IConnectDatabase::PASSWORD;
    private static $pdo;

    public static function connect() {
        try {

            if(self::$pdo==null) { //är pdo NULL går vi vidare och skapar ett PDO objekt men det data vi sparat i $serverm $user, $password.
                self::$pdo=new PDO(self::$server, self::$user, self::$password);
                return self::$pdo; //Skickar tillbaka pdo
            }
            else {
                return self::$pdo;
            }
        } catch (Exception $ex) {

            throw new Exception('Databasfel!'); //Annars kastar del
        }
    }
    //put your code here
}
?>
