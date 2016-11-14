<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Uaktualnianie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    if(uakt_kom($_POST['id_kom'], $_POST['nazwakat'])) {
      echo "<p>Dane sieci aptek zosta�y uaktualnione.</p>";
    } else {
      echo "<p>B��d! Dane sieci aptek nie zosta�y uaktualnione.</p>";
    }
  } else {
    echo "<p>Formularz niewype�niony. Prosz� spr�bowa� ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powr�t do menu adminstratora");
} else {
  echo "<p>Brak autoryzacji do ogl�dania tej strony.</p>";
}

tworz_stopke_html();

?>