<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');

$stary_uzyt = $HTTP_SESSION_VARS['uzyt_admin'];  // przechowanie do sprawdzenia, czy było logowanie
unset($HTTP_SESSION_VARS['uzyt_admin']);
session_destroy();

// rozpoczecie wyświetlania html
tworz_naglowek_html('Wylogowanie');

if (!empty($stary_uzyt)) {
  echo "<p>Wylogowano.</p>";
  wyswietl_przycisk("logowanie.php", "Logowanie");
} else {
  // nie bylo zalogowania, przypadkowa obecność na stronie
  echo "<p>Brak zalogowania, a więc nie wylogowano.</p>";
  wyswietl_przycisk("logowanie.php", "Logowanie");
}

tworz_stopke_html();

?>