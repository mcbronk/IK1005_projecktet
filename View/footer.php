<div class="container-fluid bg-1 text-center row">
    <h3>Auktoriserad återförsäljare</h3>

    <!-- Klocklogotyper -->
    <div class="col-sm-12 ">
        <a class="link-watchLogo" href="https://www.rolex.com/" tabindex="9" target="_blank">
            <img src="View/img/rolex-logo.png" alt="Rolex logotyp" class="img-circle img-size-main">
        </a>

        <a class="link-watchLogo" href="https://www.breitling.com/en/" tabindex="10" target="_blank">
            <img src="View/img/breitling-logo.png" alt="Breitling logotyp" class="img-circle img-size-main">
        </a>

        <a class="link-watchLogo" href="http://www.hublot.com/en/" tabindex="11" target="_blank">
            <img src="View/img/hublot-logo.png" alt="Hubot logotyp" class="img-circle img-size-main">
        </a>

        <a class="link-watchLogo" href="https://www.omegawatches.com/" tabindex="12" target="_blank">
            <img src="View/img/omega-logo.png" alt="Omega logotyp" class="img-circle img-size-main">
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
            <dd><a href="index.php?Admin/doAdmin" tabindex="14"
                   title="Admins"><span class="glyphicon glyphicon-cog"></span></a></dd>
        </dl>
    </div>
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
                    <form action="index.php?Admin/doLogin" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" value="" placeholder="Användarnamn">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="passwd" value="" placeholder="Lösenord">
                    </div>
                    <!--  </form> -->

                    <!--button-->
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Logga in</button>
                    </div>
                    </form>
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
</div>


<footer>
    <div class="row">
        <div class="container-fluid bg-3 text-center">
            <!-- Div. logotyper col-lg-2 col-md-1 col-sm-4 col-xs-4 -->
            <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                <img src="View/img/tryggehandel.png" class="img-responsive footer-img" alt="Tryggehandel">
            </div>
            <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                <img src="View/img/amex.png" class="img-responsive footer-img" alt="Amex">
            </div>
            <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                <img src="View/img/visa.png" class="img-responsive footer-img" alt="Visa">
            </div>
            <div class="col-lg-1 col-sm-3 col-xs-3 footer-div-padding-logo">
                <img src="View/img/klarna.png" class="img-responsive footer-img" alt="Klarna">
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
                        <p class="p-popup-ruta">Klockan levereras med giltigt stämplad garanti ifrån auktoriserad återförsäljare. Tillverkargaranti innebär att klockan kan lämnas in hos valfri auktoriserad återförsäljare i Sverige och utomlands.
                            Officiella garantier gäller vanligtvis 24 månader eller längre och omfattar tillverknings- och materialfel.
                            Har du ingen auktoriserad butik i din närhet? Inga problem, skicka klockan till oss så ombesörjer vi garantiärendet åt dig med tillverkaren.</p>
                        <h3 class="h3-popup-ruta">Om ett problem uppstår</h3>
                        <p class="p-popup-ruta">Om ett problem skulle uppstå med din klocka behöver du bara kontakta oss så hjälper vi dig snabbt och bekymmersfritt. Vi hjälper dig med information om vart du kan vända dig alternativt med instruktioner om du önskar oss hjälpa dig med ditt ärende.</p>
                        <h3 class="h3-popup-ruta">Garantins omfattning</h3>
                        <p class="p-popup-ruta">Garantin omfattar tillverknings- och materialfel. Observera att originalgarantibevis måste bifogas vid inlämning.
                            <br><br><strong>Observera att garantier inte täcker:</strong></p>
                        <ul class="ul-popup-ruta">
                            <li>skador som orsakats av felaktig skötsel, slarv eller andra skador som ej beror på material- eller tillverkningsfel.</li>
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
                        <p class="p-popup-ruta">För att passa kunders olika behov erbjuder vi ett flertal olika betalningsmetoder. Ni kan välja att betala med betalkort, Paypal, direktbetalning eller bankgiro vid beställningstillfället alternativt efter att era varor levererats genom att välja faktura- eller delbetalning.</p>
                        <h3 class="h3-popup-ruta">Betal- och personuppgifter</h3>
                        <p class="p-popup-ruta">Vi garanterar att Era uppgifter behandlas på ett säkert och tryggt sätt enligt de rekommendationer som finns för dessa.</p>
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
                        <p class="p-popup-ruta">Vi skickar dina varor med PostNord och DHL i Sverige och med FedEx för utlandsförsändelser. Våra försändelser är alltid spårbara och helförsäkrade för största möjliga trygghet.</p>
                        <h3 class="h3-popup-ruta">Leveranstider</h3>
                        <p class="p-popup-ruta">Om du köper en av våra lagermodeller skickas din klocka samma eller nästkommande arbetsdag och leverans inom Sverige tar normalt en till två dagar. Utlandsförsändelser tar normalt 2–4 dagar i norra Europa och något längre för resterande delar av världen.
                            Kort efter att din försändelse paketerats och skickats får du ett e-postmeddelande med spårningsnummer så att du kan följa paketets väg till dig.</p>
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
                        <p class="p-popup-ruta">Kontakta oss så skickar vi en retursedel per e-post, med denna kan du enkelt och kostnadsfritt returnera din vara inom 90 dagar om du ångrar ditt köp. Klockan måste dock vara oanvänd.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Javascript för uppknappen-->
        <script type="text/javascript" tabindex="19">
            $(document).ready(function(){
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



</footer>
</div>
</body>
</html>