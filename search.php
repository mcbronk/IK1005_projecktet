<!DOCTYPE html>
<html lang="sv-se" xml:lang="sv-se">
<head>
    <title>Exclusive Watches</title>
    <meta charset="utf-8">
    <!-- When you visit a website via a mobile browser it will assume that you’re viewing a big desktop, to prevent this -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Exclusive Watches är en auktoriserad återförsäljare av exklusiva klockor.">
    <meta name="author" content="Emil Lindström,Erik Karlsson,Daniel Gustafsson,Martin Singh Virk">
    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- För att alla webbläsare skall stödja Media Queries -->
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
</head>



    <main>

        <div class="container-fluid product-bg row">
            <?php



             foreach ($watch as $element) {

                echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 product-div">';
                echo '<img src="', $element['Bildurl'], '" class="img-responsive" alt="', $element['Namn'], '">';
                echo '<hr>';
                echo '<h4>', $element['Namn'], '</h4>';
                echo '<strong>', $element['Pris'], '</strong>';
                echo '<hr><br>';
                echo '<button type="button" class="buy-btns">Köp</button>';
                echo $element['ID'];
                echo '<a href="Controller.php?getWatchesById/', $element['ID'], '"><button type="button" class="info-btns">Information</button></a>
                </div>';

            }


            ?>
        </div>
        <!-- First container -->
        <div class="container-fluid bg-1 text-center row">
            <h3>Auktoriserad återförsäljare</h3>

            <!-- Klocklogotyper -->
            <div class="col-sm-12 ">
                <a class="link-watchLogo" href="https://www.rolex.com/" tabindex="9" target="_blank">
                    <img src="img/rolex-logo.png" alt="Rolex logotyp" class="img-circle img-size-main">
                </a>

                <a class="link-watchLogo" href="https://www.breitling.com/en/" tabindex="10" target="_blank">
                    <img src="img/breitling-logo.png" alt="Breitling logotyp" class="img-circle img-size-main">
                </a>

                <a class="link-watchLogo" href="http://www.hublot.com/en/" tabindex="11" target="_blank">
                    <img src="img/hublot-logo.png" alt="Hubot logotyp" class="img-circle img-size-main">
                </a>

                <a class="link-watchLogo" href="https://www.omegawatches.com/" tabindex="12" target="_blank">
                    <img src="img/omega-logo.png" alt="Omega logotyp" class="img-circle img-size-main">
                </a>
            </div>
        </div>

        <!-- Second Container -->
        <div class="container-fluid bg-2 text-center row">
            <div class="col-md-6 article-main">
                <p class="h3text"><strong>Om oss</strong></p>
                <p>Exclusive Watches är ett nytänkande företag som värdesätter design, elegans, känsla och kvalité.
                    Vi är därför auktoriserade återförsäljare och arbetar med några av de mest exklusiva, innovativa och
                    traditionella varumärkena i världen som erbjuder kvalitetsur:
                    Breitling, Hublot, Omega och Rolex. Med andra ord erbjuder vi det mest exklusiva och allra bästa
                    ifrån klockmarknaden.
                    Förutom klockor finns även ett utbud av tillbehör.</p>
            </div>

            <div class="col-md-3 article-main">
                <dl>
                    <dt class="h3text">Kontakt</dt>
                    <dd>Röda Vägen 3, Borlänge</dd>
                    <dd>Tel:023-77 80 00</dd>
                    <dd>E-Post: info@ew.com</dd>
                </dl>
            </div>

            <div class="col-md-3 article-main">
                <dl>
                    <dt class="h3text">Öppettider</dt>
                    <dd>Mån-Fre: 10-18</dd>
                    <dd>Lördag: 11-16</dd>
                    <dd>Söndag: Stängt</dd>
                </dl>
            </div>

            <div class="col-md-3 article-main">

                <dl>
                    <dt class="h3text">Nyhetsbrev?</dt>
                    <dd><a href="#" tabindex="13" data-toggle="modal" data-target="#popUpNews" class="modul-link"
                           title="Nyhetsbrev?"><span class="glyphicon glyphicon-envelope"></span></a></dd>
                </dl>
            </div>

            <div class="col-md-3 article-main">
                <dl>
                    <dt class="h3text">Webmaster</dt>
                    <dd><a href="#" tabindex="14" data-toggle="modal" data-target="#popUpWindow" class="modul-link"
                           title="Admins"><span class="glyphicon glyphicon-cog"></span></a></dd>
                </dl>
            </div>
        </div>
    </main>
    <!-- End Main -->




</body>

</html>

