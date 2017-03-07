$(document).ready(function() {

    $('#main').append('<div id="loggin" style="max-width: 300px; margin:0px auto;"></div>');
    $('#loggin').append('<form class="form-signin"  id="loginform"></form>');
    $('#loggin').prepend('<h2>Logga in</h2>');

    $('#loginform').append('<input type="text" id="user" name="user" class="form-control" placeholder="Användarnamn" required autofocus>' + '<br>');

    $('#loginform').append('<input type="password" id="pass" name="pass" class="form-control" placeholder="Lösenord" required>' + '<br>');

    $('#loginform').append('<input type="button" class="adminBtn btn btn-lg btn-secondary btn-block" value="Logga in">');

    $(document).on('click', '.adminBtn',this, function () {

      var user = 'admin';
      var psw = 'admin';

      if(user == $("#user").val() && psw == $("#pass").val()) {
          getAll();

        } else {

          alert('Felaktiga uppgifter!');
      }


    });



});


//Funktion getAll() hämtar alla klockor från databasen genom att anropa index2.php?getAllWatches, får som svar en json_encode som vi sedan slänger
// med till funktionen createTable för att bygga en tabell med alla klockor från databasen.
function getAll() {
    $.getJSON("index2.php?getAllWatches/").done(function (json) {

        createTable(json);
    });
}

$(document).on('click', '.admindoit',this, function () {
    addDialog();
});


$(document).on('click', '.uppdatera',this, function () {
    var data = $(this).attr('data');
    updateDialog(data);
});

/*$(document).on('click', '.plockaBort',this, function () {

    var id = $(this).attr('data');
    alert(id);
    deleteWatch(id);

});*/

function addProdukt() {
    //alert($("#addForm").serialize());
    $.post("index2.php?addWatch", $("#addForm").serialize())
        .done(function () {
            getAll();

        });
}

function updateWatch() {
    $.post("index2.php?updateWatch", $("#updateForm").serialize())
        .done(function () {

            getAll();

        });
}

function deleteWatch(id, name) {

    var answer = confirm("Vill du ta bort den här klockan ?" + name);

    if(answer){
        $.post("index2.php?deleteWatch/" + id);
        getAll();
    }
    else{
        alert("Klockan är inte borttagen.");
    }
}


function addDialog() {

    var text1 ='<form id="addForm">'+
        '<p id="idP">ID</p> <input type="text" id="inputID" name="id" value="" class="form-control"><br>'+
        '<p>Namn</p> <input type="text" id="inputNamn" name="namn"  class="form-control"><br>'+
        '<p>Märke</p> <input type="text" id="inputNamn" name="marke"  class="form-control"><br>'+
        '<p>Kategori</p><input type="text" id="inputMarke" name="kategori"  class="form-control"><br>'+
        '<p id="prisP">Pris</p><input type="text" id="inputKategori" name="pris" class="form-control"><br>'+
        '<p>Beskrivning</p><input type="text" id="inputBeskrivning" name="beskrivning"  class="form-control"><br>'+
        '<p id="lagerP">Lager</p><input type="text" id="inputLager" name="lager" class="form-control"><br>'+
        '<p id="bildP">Bildurl</p><input type="text" id="inputPris" name="bildurl"  class="form-control"><br>'+
        '</form>';

    $('#dialog').dialog().empty();

    $('#dialog').dialog({
        autoOpen: true,
        height: 600,
        width: 500,
        modal: true,
        buttons: {
            "Lägg till produtk!": function () {
                if(validate()){
                    addProdukt();
                    $('#addForm').trigger('reset');
                    $(this).dialog("close");
                }


            },
            "Cancel": function () {

                $('#addForm').trigger('reset');
                $("#dialog").dialog("close");
            }
        },
        close: function () {

            $('#addForm').trigger('reset');
        }
    });
    $("#dialog").append(text1);


}

function updateDialog(id) {
    $.getJSON("index2.php?getWatchesById/" + id).done(fyllDialog);

    var text1 ='<form id="updateForm">'+
        '<p id="idP">ID</p> <input type="text" id="inputID" name="id" value="" class="form-control"><br>'+
        '<p>Namn</p> <input type="text" id="inputNamn" name="namn"  class="form-control"><br>'+
        '<p>Märke</p> <input type="text" id="inputMarke" name="marke"  class="form-control"><br>'+
        '<p>Kategori</p><input type="text" id="inputKategori" name="kategori"  class="form-control"><br>'+
        '<p id="prisP">Pris</p><input type="text" id="inputPris" name="pris" class="form-control"><br>'+
        '<p>Beskrivning</p><input type="text" id="inputBeskrivning" name="beskrivning"  class="form-control"><br>'+
    '<p id="lagerP">Lager</p><input type="text"  id="inputLager" name="lager" class="form-control"><br>'+
    '<p id="bildP">Bildurl</p><input type="text"  id="inputBildurl" name="bildurl"  class="form-control"><br>'+
    '</form>';

    $('#dialog').dialog().empty();

    $('#dialog').dialog({
        autoOpen: true,
        height: 600,
        width: 500,
        modal: true,
        buttons: {
            "Uppdatera produkt!": function () {
                if(validate()){
                    updateWatch();
                    $('#updateForm').trigger('reset');
                    $(this).dialog("close");
                }


            },
            "Cancel": function () {

                $('#updateForm').trigger('reset');
                $("#dialog").dialog("close");
            }
        },
        close: function () {

            $('#updateForm').trigger('reset');
        }
    });
    $("#dialog").append(text1);


}

function fyllDialog(json) {
    $('#inputID').attr('value', json[0].ID);
    $('#inputNamn').attr('value', json[0].Namn);
    $('#inputMarke').attr('value', json[0].Marke);
    $('#inputKategori').attr('value', json[0].Kategori);
    $('#inputBeskrivning').attr('value', json[0].Beskrivning);
    $('#inputPris').attr('value', json[0].Pris);
    $('#inputLager').attr('value', json[0].Lager);
    $('#inputBildurl').attr('value', json[0].Bildurl);

}



function createTable(data) {

    $("#main").empty();

    $(".panel-heading").empty();


    var tbl = document.createElement('table');
    tbl.setAttribute('class', 'table table-hover');
    var th = document.createElement('thead');
    var tbody = document.createElement('tbody');
    var tr = document.createElement('tr');



    var th1 = document.createElement('th');

    var txt1 = document.createTextNode('Produkt');

    var th2 = document.createElement('th');
    var txt2 = document.createTextNode('Namn');
    th2.setAttribute('class','hidden-xs sort');

    var th3 = document.createElement('th');
    th3.setAttribute('class','hidden-xs sort');
    var txt3 = document.createTextNode('Kategori');

    var th4 = document.createElement('th');
    var txt4 = document.createTextNode('Pris');
    th4.setAttribute('class','hidden-xs sort');

    var th5 = document.createElement('th');
    var txt5 = document.createTextNode('Beskrivning');
    th5.setAttribute('class','hidden-xs sort');

    var th6 = document.createElement('th');
    var txt6 = document.createTextNode('Uppdatera');

    var th7 = document.createElement('th');
    var txt7 = document.createTextNode('Ta Bort');



    th1.appendChild(txt1);
    tr.appendChild(th1);

    th2.appendChild(txt2);
    tr.appendChild(th2);

    th3.appendChild(txt3);
    tr.appendChild(th3);

    th4.appendChild(txt4);
    tr.appendChild(th4);

    th5.appendChild(txt5);
    tr.appendChild(th5);

    th6.appendChild(txt6);
    tr.appendChild(th6);

    th7.appendChild(txt7);
    tr.appendChild(th7);


    th.appendChild(tr);

    tbl.appendChild(th);

    $.each(data,function(key,obj){

        var row = tbl.insertRow(-1);


        row.insertCell(-1).innerHTML = "<p>ID<strong> "+obj.ID+"</strong></p><hr><img src='" + obj.Bildurl + "'style='max-width:62px;max-height:82px; width: auto; height: auto; '>";

        var cell2 = row.insertCell(-1);

        cell2.innerHTML = data[key].Namn;

        var cell3 = row.insertCell(-1);

        cell3.innerHTML = obj.Kategori;
        var cell4 = row.insertCell(-1);
        cell4.innerHTML = obj.Pris;

        var cell5 = row.insertCell(-1);
        cell5.innerHTML = obj.Beskrivning;


        var cell6 = row.insertCell(-1);
        cell6.innerHTML = "<button data='"+obj.ID+"'class='btn btn-info uppdatera'  title='Ta bort' >Uppdatera</button>";

        var cell7 = row.insertCell(-1);
        cell7.innerHTML = "<button onclick='deleteWatch(\""+obj.ID +"\",\""+ obj.name+"\")' class='btn btn-danger plockaBort'  title='Ta bort' >Ta bort</button>"

        cell2.setAttribute('class','hidden-xs sort');
        cell3.setAttribute('class','hidden-xs sort');
        cell4.setAttribute('class','hidden-xs sort');
        cell5.setAttribute('class','hidden-xs sort');

        tbody.appendChild(row);


    });

    tbl.appendChild(tbody);


    // Bygger till divvar för att hålla tabellen med bootstrap.
    var mainet = $("<div>");
    mainet.attr('class','table table-responsive');

    var maindiv1 = $("<div>");
    maindiv1.attr('class','panel panel-default');

    var maindiv2 = $("<div>")
    maindiv2.attr('class','panel-heading');


    var addBtn = $("<Button>").text('Lägg till produkt!');
    addBtn.attr('class','btn btn-success admindoit');

    maindiv1.append(addBtn);






    maindiv1.append(maindiv2);
    mainet.append(maindiv1);

    $("#main").append(mainet);
    $('.panel-heading').append(tbl);


}



function validate() {
    var error = 0; // Error variabel med värdet 0

    var id = $("#inputID").val();
    var price = $("#inputPris").val();
    var pic = $("#inputBildurl").val();
    var warehouse = $("#inputLager").val();
    //console.log(pic);
    var picture = pic.substr(pic.length -4);
    // console.log(picture);



    //Kollar om ID inte är en interger och inte ett numeriskt värde
    if(!Number.isInteger(id) && !$.isNumeric(id)){
        $("#idP").text("ID nummer måste vara ett heltal.").css("color","red");
        error ++; // error ökas med en
    } else {
        $("#idP").text("ID").css("color","black"); // Återställer elementet till normala texten

    }
    //Kollar om priset är en siffra eller ej
    if(!$.isNumeric(price)) {
        $("#prisP").text("Priset måste innehålla siffror").css("color","red");
        error ++; // Error ökas med en om det är fel på inputen
    } else {
        $("#prisP").text("Pris").css("color","black");
    }


    //Kollar "filformat" på bilden, om det är en jpg, png eller gif
    if(picture == ".jpg" || picture == ".png" || picture == ".gif"){
        $("#bildP").text("Bildurl").css("color","black");
    }else {
        $("#bildP").text("Bilden måste sluta på .png .jpg eller .gif filformat").css("color","red");
        error++;
    }

    //Kollar om lagerstatus är skrivet i siffror
  if(!$.isNumeric(warehouse) && !Number.isInteger(id)){
      $("#lagerP").text("Du måste skriva hur många det finns i lager i heltal.").css("color","red");
        error++;
  }
  else {
      $("lagerP").text("Lager").css("color","black");

  }

    //Om error är lika med 0 så ska true returneras och man kan uppdatera eller lägga till
    if(error == 0) {
        return true;
    }
    //Annars får man error meddelanden som bara den
    else {
        return false;
    }

}