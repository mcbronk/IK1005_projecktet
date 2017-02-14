
<?php include_once'head.php'?>;

<?php
include 'header.php';
?>


<main>
    <div class="table-responsive" style="margin: 5%" >
        <h2>Administera produkter</h2>


        <br>
        <br><br>
        <a href='index.php?Admin/logOut'><button type="button" class="btn btn-success; button pull-right" >Logga ut!</button></a>
        <a href='index.php?Admin/addView'><button type="button" class="btn btn-info" >Lägg till ny produkt!</button></a><br>
        <br>
        <table class="<table col-sm-12 table-bordered table-striped table-condensed cf">
            <thead>
            <tr>
                <th><strong>Bild</strong></th>
                <th><strong>ID</strong></th>
                <th><strong>Namn</strong></th>
                <th><strong>Märke</strong></th>
                <th><strong>Pris</strong></th>
                <th><strong>Kategori</strong></th>
                <th><strong>Lager</strong></th>

                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach($watch as $element) {
                echo '<tr>';
                echo '<td><img src=',$element['Bildurl'],' style=width:32px;height:42px></td>';
                echo '<td>', $element['ID'], '</td>';
                echo '<td>', $element['Namn'], '</td>';
                echo '<td>', $element['Marke'], '</td>';
                echo '<td>', $element['Pris'], '</td>';
                echo '<td>', $element['Kategori'], '</td>';
                echo '<td class="col-4">', $element['Lager'], '</td>';
               // echo '<td>', $element['Beskrivning'], '</td>';
                echo '<td><a href=index.php?Admin/updateView/',$element['ID'],'><button type="button" class="btn btn-info" >Uppdatera</button></a></td>';
                echo '<td><a href=index.php?Admin/deleteWatch/',$element['ID'],'><button type="button" class="btn btn-danger" >Ta Bort</button></a></td>';
                echo '</td>';
            }
           ?>
            </tbody >
        </table >
    </div >
</main>



<?php

include 'footer.php';

?>