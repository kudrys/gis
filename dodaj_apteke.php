<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Dodawanie apteki");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
	$id=$_POST['id'];
    $nazwa =$_POST['nazwa'];
    $dzielnica = $_POST['dzielnica'];
    $ulica = $_POST['ulica'];
    $miasto = $_POST['miasto'];
    $id_kom = $_POST['id_kom'];
    $lon = $_POST['lon'];
	$lat = $_POST['lat'];
	$opis = $_POST['opis'];

    if(dodaj_apteke($id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis)) {
      echo "<p>Apteka <em>".stripslashes($id)."</em> zosta?a dodana do bazy danych.</p>";
    } else {
      echo "<p>Apteka <em>".stripslashes($id)."</em> nie mog?aa zosta? dodana do bazy danych.</p>";
    }
  } else {
    echo "<p>Formularz nie zosta? wype?niony. Prosz? spr?bowa? ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powr?t do menu administratora");
} else {
  echo "<p>Brak autoryzacji do przegl?dania tej strony.</p>";
}

tworz_stopke_html();

?>