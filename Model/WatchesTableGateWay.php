<?php
include_once 'DBConnection.php';

class WatchesTableGateWay
{
    //put your code here


    public function getAllWatches() //Funktionen getAllWatches. Alla metoder är snarlika går inte igenom alla.
    {
        $pdo = DBConnection::connect(); //Spar resultatet från DBConnections statiska metod connect() till $pdo.
        $sql = 'CALL getWatches()'; //Spar från(proceduren) till $sql.

        $statement = $pdo->prepare($sql); //Laddar ett statement $pdo anropar sin metod prepare med det data vi nyss skickade till $sql

        $statement->execute(); //Exekverar frågan till databasen. med metoden execute();

        $watches = $statement->fetchAll(PDO::FETCH_ASSOC); //Hämtar in resultatet med functionen fetchALL, spar det sedan till variabeln watches.

        $pdo = null; //nolställer $pdo

        return $watches; //Skickar tillbaka $watches.
    }

    public function getWatchesById($id)
    {
        $pdo = DBConnection::connect();
        $sql = "CALL getWatchesByID({$id})"; //Samma som ovan men skickar med $id i proceduren.

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


    public function search() {

if(isset($_POST['searchField'])) { //Är $_POST['searchField'] TRUE går vi vidare. Dvs vi vet om det finns data i $_POST eller inte.
            $pdo = DBConnection::connect();

            //Skapar upp en sql med parametern kategori som vi ska kunna hitta på
            $stt = $_POST['searchField'];
            $sql = "CALL getProductsBySearch ('{$stt}')";

            //Förbereder hämtning från MYSQL databasen
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':Marke', filter_var($_POST ['searchField'], FILTER_SANITIZE_STRING)); //med bindParam inder vi platshållaren med data i $_POST.
    //FILTER_SANITIZE_STRING tar bort eventuella html taggar.

            $statement->execute();

            //Hämtar ifrån databasen
            $watches = $statement->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null; //Stänger
            return $watches;
        } else {
            return null;
}
    }
// får ut post härifrån och skapa procedurer.
    public function addWatch($ID,$namn,$marke,$kategori,$beskrivning,$pris,$lager,$bild) {
        try {
            $pdo = DBConnection::connect();

            $sqlQuery = ("CALL h15ExclusiveWatches_addWatch (?,?,?,?,?,?,?,?))");

            //lägger till en bil använder namngivna platshållare tex (:regnummer)
            $statement = $pdo->prepare($sqlQuery);
            //binder de namngivna platshållaren till det postade data i $_POST[];
            //saniterar det postade från tex html taggar
            $statement->bindParam(':ID', $ID, PDO::PARAM_INT);
            $statement->bindParam(':Namn', $namn, PDO::PARAM_STR);
            $statement->bindParam(':Marke', $marke, PDO::PARAM_STR);
            $statement->bindParam(':Kategori', $kategori, PDO::PARAM_STR);
            $statement->bindParam(':Beskrivning',$beskrivning, PDO::PARAM_STR);
            $statement->bindParam(':Pris', $pris);
            $statement->bindParam(':Lager', $lager, PDO::PARAM_INT);
            $statement->bindParam(':Bildurl', $bild, PDO::PARAM_STR);
            //exekverar frågan
            $statement->execute();
            $pdo = NULL;
        } catch (PDOException $pdoexp) {
            $pdo = NULL;
            throw new Exception('Databasfel- Gick inte att lägg till en bil');
        }
    }

    public function updateWatch($ID,$namn,$marke,$kategori,$beskrivning,$pris,$lager,$bild) {
        try {


            $pdo = DBConnection::connect();
            //lägger till en bil använder namngivna platshållare tex (:regnummer)
           // $statement = $pdo->prepare('UPDATE h15_exlusivewatches SET id=:ID, '
             //   . 'namn=:Namn, marke=:Marke, kategori=:Kategori, beskrivning=:Beskrivning, pris = :Pris, lager = :Lager, bildurl = :Bildurl WHERE id=:ID');
            //binder de namngivna platshållaren till det postade data i $_POST[];
            $sqlQuery = ("");


            $statement = $pdo -> prepare($sqlQuery);


            //saniterar det postade från tex html taggar
            $statement->bindParam(':ID', $ID, PDO::PARAM_INT);
            $statement->bindParam(':Namn', $namn, PDO::PARAM_STR);
            $statement->bindParam(':Marke', $marke, PDO::PARAM_STR);
            $statement->bindParam(':Kategori', $kategori, PDO::PARAM_STR);
            $statement->bindParam(':Beskrivning',$beskrivning, PDO::PARAM_STR);
            $statement->bindParam(':Pris', $pris);
            $statement->bindParam(':Lager', $lager, PDO::PARAM_INT);
            $statement->bindParam(':Bildurl', $bild, PDO::PARAM_STR);
            //exekverar frågan
            $statement->execute();

            $pdo = NULL;
        } catch (PDOException $pdoexp) {
            $pdo = NULL;
            throw new Exception('Databasfel- Gick inte att lägg till en bil');
        }
    }

    public function deleteWatch($id) {
        try {
            $pdo = DBConnection::connect();
            //tar bort en bil på regnr använder namngivna platshållare tex (:regnummer)
            $statement = $pdo->prepare('DELETE FROM h15_exlusivewatches WHERE id=:ID');
            //binder den namngivna platshållaren till parameterna $regnr
            $statement->bindParam(':ID', $id);
            //exekverar frågan
            $statement->execute();
            //Stänger
            $this->pdocon = NULL;
        } catch (PDOException $pdoexp) {
            $this->pdocon = NULL;
            throw new Exception('Databasfel- Gick inte att ta bort bil');
        }
    }

}


//$filmer = new WatchesTableGateWay();
//var_dump($filmer->getAllWatches();
//var_dump($filmer->getWatchesByCategory('Klockor'));


?>