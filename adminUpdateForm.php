<body>
<?php include_once 'header.php'?>;


<main>

    <div class="container-fluid product-bg row">

        <form name="name" action="Controller.php?updateWatch" method="post">
            <br>
            <br>

            <fieldset style="width:400px;">





                <br>
                <br>

                <div class="form-group col-md-8">
                    <label>ID</label>
                    <input type="text" class="form-control" name="id" style="font-weight: bold" value="<?php echo $watch[0]['ID'] ?>" >
                </div>

                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Namn</label>
                    <input type="text" class="form-control" name="namn" value="<?php echo $watch[0]['Namn'] ?>" >
                </div>

                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Märke</label>
                    <input type="text" class="form-control" name="marke" value="<?php echo $watch[0]['Marke'] ?>" >
                </div>

                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?php echo $watch[0]['Kategori'] ?>" >
                </div>

                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Pris</label>
                    <input type="text" class="form-control" name="pris" value="<?php echo $watch[0]['Pris'] ?>" >
                </div>

                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Lager</label>
                    <input type="text" class="form-control" name="lager" value="<?php echo $watch[0]['Lager'] ?>" >
                </div>

                <div class="form-group col-md-8">
                    <label for="exampleInputEmail1">Bildurl</label>
                    <input type="text" class="form-control" name="bildurl" value="<?php echo $watch[0]['Bildurl'] ?>" >
                </div>

                <div class="form-group  col-md-8">
                    <label for="exampleInputEmail1">Beskrivning</label>
                    <input type="text" class="form-control" name="beskrivning" value="<?php echo $watch[0]['Beskrivning'] ?>" >

                </div>



                <br>
                <input type="reset" value="Ångra">
                <input type="submit" value="Uppdatera">









            </fieldset>
        </form>
    </div>

    <div class="container" style="padding-left: 5%; padding-top: 5%;">
        <H2>Uppdatera produkt!</H2><hr>

        <form name="name" action="Controller.php?updateWatch" method="post">


            <div class="row test">

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?php echo $watch[0]['ID'] ?></span></label>
                            <input class="form-control"  name="id" value="<?php echo $watch[0]['ID'] ?>" placeholder="ID" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label><span style="color: red"><?php echo $watch[0]['Namn'] ?></span></label>
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
                            <button class="btn pull-right" type="submit">Send</button>
                        </div>
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