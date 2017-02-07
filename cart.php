<!-- Kundvagnsruta -->
<div class="modal fade" id="kundvagnsruta">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"><span class="glyphicon glyphicon-shopping-cart"></span></h2>
            </div>
            <!-- body -->
            <div class="modal-body">
                <p>Din order är följande</p>
                <!-- plats för att echo ut ordernummer och kunduppgifter när vi har tabeller -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Namn</th>
                            <th>Pris</th>
                            <th>Antal
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                <?php
$summa;

                if(is_array($product)) {

                    foreach ($product as $element) {
                        echo '<tr>';
                        echo '<td>',$element[0]['ID'],'</td>';
                        echo '<td>',$element[0]['Namn'],'</td>';
                        echo '<td>',$element[0]['Pris'],'</td>';
                        echo '<td>',$element[1],'</td>';
                        echo '<td><a href=Controller.php?increaseCart/',$element[0]['ID'],'><span class="glyphicon glyphicon-plus"></span></a></td>';
                        echo '<td><a href=Controller.php?decreaseCart/',$element[0]['ID'],'><span class="glyphicon glyphicon-minus"></span></a></td>';
                        echo '<td><a href=Controller.php?removeFromCart/',$element[0]['ID'],'><span class="glyphicon glyphicon-trash"></span></a></td>';
                        $summa+=$element[0]['Pris']*$element[1];
                        echo '</tr>';


                    }
                    echo "<tr><td colspan='8' align='right'><strong>Att betala: {$summa} kr</strong></td></tr>";
                    echo '<td><button type="button" class="btn btn-info"><a href=Controller.php?endSession/>Köp!</a></button></td>';
                } else {
                    echo "<p>Kundvagnen är tom</p>";
                }



                ?>
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>
