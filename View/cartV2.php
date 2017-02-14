<?php include_once'head.php'?>
<?php
include 'header.php';
$tomkund;
?>
<div class="navbar"></div>
<div class="container">
    <div class="jumbotron">
    <p>Din order är följande</p>
    <!-- plats för att echo ut ordernummer och kunduppgifter när vi har tabeller -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Produkt</th>
            <th>Namn</th>
            <th>Pris</th>
            <th>Antal
            <th></th>
            <th></th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php
        $summa=0;
        $antalprod=0;
        if(isset($product)) {

            foreach ($product as $element) {
                echo '<tr>';
                echo '<td>','<img src="',$element[0]['Bildurl'],'" height="70" style="outline:thin solid #808080;">','</td>';
                echo '<td style="vertical-align:middle;">',$element[0]['Namn'],'</td>';
                echo '<td style="vertical-align:middle;">',$element[0]['Pris'],'</td>';
                echo '<td style="vertical-align:middle;">',$element[1],'</td>';
                echo '<td style="vertical-align:middle;"><a href=index.php?Cart/increaseCart/',$element[0]['ID'],'><span class="glyphicon glyphicon-plus"></span></a></td>';
                echo '<td style="vertical-align:middle;"><a href=index.php?Cart/decreaseCart/',$element[0]['ID'],'><span class="glyphicon glyphicon-minus"></span></a></td>';
                echo '<td style="vertical-align:middle;"><a href=index.php?Cart/removeFromCart/',$element[0]['ID'],'><span class="glyphicon glyphicon-trash"></span></a></td>';
                $summa+=$element[0]['Pris']*$element[1];
                $antalprod+=$element[1];

                echo '</tr>';


            }
            echo "<tr><td colspan='8' align='right'><strong>Att betala: {$summa} kr</strong></td></tr>";
            echo '<td><button type="button" class="btn btn-info"><a href=index.php?Cart/endSession/>Köp!</a></button></td>';
            $_SESSION['antalprodukter'] = $antalprod;
        } else {
            $tomkund= "Varukorgen är tom!";
        }



        ?>

        </tbody>
    </table>
        <?php
        if (isset($tomkund)){
            echo'<p class="text-danger">',$tomkund, '</p>';
        }
        ?>

    </div>
    </div>


<?php include 'footer.php';?>