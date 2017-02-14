<?php
include "header.php";
?>
<div class="navbar"></div>

<div class="container">

    <div class="col-lg-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 product-div" style="margin-bottom: 10%">
        <h2 style="text-align: center">Admin</h2><hr><br>
    <!-- <form role="form"> gav error i w3c validator, Emil sa att den används för Bootstrap -->
    <form action="index.php?Admin/doLogin" method="post">
        <div class="form-group">
            <div class="form-group has-feedback">
                <label class="control-label">Användarnamn: </label>



            <input type="text" class="form-control" name="username" value="<?=$postatdata['username']?>" placeholder="Användarnamn">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>
            </div>

        </div>

        <div class="form-group">
            <div class="form-group has-feedback">
                <label class="control-label">Lösenord: </label>
            <input type="password" class="form-control" name="passwd" value="<?=$postatdata['passwd']?>" placeholder="Lösenord">
                <i class="glyphicon glyphicon-lock form-control-feedback"></i>
            </div>
        </div>

            <br><button class="btn btn-primary btn-block">Logga in</button>



    </form>
    <p>           <?=$errormessages['username']?>
    </p>
</div>
</div>

<?php
include "footer.php";
?>
