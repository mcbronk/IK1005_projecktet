<!-- Kundvagnsruta -->
<div class="modal fade" id="kundvagnsruta">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Kundvagn</h2>
            </div>
            <!-- body -->
            <div class="modal-body">
                <p>Din order är följande</p>
                <!-- plats för att echo ut ordernummer och kunduppgifter när vi har tabeller -->

                <?php



                if(is_array($watch)) {
                            //får inte med key-värdet


                    foreach ($watch as $element) {

                        echo '<div class ="container-fluid product-bg row" >';
                        echo '<div class="col-md-6 col-md-offset-3 ">';

                        echo ' <div class="thumbnail product-div">';
                        echo ' <h2>', $element['Marke'], '</h2><hr>';
                        echo '  <img class="buy-img-inside" src="', $element['Bildurl'], '" alt="">';
                        echo '   <div class="caption-full">';
                        echo '  <hr>';
                        echo ' <h4>', $element['Namn'], '</h4>';

                        echo '<p>', $element['Beskrivning'], '</p>';
                        echo '<p></p><hr>';
                        echo '   <h4 class="pull-center"><strong>Pris: </strong>', $element['Pris'], ' SEK</h4>';

                        echo '     </div>
   

            </div>
        </div>
</div>';

                    }
                } else {
                    echo "<p>Kundvagnen är tom</p>";
                }



                ?>


            </div>
        </div>
    </div>
</div>
