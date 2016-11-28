<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Edycja danych apteki");
if (sprawdz_uzyt_admin()) {
  if ($element = pobierz_dane_stacji($_GET['id'])) {
    wyswietl_form_stacji($element);
  } else {
    echo "<p>Odczytanie danych apteki niemożliwe.</p>";
  }
  wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
} else {
  echo "<p>Brak autoryzacji do oglądania obszaru administracyjnego.</p>";
}

tworz_stopke_html();

?>