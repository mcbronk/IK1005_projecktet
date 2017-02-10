<?php
include "header.php";
?>
<div class="navbar"></div>

<div class="container loginStyle">

    <div class="col-lg-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 product-div" style="margin-bottom: 10%">
        <h3 style="text-align: center">Logga in!</h3><hr><br>
    <!-- <form role="form"> gav error i w3c validator, Emil sa att den används för Bootstrap -->
    <form action="Controller.php?doLogin" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" value="<?=$postatdata['username']?>" placeholder="Användarnamn">

        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="passwd" value="<?=$postatdata['passwd']?>" placeholder="Lösenord">
        </div>

            <br><button class="btn btn-primary btn-block">Logga in</button>

    </form>
    <p></p>
</div>
</div>

<?php
include "footer.php";
?>
