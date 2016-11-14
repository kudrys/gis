<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Usuwanie apteki");
if (sprawdz_uzyt_admin())
{
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if(usun_apteke($id)) {
      echo "<p>Apteka ".$id." zosta³a usuniêta.</p>";
    } else {
      echo "<p>Apteka ".$id." nie mog³a zostaæ usuniêta.</p>";
    }
  } else {
    echo "<p>Do usuniêcia apteki potrzebny jest numer id. Proszê spróbowaæ ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do ogl¹dania tej strony.</p>";
}

tworz_stopke_html();

?>