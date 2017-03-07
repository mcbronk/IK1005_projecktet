
<!DOCTYPE html>
<html lang="sv-se" xml:lang="sv-se">
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

                <a class="navbar-brand" href="index.php?Controller/goToFirstPage">
                    <img src="View/img/tie.jpeg" tabindex="1" alt="Företagslogotyp" class="img" width="50" height="50"
                         style="margin-top: -14px">

                </a>
                <a class="navbar-brand" href="#">Exclusive Watches</a>



            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Sökfunktion -->


                    <li>
                        <form class="navbar-form navbar-left" action='index.php?Controller/getSearch' method='post'>
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
                            <li><a href="index.php?Controller/getWatchesByCategory/Klockor" tabindex="4">KLOCKOR</a></li>
                            <li><a href="index.php?Controller/getWatchesByCategory/Armband" tabindex="5">TILLBEHÖR</a></li>
                            <li><a href="index.php?Controller/showCart" tabindex="6">ACCESOARER</a></li>
                        </ul>
                        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {

                            echo '<li class="dropdown">
                        <a href="produkter.html" tabindex="3" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">ADMIN<span class="caret"></span></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?Admin/doAdmin" tabindex="7">CRUD</a></li>
                            <li><a href="index.php?Admin/logOut" tabindex="8">Logga ut</a></li>
                            
                        </ul>';

                        } ?>
                    <li><a href="#" tabindex="7">KONTAKT</a></li>
                    <li><a href="index.php?Cart/showCart" tabindex="9" ><span
                                class="glyphicon glyphicon-shopping-cart"></span><span class="badge"><?php if
                                (isset($_SESSION['kundvagncount'])) {
                                echo $_SESSION['kundvagncount']; } ?></span></a>


                    </li>
                </ul>
            </div>
        </div>
    </nav>



<form action="" method="post">

<nav></nav>
</form>
    <!-- End Nav-bar -->
    <!-- Banner --->
