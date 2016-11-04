<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');


tworz_naglowek_html("Uaktualnienie kompanii");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    if(uakt_kom($_POST['id_kom'], $_POST['nazwakat'])) {
      echo "<p>Kompania uaktualniona.</p>";
    } else {
      echo "<p>Kompania nie mogła zostać uaktualniona.</p>";
    }
  } else {
    echo "<p>Formularz niewypełnony. Prosze spróbować ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu adminstratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>