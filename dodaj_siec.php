<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Dodawanie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    $nazwakat = $_POST['nazwakat'];
    if(dodaj_kom($nazwakat)) {
      echo "<p>Sieć aptek \"".$nazwakat."\" zostać dodana do bazy danych.</p>";
    } else {
      echo "<p>Sieć aptek \"".$nazwakat."\" nie może zostać dodana do bazy danych.</p>";
    }
  } else {
    echo "Formularz niewypełniony. Proszę spróbować ponownie.";
  }
  wyswietl_przycisk('admin.php', 'Powrót do menu administratora');
} else {
  echo "<p>Brak autoryzacji do przeglądania tej strony.</p>";
}

tworz_stopke_html();

?>