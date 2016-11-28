<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Usuwanie apteki");
if (sprawdz_uzyt_admin())
{
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if(usun_apteke($id)) {
      echo "<p>Apteka ".$id." została usunięta.</p>";
    } else {
      echo "<p>Apteka ".$id." nie mogła zostać usunięta.</p>";
    }
  } else {
    echo "<p>Do usunięcia apteki potrzebny jest numer id. Proszę spróbować ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>