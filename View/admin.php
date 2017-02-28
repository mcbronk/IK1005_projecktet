<body>
<?php include_once'head.php'?>
<?php include_once 'header.php' ?>;


<main>

   <?php ?><div class="container" style=" padding-top: 5%; ">
        <H2>Lägg till produkt!</H2><hr>

    <form name="name" action="index.php?Admin/addWatch" method="post">


        <div class="row test">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label><span style="color: red"><?=$errormessages['id']?></span></label>
                        <input class="form-control"  name="id" value="<?=$postatdata['id']?>"placeholder="ID" type="text">
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['namn']?></span></label>
                    <input class="form-control"  name="namn"value="<?=$postatdata['namn']?>" placeholder="Namn" type="text">
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['marke']?></span></label>
                    <input class="form-control"  name="marke" value="<?=$postatdata['marke']?>" placeholder="Märke" type="text">
                </div>


                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['kategori']?></span></label>
                    <input class="form-control"  name="kategori" value="<?=$postatdata['kategori']?>"placeholder="Kategori" type="text">
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['pris']?></span></label>
                    <input class="form-control"  name="pris" value="<?=$postatdata['pris']?>"placeholder="Pris" type="text">
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['lager']?></span></label>
                    <input class="form-control"  name="lager" value="<?=$postatdata['lager']?>"placeholder="Lager" type="text">
                </div>
                    <div class="col-sm-6 form-group">
                        <label><span style="color: red"><?=$errormessages['bildurl']?></span></label>
                        <input class="form-control"  name="bildurl" value="<?=$postatdata['bildurl']?>" placeholder="Bildurl" type="text">
                    </div>
            </div>
                <label><span style="color: red"><?=$errormessages['beskrivning']?></span></label>
                <textarea class="form-control"  name="beskrivning" value="<?=$postatdata['beskrivning']?>"placeholder="Beskrivning" rows="5"></textarea>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button class="btn pull-right btn-danger" type="submit">Lägg till produkt!</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
        <hr>
    </div>

<?php include_once "footer.php" ?>;
</body>

