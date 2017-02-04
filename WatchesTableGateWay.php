<?php
include_once 'DBConnection.php';

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


    public function getWatchesByCategory($category) {
        $pdo=DBConnection::connect();
        //Skapar upp en sql med parametern kategori som vi ska kunna hitta på
        $sql = "CALL getWatchesByCategory ('{$category}')";

        //Förbereder hämtning från MYSQL databasen
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':Kategori',$category,PDO::PARAM_STR);
        $statement->execute();

        //Hämtar ifrån databasen
        $watches = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null; //Stänger
        return $watches;
    }


    public function searchWatchByBrand() {

if(isset($_POST['searchField'])) {
            $pdo = DBConnection::connect();

            //Skapar upp en sql med parametern kategori som vi ska kunna hitta på
            $stt = $_POST['searchField'];
            $sql = "CALL getWatchesByMarke ('{$stt}')";

            //Förbereder hämtning från MYSQL databasen
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':Marke', filter_var($_POST ['searchField'], FILTER_SANITIZE_STRING));

            $statement->execute();

            //Hämtar ifrån databasen
            $watches = $statement->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null; //Stänger
            return $watches;
        } else {

}
    }

}


//$filmer = new WatchesTableGateWay();
//var_dump($filmer->searchWatchByBrand());
//var_dump($filmer->getWatchesByCategory('Klockor'));


?>