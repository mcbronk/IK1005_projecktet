
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

                <a class="navbar-brand" href="Controller.php?goToFirstPage">
                    <img src="img/tie.jpeg" tabindex="1" alt="Företagslogotyp" class="img" width="50" height="50"
                         style="margin-top: -14px">
                </a>
                <a class="navbar-brand" href="#">Exclusive Watches</a>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Sökfunktion -->


                    <li>
                        <form class="navbar-form navbar-left" action='Controller.php?getSearch'  method='post'>
                            <div class="input-group">
                                <input type="text" class="form-control bannersearch" name="searchField" tabindex="2" placeholder="Sök..." >
                                <span class="input-group-btn">
                          <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </form>
                    </li>
                    <!-- Meny -->
                    <li class="dropdown">
                        <a href="produkter.html" tabindex="3" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">PRODUKTER<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Controller.php?getWatchesByCategory/Klockor" tabindex="4">KLOCKOR</a></li>
                            <li><a href="Controller.php?getWatchesByCategory/Armband" tabindex="5">TILLBEHÖR</a></li>
                            <li><a href="cartController.php?showCart" tabindex="6">ACCESOARER</a></li>
                        </ul>
                    <li><a href="#" tabindex="7">KONTAKT</a></li>
                    <li><a href="#" data-toggle="modal" tabindex="8" data-target="#kundvagnsruta"><span
                                class="glyphicon glyphicon-shopping-cart"></span><span class="badge"><?php $_SESSION['cart'][1] ?> </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php include_once ('./cart.php')?>
</div>
<form action="" method="post">

<nav></nav>
</form>
    <!-- End Nav-bar -->
    <!-- Banner --->
