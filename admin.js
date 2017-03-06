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
          alert('G');
          getAll();

        } else {

          alert('ig');
      }


    });



});

function getAll() {
    $.getJSON("index2.php?getAllWatches/").done(function (json) {


        createTable(json);


    });
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
        cell7.innerHTML = "<button data='"+obj.ID+"'class='btn btn-danger plockaBort'  title='Ta bort' >Ta bort</button>"

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