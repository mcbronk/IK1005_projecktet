<?php include 'header.php'?>;
<div class="container-fluid product-bg row">
    <?php


        foreach ($watch as $element) {


            echo '<div class ="container-fluid product-bg row" >';
            echo '<div class="col-md-6 col-md-offset-3 ">';

            echo ' <div class="thumbnail">';
            echo '  <img class="buy-img-inside" src="', $element['Bildurl'], '" alt="">';
            echo '   <div class="caption-full">';
            echo '  <hr>';
            echo ' <h4>', $element['Marke'], '</h4>';

            echo '<p>', $element['Beskrivning'], '</p>';
            echo '<p></p><hr>';
            echo '   <h4 class="pull-center"><strong>Pris: </strong>', $element['Pris'], ' SEK</h4>';
            echo '<p>Lager: ',$element['Lager'],'</p>';
            echo '   <button type="button" class="buy-btns-2">Lägg i kundkorg</button>';

            echo '     </div>
   

            </div>
        </div>
</div>';

    }

    ?>
</div>
<?php include 'footer.php'?>;