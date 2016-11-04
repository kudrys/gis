<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');


tworz_naglowek_html("Dodawanie stacji");
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

    if(dodaj_stacje($id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis)) {
      echo "<p>Stacja <em>".stripslashes($id)."</em> została dodana do bazy danych.</p>";
    } else {
      echo "<p>Stacja <em>".stripslashes($id)."</em> nie mógła zostać dodana do bazy danych.</p>";
    }
  } else {
    echo "<p>Formularz nie został wypełniony. Proszę spróbować ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do przeglądania tej strony.</p>";
}

tworz_stopke_html();

?>