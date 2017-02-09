<body>
<?php include_once 'header.php'?>;


<main>

   <?php /*
    <div class="container-fluid product-bg row">




        <form name="name" action="Controller.php?addWatch" method="post">
            <br>
            <br>

            <fieldset style="width:400px;">


                <legend style="color:#A1AB20;font-weight:bold;">Produktuppgift</legend>
                <br>
                <br>
                <label>Id: <span style="color: red"><?=$errormessages['id']?></span></label>
                <br>
                <input type="text" name="id" value="<?=$postatdata['id']?>">*
                <br>
                <label>Namn: <span style="color: red"><?=$errormessages['namn']?></span></label>
                <br>
                <input type="text" name="namn" value="<?=$postatdata['namn']?>">*
                <br>
                <label>Märke: <span style="color: red"><?=$errormessages['marke']?></span></label>
                <br>
                <input type="text" name="marke" value="<?=$postatdata['marke']?>">*
                <br>
                <label>Kategori: <span style="color: red"><?=$errormessages['kategori']?></span></label>
                <br>
                <input type="text" name="kategori" value="<?=$postatdata['kategori']?>">*
                <br>
                <label>Beskrivning: <span style="color: red"><?=$errormessages['beskrivning']?></span></label>
                <br>
                <input type="text" name="beskrivning" value="<?=$postatdata['beskrivning']?>">*
                <br>
                <label>Pris: <span style="color: red"><?=$errormessages['pris']?></span></label>
                <br>
                <input type="text" name="pris" value="<?=$postatdata['pris']?>">*
                <br>
                <label>Lager: <span style="color: red"><?=$errormessages['lager']?></span></label>
                <br>
                <input type="text" name="lager" value="<?=$postatdata['lager']?>">*
                <br>
                <label>Bildurl: <span style="color: red"><?=$errormessages['bildurl']?></span></label>
                <br>
                <input type="text" name="bildurl" value="<?=$postatdata['bildurl']?>">*
                <br>

                <br>

                <input type="submit" value="Skicka">







            </fieldset>
        </form></div>

    */?><div class="container" style="padding-left: 5%; padding-top: 5%;">
        <H2>Lägg till produkt!</H2><hr>

    <form name="name" action="Controller.php?addWatch" method="post">


        <div class="row test">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label><span style="color: red"><?=$errormessages['id']?></span></label>
                        <input class="form-control"  name="id" placeholder="ID" type="text" required>
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['namn']?></span></label>
                    <input class="form-control"  name="namn"value="<?=$postatdata['namn']?>" placeholder="Namn" type="text" required>
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['marke']?></span></label>
                    <input class="form-control"  name="marke" value="<?=$postatdata['marke']?>" placeholder="Märke" type="text" required>
                </div>


                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['kategori']?></span></label>
                    <input class="form-control"  name="kategori" value="<?=$postatdata['kategori']?>"placeholder="Kategori" type="text" required>
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['pris']?></span></label>
                    <input class="form-control"  name="pris" value="<?=$postatdata['pris']?>"placeholder="Pris" type="text" required>
                </div>

                <div class="col-sm-6 form-group">
                    <label><span style="color: red"><?=$errormessages['lager']?></span></label>
                    <input class="form-control"  name="lager" value="<?=$postatdata['lager']?>"placeholder="Lager" type="text" required>
                </div>
                    <div class="col-sm-6 form-group">
                        <label><span style="color: red"><?=$errormessages['bildurl']?></span></label>
                        <input class="form-control"  name="bildurl" value="<?=$postatdata['bildurl']?>" placeholder="Bildurl" type="text" required>
                    </div>
            </div>
                <label><span style="color: red"><?=$errormessages['beskrivning']?></span></label>
                <textarea class="form-control"  name="beskrivning" value="<?=$postatdata['beskrivning']?>"placeholder="Beskrivning" rows="5"></textarea>
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

<?php include_once "footer.php"?>;
</body>

