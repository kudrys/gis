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

    if(dodaj_stacje($id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis)) {
      echo "<p>Apteka <em>".stripslashes($id)."</em> zosta³a dodana do bazy danych.</p>";
    } else {
      echo "<p>Apteka <em>".stripslashes($id)."</em> nie mog³aa zostaæ dodana do bazy danych.</p>";
    }
  } else {
    echo "<p>Formularz nie zosta³ wype³niony. Proszê spróbowaæ ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do przegl¹dania tej strony.</p>";
}

tworz_stopke_html();

?>