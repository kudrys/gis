<?php
session_start();
// dołączenie plików funkcji tej aplikacji
require_once('funkcje_elementy_stacje.php');


if (($_POST['nazwa_uz']) && ($_POST['haslo'])) {
// właśnie nastąpiła próba logowania

    $nazwa_uz = $_POST['nazwa_uz'];
    $haslo = $_POST['haslo'];

    if (loguj($nazwa_uz, $haslo)) {
      // jeżeli w bazie danych, zgłoszenie identyfikatora admina
	  global $_SESSION;
      $_SESSION['uzyt_admin'] = $nazwa_uz;
    } else {
      // niepomyślne logowanie
      tworz_naglowek_html("Problem:");
      echo "<p>Zalogowanie niemożliwe.<br />Należy być zalogowanym, aby przeglądać tę stronę.<br />Sprawdź poprawność nazwy użytkownika i hasła.</p>";
      wyswietl_przycisk('logowanie.php', 'Logowanie');
      tworz_stopke_html();
      exit;
    }
}

tworz_naglowek_html('Administracja');
wyswietl_mape();

wyswietl_menu_admin();

tworz_stopke_html();

?>