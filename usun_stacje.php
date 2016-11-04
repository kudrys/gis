<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');

tworz_naglowek_html("Usunięcie stacji");
if (sprawdz_uzyt_admin())
{
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if(usun_stacje($id)) {
      echo "<p>Stacja ".$id." została usunięta.</p>";
    } else {
      echo "<p>Stacja ".$id." nie mógła zostać usunięta.</p>";
    }
  } else {
    echo "<p>Do usunięcia stacji potrzebny jest numer id. Proszę spróbować ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>