<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Uaktualnianie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    if(uakt_kom($_POST['id_kom'], $_POST['nazwakat'])) {
      echo "<p>Dane sieci aptek zosta³y uaktualnione.</p>";
    } else {
      echo "<p>B³¹d! Dane sieci aptek nie zosta³y uaktualnione.</p>";
    }
  } else {
    echo "<p>Formularz niewype³niony. Proszê spróbowaæ ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu adminstratora");
} else {
  echo "<p>Brak autoryzacji do ogl¹dania tej strony.</p>";
}

tworz_stopke_html();

?>