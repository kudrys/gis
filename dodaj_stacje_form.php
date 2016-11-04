<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');


tworz_naglowek_html("Dodawanie stacji");
if (sprawdz_uzyt_admin()) {
  wyswietl_form_stacji();
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do przeglądania obszaru administracyjnego.</p>";
}

tworz_stopke_html();

?>