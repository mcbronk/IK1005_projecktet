<?php
include_once './IConnectDatabase.php';

class DBConnection implements IConnectDatabase{

    private static $server = IConnectDatabase::HOST;
    private static $user = IConnectDatabase::USER;
    private static $password = IConnectDatabase::PASSWORD;
    private static $pdo;

    public static function connect() {
        try {

            if(self::$pdo==null) {
                self::$pdo=new PDO(self::$server, self::$user, self::$password);
                return self::$pdo;
            }
            else {
                return self::$pdo;
            }
        } catch (Exception $ex) {

            throw new Exception('Databasfel!');
        }
    }
    //put your code here
}
?>
