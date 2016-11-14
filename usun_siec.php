<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Usuwanie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (isset($_POST['id_kom'])) {
    if(usun_sieci($_POST['id_kom'])) {
      echo "<p>Sie� aptek zosta�a usuni�ta.</p>";
    } else {
      echo "<p>W tej sieci jest dodana apteka.<br />
            Najpierw usu� wszystkie apteki.</p>";
    } }else {
      echo "<p>Nie wybrano �adnej sieci. Prosz� spr�bowa� ponownie.</p>";
    }
    wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
} else {
  echo "<p>Brak autoryzacji do ogl�dania tej strony.</p>";
}

tworz_stopke_html();

?>