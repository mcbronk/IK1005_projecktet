<body>
<?php include_once 'header.php'?>;


<main>

    <div class="container-fluid product-bg row">

        <form name="name" action="Controller.php?updateWatch" method="post">
            <br>
            <br>

            <fieldset style="width:400px;">
                <?php

                foreach($watch as $element) {

                    echo $element['ID'];
                }
                echo $watch[0]['ID'];
                ?>




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


        <?php



        ?>

        <?php include_once "footer.php"?>



</body>

</html>