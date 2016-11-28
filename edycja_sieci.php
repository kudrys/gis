<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Uaktualnianie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    if(uakt_kom($_POST['id_kom'], $_POST['nazwakat'])) {
      echo "<p>Dane sieci aptek zostały uaktualnione.</p>";
    } else {
      echo "<p>Błąd! Dane sieci aptek nie zostały uaktualnione.</p>";
    }
  } else {
    echo "<p>Formularz niewypełniony. Proszę spróbować ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powr�t do menu adminstratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>