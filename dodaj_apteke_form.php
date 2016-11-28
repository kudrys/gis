<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Dodawanie apteki");
if (sprawdz_uzyt_admin()) {
  wyswietl_form_stacji();
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do przeglądania obszaru administracyjnego.</p>";
}

tworz_stopke_html();

?>