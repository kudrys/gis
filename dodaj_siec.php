<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Dodawanie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    $nazwakat = $_POST['nazwakat'];
    if(dodaj_kom($nazwakat)) {
      echo "<p>Sieæ aptek \"".$nazwakat."\" zosta³a dodana do bazy danych.</p>";
    } else {
      echo "<p>Sieæ aptek \"".$nazwakat."\" nie mog³a zostaæ dodana do bazy danych.</p>";
    }
  } else {
    echo "Formularz niewype³niony. Proszê spróbowaæ ponownie.";
  }
  wyswietl_przycisk('admin.php', 'Powrót do menu administratora');
} else {
  echo "<p>Brak autoryzacji do przegl¹dania tej strony.</p>";
}

tworz_stopke_html();

?>