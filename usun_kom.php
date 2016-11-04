<?php
session_start();
// dołączenie plików funkcji dla tej aplikacji
require_once('funkcje_elementy_stacje.php');

tworz_naglowek_html("Usuwanie kompanii");
if (sprawdz_uzyt_admin()) {
  if (isset($_POST['id_kom'])) {
    if(usun_kompanie($_POST['id_kom'])) {
      echo "<p>Kompania została usunięta.</p>";
    } else {
      echo "<p>Kompania nie mogła zostać usunięta.<br />
            Przypusczalnie nie jest pusta.</p>";
    } }else {
      echo "<p>Nie wybrano żadnej kompanii. Proszę spróbować ponownie.</p>";
    }
    wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

tworz_stopke_html();

?>