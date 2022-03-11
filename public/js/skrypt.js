$(document).ready(function() {
    aktualizujSurowce();

    $("#zamek").click(function() {
        $("#zamek_info").load("/castle_info");
        aktualizujSurowce();
    });
    $("#tartak").click(function() {
        $("#tartak_info").load("/sawmill_info");
        aktualizujSurowce();
    });
    $("#kamieniolom").click(function() {
        $("#kamieniolom_info").load("/quarry_info");
        aktualizujSurowce();
    });
    $("#pole").click(function() {
        $("#pole_info").load("/field_info");
        aktualizujSurowce();
    });
    $("#koszary").click(function() {
        $("#koszary_info").load("/barracks_info");
        aktualizujSurowce();
    });
    setInterval(aktualizujSurowce, 5000);

    $("#ranking").click(function() {
        $("#ranking_info").load("/ranking");
        show('ranking_info');
    });
    $("#atakuj").click(function() {
        $("#atakuj_info").load("/attack");
    });

});

//ULEPSANIE BUDYNKÓW
$(document).on('click', '#ulepsz_zamek', function() {
        $("#zamek_info").load("/castle_upgrade");
        $("#zamek_info").load("/castle_info");
        aktualizujSurowce();
});

$(document).on('click', '#ulepsz_tartak', function() {
        $("#tartak_info").load("/sawmill_upgrade");
        $("#tartak_info").load("/sawmill_info");
        aktualizujSurowce();
});

$(document).on('click', '#ulepsz_kamieniolom', function() {
        $("#kamieniolom_info").load("/quarry_upgrade");
        $("#kamieniolom_info").load("/quarry_info");
        aktualizujSurowce();
});

$(document).on('click', '#ulepsz_pole', function() {
        $("#pole_info").load("/field_upgrade");
        $("#pole_info").load("/field_info");
        aktualizujSurowce();
});

$(document).on('click', '#ulepsz_koszary', function() {
        $("#koszary_info").load("/barracks_upgrade");
        $("#koszary_info").load("/barracks_info");
        aktualizujSurowce();
});

//REKRUTOWANIE JEDNOSTEK
$(document).on('click', '#rekrutuj_wojownika', function() {
        $("#koszary_info").load("/worriors");
        $("#koszary_info").load("/barracks_info");
        aktualizujSurowce();
});

$(document).on('click', '#rekrutuj_lucznika', function() {
        $("#koszary_info").load("/archers");
        $("#koszary_info").load("/barracks_info");
        aktualizujSurowce();
});

function aktualizujSurowce() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("surowce").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "/materials", true);
  xmlhttp.send();
}

function closeB(budynek) {
    document.getElementById(budynek).style.display='none';
}

function show(budynek) {
    document.getElementById(budynek).style.display='block';
}
