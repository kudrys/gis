<?php
session_start();
// dołączenie plików funkcji dla tej aplikacji
require_once('funkcje_elementy_stacje.php');


tworz_naglowek_html("Uaktualnienie stacji");
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
      echo "<p>Stacja została uaktualniona.</p>";
    } else {
      echo "<p>Stacja nie mógła zostać uaktualniona.</p>";
    }
  } else {
    echo "<p>Formularz niewypełniony. Proszę spróbować ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>