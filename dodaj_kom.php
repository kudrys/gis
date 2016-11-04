<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');

tworz_naglowek_html("Dodawanie kompanii");
if (sprawdz_uzyt_admin()) {
  if (wypelniony($_POST)) {
    $nazwakat = $_POST['nazwakat'];
    if(dodaj_kom($nazwakat)) {
      echo "<p>Kompania \"".$nazwakat."\" została dodana do bazy danych.</p>";
    } else {
      echo "<p>Kompania \"".$nazwakat."\" nie mogła zostać dodana do bazy danych.</p>";
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