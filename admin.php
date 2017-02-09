<body>
<?php include_once 'header.php'?>;


<main>

    <div class="container-fluid product-bg row">

        <form name="name" action="Controller.php?addWatch" method="post">
            <br>
            <br>

            <fieldset style="width:400px;">


                <legend style="color:#A1AB20;font-weight:bold;">Produktuppgifter</legend>
                <br>
                <br>
                <span>ID:</span>
                <br>
                <input type="text" name="id">*
                <br>
                <span>Namn:</span>
                <br>
                <input type="text" name="namn">*
                <br>
                <span>Marke:</span>
                <br>
                <input type="text" name="marke">*
                <br>
                <span>Kategori:</span>
                <br>
                <input type="text" name="kategori">*
                <br>
                <span>Beskrivning:</span>
                <br>
                <input type="text" name="beskrivning">*
                <br>
                <span>Lager:</span>
                <br>
                <input type="text" name="pris">*
                <br>
                <span>Pris:</span>
                <br>
                <input type="text" name="lager">*
                <br>
                <span>Bild Url:</span>
                <br>
                <input type="text" name="bildurl">*
                <br>

                <br>
                <input type="reset" value="Rensa">
                <input type="submit" value="Skicka">







            </fieldset>
        </form></div>


<?php include_once "footer.php"?>;
</body>

