<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Dodawanie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    $nazwakat = $_POST['nazwakat'];
    if(dodaj_kom($nazwakat)) {
      echo "<p>Sie� aptek \"".$nazwakat."\" zosta�a dodana do bazy danych.</p>";
    } else {
      echo "<p>Sie� aptek \"".$nazwakat."\" nie mog�a zosta� dodana do bazy danych.</p>";
    }
  } else {
    echo "Formularz niewype�niony. Prosz� spr�bowa� ponownie.";
  }
  wyswietl_przycisk('admin.php', 'Powr�t do menu administratora');
} else {
  echo "<p>Brak autoryzacji do przegl�dania tej strony.</p>";
}

tworz_stopke_html();

?>