<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html("Dodawanie sieci aptek");
wyswietl_mape();

if (sprawdz_uzyt_admin()) {
  wyswietl_form_kompanii();
  wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
} else {
  echo "<p>Brak autoryzacji do ogl�dania stron administracyjnych.</p>";
}

tworz_stopke_html();

?>