<?php include_once'head.php'?>
<?php include_once 'header.php' ?>
<main>
<div class="container-fluid product-bg row">
    <?php


        foreach ($watch as $element) {


            echo '<div class ="container-fluid product-bg row" >';
            echo '<div class="col-md-6 col-md-offset-3 ">';

            echo ' <div class="thumbnail product-div">';
            echo ' <h2>', $element['Marke'], '</h2>';
            echo '  <img class="buy-img-inside" src="', $element['Bildurl'], '" alt="">';
            echo '   <div class="caption-full">';
            echo '  <hr>';
            echo ' <h4>', $element['Namn'], '</h4>';

            echo '<p>', $element['Beskrivning'], '</p>';
            echo '<p></p><hr>';
            echo '   <h4 class="pull-center"><strong>Pris: </strong>', $element['Pris'], ' SEK</h4>';
            echo '<p>Lager: ',$element['Lager'],'</p>';
            echo '<a href="index.php?Cart/addCart/', $element['ID'], '"> <button type="button" class="buy-btns-2">Lägg i kundkorg</button></a>';

            echo '     </div>
   

            </div>
        </div>
</div>';

    }

    ?>
</div>
</main>
<?php include_once 'footer.php' ?>