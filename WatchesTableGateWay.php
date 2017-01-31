<?php
include_once './DBConnection.php';

class WatchesTableGateWay
{
    //put your code here

    public function getAllWatches()
    {
        $pdo = DBConnection::connect();
        $sql = 'CALL getWatches()';

        $statement = $pdo->prepare($sql);



        $statement->execute();

        $watches = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        return $watches;
    }

    public function getWatchesById($id)
    {
        $pdo = DBConnection::connect();
        $sql = "CALL getWatchesByID({$id})";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(':IDt',$id,PDO::PARAM_STR);

        $statement->execute();

        $watches = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        return $watches;
    }


}
/*
$filmer = new FilmerTableGateWay();
var_dump($filmer->getAllProdukter());
*/
?>