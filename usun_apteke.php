<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Usuwanie apteki");
if (sprawdz_uzyt_admin())
{
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if(usun_apteke($id)) {
      echo "<p>Apteka ".$id." zosta�a usuni�ta.</p>";
    } else {
      echo "<p>Apteka ".$id." nie mog�a zosta� usuni�ta.</p>";
    }
  } else {
    echo "<p>Do usuni�cia apteki potrzebny jest numer id. Prosz� spr�bowa� ponownie.</p>";
  }
  wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
} else {
  echo "<p>Brak autoryzacji do ogl�dania tej strony.</p>";
}

tworz_stopke_html();

?>