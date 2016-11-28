<?php
session_start();

require_once('funkcje_elementy_apteki.php');


if (($_POST && $_POST['nazwa_uz']) && ($_POST['haslo'])) {
// próba logowania

    $nazwa_uz = $_POST['nazwa_uz'];
    $haslo = $_POST['haslo'];

    if (loguj($nazwa_uz, $haslo)) {
      // jeżeli w bazie danych, zgłoszenie identyfikatora admina
	  global $_SESSION;
      $_SESSION['uzyt_admin'] = $nazwa_uz;
    } else {
      // nieudane logowanie
      tworz_naglowek_html("Problem:");
      echo "<p>Błąd logowania.<br />Sprawdż nazwę użytkownika i hasło.</p>";
      wyswietl_przycisk('logowanie.php', 'Logowanie');
      tworz_stopke_html();
      exit;
    }
}
wyswietl_przycisk('logowanie.php', 'Logowanie');

tworz_naglowek_html('Administracja');
wyswietl_mape();

wyswietl_menu_admin();

tworz_stopke_html();

?>