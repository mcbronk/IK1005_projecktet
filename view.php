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

<body>
<div class="container-fluid">
    <!-- Nav-bar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Företagslogotyp -->

                <a class="navbar-brand" href="#">
                    <img src="img/tie.jpeg" tabindex="1" alt="Företagslogotyp" class="img" width="50" height="50"
                         style="margin-top: -14px">
                </a>
                <a class="navbar-brand" href="#">Exclusive Watches</a>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Sökfunktion -->
                    <li>
                        <form class="navbar-form navbar-left" method="post" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control bannersearch" name="searchField" tabindex="2" placeholder="Sök...">
                                <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                      </span>
                            </div>
                        </form>
                    </li>
                    <!-- Meny -->
                    <li class="dropdown">
                        <a href="produkter.html" tabindex="3" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">PRODUKTER<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Controller.php?getAllWatches" tabindex="4">KLOCKOR</a></li>
                            <li><a href="tillbehor.html" tabindex="5">TILLBEHÖR</a></li>
                            <li><a href="access.html" tabindex="6">ACCESOARER</a></li>
                        </ul>
                    <li><a href="#" tabindex="7">KONTAKT</a></li>
                    <li><a href="#" data-toggle="modal" tabindex="8" data-target="#kundvagnsruta"><span
                                    class="glyphicon glyphicon-shopping-cart"></span><span class="badge"> 1</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Nav-bar -->
    <nav class="navbar navbar-default"></nav>
    <!-- Banner --->
    <section class="hidden-xs">
        <div class="row">
            <div id="my-slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators dot nav -->
                <ol class="carousel-indicators">
                    <li data-target="#my-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#my-slider" data-slide-to="1"></li>
                    <li data-target="#my-slider" data-slide-to="2"></li>
                </ol>
                <!-- wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="img/rolex-lady-banner.jpg" alt="Rolex Lady-banner">
                        <div class="carousel-caption"></div>
                    </div>

                    <div class="item">
                        <img src="img/rolex-city-banner.jpg" alt="Roley-banner">
                        <div class="carousel-caption"></div>
                    </div>

                    <div class="item">
                        <img src="img/omega-london-banner.jpg" alt="Omega-banner">
                        <div class="carousel-caption"></div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <a class="left carousel-control" href="#my-slider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="right carousel-control" href="#my-slider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>
        </div>
    </section>
    <!-- End banner -->

    <!-- Breadcrums-->
    <!-- Breadcrums visas inte på index-sidan -->

    <!-- Main -->
    <main>

        <div class="container-fluid product-bg row">
            <?php

            if (count($watch, COUNT_NORMAL) > 1) {

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

            } else {

                foreach ($watch as $element) {


                    echo '   <div class ="container-fluid product-bg row" >';
                    // echo'<h1 class="margin" style="color:black">Guld pin</h1>';

                    echo '<div class="col-md-6 col-md-offset-3 ">';

                    echo ' <div class="thumbnail">';
                    echo '  <img class="buy-img-inside" src="', $element['Bildurl'], '" alt="">';
                    echo '   <div class="caption-full">';
                    echo '  <hr>';
                    echo ' <h4>', $element['Marke'], '</h4>';

                    echo '<p>', $element['Beskrivning'], '</p>';
                    echo '<p></p><hr>';
                    echo '   <h4 class="pull-center"><strong>Pris: </strong>', $element['Pris'], ' SEK</h4>';
                    echo '   <button type="button" class="buy-btns-2">Lägg i kundkorg</button>';

                    echo '     </div>
   

            </div>
        </div>
   

</div>';




                }
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

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="container-fluid bg-3 text-center">
                <!-- Div. logotyper col-lg-2 col-md-1 col-sm-4 col-xs-4 -->
                <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                    <img src="img/tryggehandel.png" class="img-responsive footer-img" alt="Tryggehandel">
                </div>
                <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                    <img src="img/amex.png" class="img-responsive footer-img" alt="Amex">
                </div>
                <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                    <img src="img/visa.png" class="img-responsive footer-img" alt="Visa">
                </div>
                <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                    <img src="img/klarna.png" class="img-responsive footer-img" alt="Klarna">
                </div>

                <!-- Copyright -->

                <div class="col-lg-3 col-sm-12 col-xs-12 footer-div-padding-logo">
                    <p class="footer-txt-copyr"> Copyright Exclusive Watches 2017<br> All rights reserved ©</p>
                </div>

                <!-- Knapp för toppen -->

                <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button"
                   data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>


                <!-- Garantiruta -->
                <div class="col-lg-1 col-sm-2 col-xs-3 footer-div-padding-resten">
                    <a href="#" data-toggle="modal" tabindex="15" data-target="#garantiruta"
                       class="footer-txt">Garanti</a>
                </div>

                <!-- Betalningssruta -->
                <div class="col-lg-1 col-sm-2 col-xs-3 footer-div-padding-resten">
                    <a href="#" data-toggle="modal" tabindex="16" data-target="#betalningsruta" class="footer-txt">Betalning</a>
                </div>
                <!-- Leveransruta -->
                <div class="col-lg-1 col-md-1 col-xs-3 footer-div-padding-resten">
                    <a href="#" data-toggle="modal" tabindex="17" data-target="#leveransruta" class="footer-txt">Leverans</a>
                </div>
                <!-- Returruta -->
                <div class="col-lg-1 col-md-1 col-xs-3 footer-div-padding-resten">
                    <a href="#" data-toggle="modal" tabindex="18" data-target="#returruta" class="footer-txt">Retur</a>
                </div>
            </div>


        </div>

    </footer>
    <!-- End Footer -->


    <!-- Nyhetsbrev & Admin modals -->
    <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Admin login</h3>
                </div>
                <!--body(form)-->
                <div class="modal-body">
                    <!-- <form role="form"> gav error i w3c validator, Emil sa att den används för Bootstrap -->
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Användarnamn">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Lösenord">
                    </div>
                    <!--  </form> -->

                    <!--button-->
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Logga in</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="popUpNews">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Nyhetsbrev</h3>
                </div>
                <!--body(form)-->
                <div class="modal-body">
                    <!-- <form role="form"> gav error i w3c validator, Emil sa att den används för Bootstrap -->
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Ange e-post:">
                    </div>
                    <!-- </form> -->

                    <!--button-->
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Skicka</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modals-->

    <!--Modal för garanti-->
    <div class="modal fade" id="garantiruta">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title h2-popup-ruta">Garanti</h2>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <h3 class="h3-popup-ruta">Auktoriserad tillverkargaranti</h3>
                    <p class="p-popup-ruta">Klockan levereras med giltigt stämplad garanti ifrån auktoriserad
                        återförsäljare. Tillverkargaranti innebär att klockan kan lämnas in hos valfri auktoriserad
                        återförsäljare i Sverige och utomlands.
                        Officiella garantier gäller vanligtvis 24 månader eller längre och omfattar tillverknings- och
                        materialfel.
                        Har du ingen auktoriserad butik i din närhet? Inga problem, skicka klockan till oss så
                        ombesörjer vi garantiärendet åt dig med tillverkaren.</p>
                    <h3 class="h3-popup-ruta">Om ett problem uppstår</h3>
                    <p class="p-popup-ruta">Om ett problem skulle uppstå med din klocka behöver du bara kontakta oss så
                        hjälper vi dig snabbt och bekymmersfritt. Vi hjälper dig med information om vart du kan vända
                        dig alternativt med instruktioner om du önskar oss hjälpa dig med ditt ärende.</p>
                    <h3 class="h3-popup-ruta">Garantins omfattning</h3>
                    <p class="p-popup-ruta">Garantin omfattar tillverknings- och materialfel. Observera att
                        originalgarantibevis måste bifogas vid inlämning.
                        <br><br><strong>Observera att garantier inte täcker:</strong></p>
                    <ul class="ul-popup-ruta">
                        <li>skador som orsakats av felaktig skötsel, slarv eller andra skador som ej beror på material-
                            eller tillverkningsfel.
                        </li>
                        <li>skador orsakade av ingrepp av icke kvalificerad reparatör.</li>
                        <li>skador krona och glas.</li>
                        <li>skador på länkar, läderarmband, plastarmband samt skador på uret.</li>
                        <li>om serienumret ändrats eller borttagits.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Modal för betalning -->
    <div class="modal fade" id="betalningsruta">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title h2-popup-ruta">Betalning</h2>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <h3 class="h3-popup-ruta">Betalningsmöjligheter</h3>
                    <p class="p-popup-ruta">För att passa kunders olika behov erbjuder vi ett flertal olika
                        betalningsmetoder. Ni kan välja att betala med betalkort, Paypal, direktbetalning eller bankgiro
                        vid beställningstillfället alternativt efter att era varor levererats genom att välja faktura-
                        eller delbetalning.</p>
                    <h3 class="h3-popup-ruta">Betal- och personuppgifter</h3>
                    <p class="p-popup-ruta">Vi garanterar att Era uppgifter behandlas på ett säkert och tryggt sätt
                        enligt de rekommendationer som finns för dessa.</p>
                </div>
            </div>
        </div>
    </div>

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
                    <img src="img/kundvagn.png" alt="Kundvagnslogotyp" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <!--Leverans Modal-->
    <div class="modal fade" id="leveransruta">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title h2-popup-ruta">Leverans</h2>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <h3 class="h3-popup-ruta">Helförsäkring</h3>
                    <p class="p-popup-ruta">Vi skickar dina varor med PostNord och DHL i Sverige och med FedEx för
                        utlandsförsändelser. Våra försändelser är alltid spårbara och helförsäkrade för största möjliga
                        trygghet.</p>
                    <h3 class="h3-popup-ruta">Leveranstider</h3>
                    <p class="p-popup-ruta">Om du köper en av våra lagermodeller skickas din klocka samma eller
                        nästkommande arbetsdag och leverans inom Sverige tar normalt en till två dagar.
                        Utlandsförsändelser tar normalt 2–4 dagar i norra Europa och något längre för resterande delar
                        av världen.
                        Kort efter att din försändelse paketerats och skickats får du ett e-postmeddelande med
                        spårningsnummer så att du kan följa paketets väg till dig.</p>
                </div>
            </div>
        </div>
    </div>
    <!---Retur Modal-->
    <div class="modal fade" id="returruta">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title h2-popup-ruta">Retur</h2>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <h3 class="h3-popup-ruta">Returfrågor</h3>
                    <p class="p-popup-ruta">Kontakta oss så skickar vi en retursedel per e-post, med denna kan du enkelt
                        och kostnadsfritt returnera din vara inom 90 dagar om du ångrar ditt köp. Klockan måste dock
                        vara oanvänd.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- SLUT! Nyhetsbrev & Admin modals -->
    <!--Javascript för uppknappen-->
    <script type="text/javascript" tabindex="19">
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 1500);
                return false;
            });

            $('#back-to-top').tooltip('show');

        });
    </script>
</div>


</body>

</html>

