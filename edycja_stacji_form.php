<?php
session_start();
// dołączenie plików funkcji dla tej aplikacji
require_once('funkcje_elementy_stacje.php');


tworz_naglowek_html("Edycja danych stacji");
if (sprawdz_uzyt_admin()) {
  if ($element = pobierz_dane_stacji($_GET['id'])) {
    wyswietl_form_stacji($element);
  } else {
    echo "<p>Odczytanie danych stacji niemożliwe.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania obszaru administracyjnego.</p>";
}

tworz_stopke_html();

?>