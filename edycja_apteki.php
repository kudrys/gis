<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Zmiana danych wybranej apteki");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    $staryid = $_POST['staryid'];
	$id=$_POST['id'];
    $nazwa =$_POST['nazwa'];
    $dzielnica = $_POST['dzielnica'];
    $ulica = $_POST['ulica'];
    $miasto = $_POST['miasto'];
    $id_kom = $_POST['id_kom'];
    $lon = $_POST['lon'];
	$lat = $_POST['lat'];
	$opis = $_POST['opis'];

    if(uakt_stacje($staryid, $id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis)) {
      echo "<p>Dane apteki zosta�y zmienione.</p>";
    } else {
      echo "<p>B��d! Dane apteki nie zosta�y zmienione.</p>";
    }
  } else {
    echo "<p>Formularz niewype�niony. Prosz� spr�bowa� ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
} else {
  echo "<p>Brak autoryzacji do ogl�dania tej strony.</p>";
}

tworz_stopke_html();

?>