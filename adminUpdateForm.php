<body>
<?php include_once 'header.php'?>;


<main>

    <div class="container-fluid product-bg row">




    <div class="container" style="padding-left: 5%; padding-top: 5%;">
        <H2>Produkt<?php echo $watch[0]['ID'] ?><?php echo $watch[0]['Namn'] ?></H2><hr>


        <form name="name" action="Controller.php?updateWatch" method="post">


            <div class="row test">




                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"></span></label>
                            <input class="form-control"  name="id" value="<?php echo $watch[0]['ID'] ?>" placeholder="ID" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"></span></label>
                            <input class="form-control"  name="namn"value="<?php echo $watch[0]['Namn'] ?>" placeholder="Namn" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?=$errormessages['marke']?></span></label>
                            <input class="form-control"  name="marke" value="<?php echo $watch[0]['Marke'] ?>" placeholder="Märke" type="text" required>
                        </div>


                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?=$errormessages['kategori']?></span></label>
                            <input class="form-control"  name="kategori" value="<?php echo $watch[0]['Kategori'] ?>" placeholder="Kategori" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?=$errormessages['pris']?></span></label>
                            <input class="form-control"  name="pris" value="<?php echo $watch[0]['Pris'] ?>"placeholder="Pris" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?=$errormessages['lager']?></span></label>
                            <input class="form-control"  name="lager" value="<?php echo $watch[0]['Lager'] ?>"placeholder="Lager" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?=$errormessages['bildurl']?></span></label>
                            <input class="form-control"  name="bildurl" value="<?php echo $watch[0]['Bildurl'] ?>" placeholder="Bildurl" type="text" required>
                        </div>
                    </div>
                    <label><span style="color: red"><?=$errormessages['beskrivning']?></span></label>
                    <textarea class="form-control"  type="text" name="beskrivning" placeholder="Beskrivning" rows="5"><?php echo $watch[0]['Beskrivning'] ?></textarea>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn pull-right btn-success" type="submit">Uppdatera</button>
                        </div>
                    </div>


            </div>

        </form>
        <hr>
    </div>


        <?php



        ?>

        <?php include_once "footer.php"?>



</body>

</html>