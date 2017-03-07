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


//trycks knappen med class admindoit körs den här funktionen, som i sin tur anropar funktionen addDialog().
$(document).on('click', '.admindoit',this, function () {
    addDialog();
});

$(document).on('click', '.homeBtn',this, function () {

    window.location.href='index.php';

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

//En funktion som lägger till en produkt
function addProdukt() {

    //Kallar på funktionen i index2.php som i sin tur kallar på modellen
    /*
    Serialize slår ihop alla input element i en form till en array,
    genom denna arrayen kommer vi åt värden sen som skickas till DB.
     */
    $.post("index2.php?addWatch/    ", $("#addForm").serialize())
        .done(function () {
            //En egen funktion som heter getAll som populerar tabellen
            getAll();

        });
}

//Samma som ovan fast kallar på update
function updateWatch() {
    $.post("index2.php?updateWatch/", $("#updateForm").serialize())
        .done(function () {

            getAll();

        });
}

function deleteWatch(id, name) {

    //En variabel som sparar true eller false beroende på hur de klickar i rutan
    var answer = confirm("Vill du ta bort den här klockan " + name +" ?");

    //If (answer == true) är samma sak som if(answer)
    if(answer){
        //Tar bort klockan
        $.post("index2.php?deleteWatch/" + id);
        getAll();
    }
    else{
        //annars tar inte bort klockan
        alert("Klockan är inte borttagen.");
    }
}


function addDialog() {
    //Variabel med hela formen i sig.
    var text1 ='<form id="addForm">'+
        '<p id="idP">ID</p> <input type="text" id="inputID" name="id" value="" class="form-control"><br>'+
        '<p id="namnP">Namn</p> <input type="text" id="inputNamn" name="namn"  class="form-control"><br>'+
        '<p id="markeP">Märke</p> <input type="text" id="inputMarke" name="marke"  class="form-control"><br>'+
        '<p id="kategoriP">Kategori</p> <input type="text" id="inputKategori" name="kategori"  class="form-control"><br>'+
        '<p id="beskrivningP">Beskrivning</p><input type="text" id="inputBeskrivning" name="beskrivning"  class="form-control"><br>'+
        '<p id="lagerP">Lager</p><input type="text"  id="inputLager" name="lager" class="form-control"><br>'+
        '<p id="prisP">Pris</p><input type="text" id="inputPris" name="pris" class="form-control"><br>'+
        '<p id="bildP">Bildurl</p><input type="text"  id="inputBildurl" name="bildurl"  class="form-control"><br>'+
        '</form>';

    //Tömmer #dialog som ligger i html
    $('#dialog').dialog().empty();

    //Skapar upp en modal av en dialog i HTML
    //Lite värden för dialogen här under
    $('#dialog').dialog({
        autoOpen: true,
        height: 600,
        width: 500,
        modal: true,
        buttons: {
            //Knappar, lägg till produkt
            "Lägg till produkt!": function () {
               if(validate()){
                    addProdukt();
                    $('#addForm').trigger('reset');
                    $(this).dialog("close");
                }


            },
            //Cancel funktionaliteten, ska reseta modalen och stänga rutan
            "Cancel": function () {

                $('#addForm').trigger('reset');
                $("#dialog").dialog("close");
            }
        },
        //Stäng funkationitet som resetar.
        close: function () {

            $('#addForm').trigger('reset');
        }
    });
    /*
    Lägger till text1 variabeln som innehåller formen på #dialog diven som ligger i html
    På svenska så fyller den ut modalen som är en div med input och P element.
     */
    $("#dialog").append(text1);


}

//Samma princip som för add dialogen, barao lika namn
function updateDialog(id) {
    //Fyller upp alla inputs i modalen med värden från getWatchesByID och funktionen fylldialog
    $.getJSON("index2.php?getWatchesById/" + id).done(fyllDialog);

    var text1 ='<form id="updateForm">'+
        '<p id="idP">ID</p> <input type="text" id="inputID" name="id" value="" class="form-control"><br>'+
        '<p id="namnP">Namn</p> <input type="text" id="inputNamn" name="namn"  class="form-control"><br>'+
        '<p id="markeP">Märke</p> <input type="text" id="inputMarke" name="marke"  class="form-control"><br>'+
        '<p id="kategoriP">Kategori</p> <input type="text" id="inputKategori" name="kategori"  class="form-control"><br>'+
        '<p id="beskrivningP">Beskrivning</p><input type="text" id="inputBeskrivning" name="beskrivning"  class="form-control"><br>'+
        '<p id="lagerP">Lager</p><input type="text"  id="inputLager" name="lager" class="form-control"><br>'+
        '<p id="prisP">Pris</p><input type="text" id="inputPris" name="pris" class="form-control"><br>'+
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


//Inspirerad från Hans exempelkod för att fylla textfälten.
/*
Varje input får ett värde från json array på index plats 0
Det finns bara 1 värde i json arrayen vid det tillfället i och med att den anropar getWatchesByID
Den fyller ut de olika fälten med värden som har hämtas från databasen för den specifika klockan.
 */
function fyllDialog(json) {
    $('#inputID').attr('value', json[0].ID);
    $('#inputNamn').attr('value', json[0].Namn);
    $('#inputMarke').attr('value', json[0].Marke);
    $('#inputKategori').attr('value', json[0].Kategori);
    $('#inputBeskrivning').attr('value', json[0].Beskrivning);
    $('#inputLager').attr('value', json[0].Lager);
    $('#inputPris').attr('value', json[0].Pris);
    $('#inputBildurl').attr('value', json[0].Bildurl);

}


//Inspirerad från Hans exempelkod för att bygga en tabell.
function createTable(data) {

    //Tömmer main div
    $("#main").empty();

    //tömmer panelheading
    $(".panel-heading").empty();


    //Skapar tabellen
    var tbl = document.createElement('table');
    //Ger table css
    tbl.setAttribute('class', 'table table-hover');

    //skapar table header
    var th = document.createElement('thead');
    //Skapar tablebody
    var tbody = document.createElement('tbody');
    //Skapar en tablerow
    var tr = document.createElement('tr');


    //Skapar tablehead
    var th1 = document.createElement('th');

    //Skapar en text som läggs på table head
    var txt1 = document.createTextNode('Produkt');

    var th2 = document.createElement('th');
    var txt2 = document.createTextNode('Namn');
    //Lite css
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



    //Tablehead 1 appendar värdet i txt1 som är Produkt
    th1.appendChild(txt1);
    //tablehead 1 läggs på table row
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

    //För varje data funktion key(index) objekt(value)
    $.each(data,function(key,obj){

        //Variabel row, sätter in i tabellen på -1 för den ska hamna längst bak
        var row = tbl.insertRow(-1);

        //Slänger ihop ID med en bild på första raden
        row.insertCell(-1).innerHTML = "<p>ID<strong> "+obj.ID+"</strong></p><hr><img src='" + obj.Bildurl + "'style='max-width:62px;max-height:82px; width: auto; height: auto; '>";

        //Namn på andra kolumnen
        var cell2 = row.insertCell(-1);
        cell2.innerHTML = data[key].Namn;

        //Kategori på kolumnen 3
        var cell3 = row.insertCell(-1);
        cell3.innerHTML = obj.Kategori;

        var cell4 = row.insertCell(-1);
        cell4.innerHTML = obj.Pris;

        var cell5 = row.insertCell(-1);
        cell5.innerHTML = obj.Beskrivning;

        //Slänger in en knapp med och klass för uppdatera
        var cell6 = row.insertCell(-1);
        cell6.innerHTML = "<button data='"+obj.ID+"'class='btn btn-info uppdatera'  title='Uppdatera' >Uppdatera</button>";

        //Skapar upp en knapp med ta bort och en onClick händelse som tar emot 2 parametrar
        //Backslash gör att parametarna blir seperade
        var cell7 = row.insertCell(-1);
        cell7.innerHTML = "<button onclick='deleteWatch(\""+obj.ID +"\",\""+ obj.Namn+"\")' class='btn btn-danger plockaBort'  title='Ta bort' >Ta bort</button>"

        //Mediaquiers om skärmen blir mindre
        cell2.setAttribute('class','hidden-xs sort');
        cell3.setAttribute('class','hidden-xs sort');
        cell4.setAttribute('class','hidden-xs sort');
        cell5.setAttribute('class','hidden-xs sort');

        //Lägger in raden i table bodyn
        tbody.appendChild(row);


    });

    //Tabellen lägger på tablebodyn
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

    var homeBtn = $("<Button>").text('Hem!');
    homeBtn.attr('class','btn btn-success homeBtn');


    //Kastar på alla divar i mainet, med knapparna.
    maindiv1.append(addBtn);
    maindiv1.append(homeBtn);

    maindiv1.append(maindiv2);
    mainet.append(maindiv1);

    //Lägger på "mainet" på main diven i HTML
    $("#main").append(mainet);
    //Lägger på table i pandelheading
    $('.panel-heading').append(tbl);


}



function validate() {
    var error = 0; // Error variabel med värdet 0



    //Hämtar in värden i olika input fält för att se till att det finns värden att kontrollera
    var id = $("#inputID").val();
    var name =$("#inputNamn").val();
    var brand =$("#inputMarke").val();
    var category = $('#inputKategori').val();
    var desc = $('#inputBeskrivning').val();
    var price = $("#inputPris").val();
    var pic = $("#inputBildurl").val();
    var warehouse = $("#inputLager").val();

    //Substringar bilden för att se om det är en png,jpg,jpeg eller gif
    var picture = pic.substr(pic.length -4);
    var picture2 = pic.substr(pic.length -5);




    //Kollar om ID inte är en interger och inte ett numeriskt värde
    if(!Number.isInteger(id) && !$.isNumeric(id)){
        $("#idP").text("ID nummer måste vara ett heltal.").css("color","red");
        error ++; // error ökas med en

        if(id.length==0) {
            $("#idP").text("Vänligen skriv in ett ID nummer").css("color","red");
        }

    } else {
        $("#idP").text("ID").css("color","black"); // Återställer elementet till normala texten

    }
    //Kollar om priset är en siffra eller ej
    if(!$.isNumeric(price)) {
        $("#prisP").text("Priset måste innehålla siffror").css("color","red");
        error ++; // Error ökas med en om det är fel på inputen

        if(price.length==0) {
            $("#prisP").text("Vänligen skriv in ett pris").css("color","red");
        }
    } else {
        $("#prisP").text("Pris").css("color","black");
    }


    //Kollar "filformat" på bilden, om det är en jpg, png eller gif
    if(picture == ".jpg" || picture == ".png" || picture == ".gif" || picture2 == ".jpeg"){
        $("#bildP").text("Bildurl").css("color","black");

        if(picture.length==0 || picture2.length == 0) {
            $("#bildP").text("Vänligen lägg till en bild").css("color","red");
        }

    }else {
        $("#bildP").text("Bilden måste sluta på .png .jpg .jpeg eller .gif filformat").css("color","red");
        error++;
    }

    //Kollar om lagerstatus är skrivet i siffror
  if(!$.isNumeric(warehouse) && !Number.isInteger(id)){
      $("#lagerP").text("Du måste skriva hur många det finns i lager i heltal.").css("color","red");
        error++;

      if(warehouse.length==0) {
          $("#lagerP").text("Vänligen skriv in hur många som finns på lager").css("color","red");
      }

  }
  else {
      $("#lagerP").text("Lager").css("color","black");

  }



  //Kollar om desc, kategori och märke samt namnfälten är tomma
    if(name.length== 0) {
      error++;
      $("#namnP").text("Du måste skriva ett namn.").css("color","red");
    }
    else {
        $("#namnP").text("Namn").css("color","black");
    }

    if(brand.length== 0) {
        error++;
        $("#markeP").text("Du måste skriva in ett märke").css("color","red");
    }
    else {
        $("#markeP").text("Märke").css("color","black");
    }

    if(desc.length== 0) {
        error++;
        $("#beskrivningP").text("Vänligen fyll i beskrivning max 500 ord").css("color","red");
    }
    else {
        $("#beskrivningP").text("Beskrivning").css("color","black");
    }

    if(category.length== 0) {
        error++;
        $("#kategoriP").text("Du måste skriva in en kategori").css("color","red");
    }
    else {
        $("#kategoriP").text("Kategori").css("color","black");
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

