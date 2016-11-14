<?php
session_start();

require_once('funkcje_elementy_apteki.php');

$stary_uzyt = $HTTP_SESSION_VARS['uzyt_admin'];  // przechowanie do sprawdzenia, czy by�o logowanie
unset($HTTP_SESSION_VARS['uzyt_admin']);
session_destroy();

// rozpoczecie wy�wietlania html
tworz_naglowek_html('Wylogowanie');

if (!empty($stary_uzyt)) {
  echo "<p>Wylogowano.</p>";
  wyswietl_przycisk("logowanie.php", "Logowanie");
} else {
  // nie bylo zalogowania, przypadkowa obecno�� na stronie
  echo "<p>Nie zosta�e� zalogowany.</p>";
  wyswietl_przycisk("logowanie.php", "Logowanie");
}

tworz_stopke_html();

?>