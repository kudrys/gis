<?php
session_start();

require_once('funkcje_elementy_apteki.php');

tworz_naglowek_html("Usuwanie sieci aptek");
if (sprawdz_uzyt_admin()) {
  if (isset($_POST['id_kom'])) {
    if(usun_sieci($_POST['id_kom'])) {
      echo "<p>Sieć aptek została usunięta.</p>";
    } else {
      echo "<p>W tej sieci jest dodana apteka.<br />
            Najpierw usuń wszystkie apteki.</p>";
    } }else {
      echo "<p>Nie wybrano żadnej sieci. Proszę spróbować ponownie.</p>";
    }
    wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>