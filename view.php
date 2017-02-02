<body>
<?php include 'header.php'?>;

    <main>

        <div class="container-fluid product-bg row">
            <?php

          //  if (count($watch, COUNT_NORMAL) > 1) {

                foreach ($watch as $element) {

                    echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 product-div">';
                    echo '<img src="', $element['Bildurl'], '" class="img-responsive" alt="', $element['Namn'], '">';
                    echo '<hr>';
                    echo '<h4>', $element['Namn'], '</h4>';
                    echo '<strong>Pris: ', $element['Pris'], '</strong>';
                    echo '<hr><br>';
                    echo '<button type="button" class="buy-btns">Köp <span class="glyphicon glyphicon-shopping-cart"></span></button>';
                    echo '<a href="Controller.php?getWatchesById/', $element['ID'], '"><button type="button" class="info-btns">Information</button></a>
                </div>';
                }

         //   }
            ?>
        </div>
        <!-- First container -->

    <!-- End Main -->

    <!-- Footer -->

    <!-- End Footer -->

<?php include "footer.php"?>;
</body>

</html>

