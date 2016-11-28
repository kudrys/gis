<?php

require_once('funkcje_bazy.php');

function loguj($nazwa_uz, $haslo) {
// sprawdzenie nazwy użytkownika i hasła w bazie danych
// jeżeli tak, zwraca true
// w przeciwnym wypadku false

  // łączenie z bazą danych
  $lacz = lacz_bd();
  if (!$lacz) {
    return 0;
  }

  // sprawdzenie unikatowości nazwy użytkownika
  $wynik = $lacz->query("select * from admin
                         where nazwa_uz='".$nazwa_uz."'
                         and haslo = sha1('".$haslo."')");
  if (!$wynik) {
     return 0;
  }

  if ($wynik->num_rows>0) {
     return 1;
  } else {
     return 0;
  }
}

function sprawdz_uzyt_admin() {
// sprawdzenie zalogowanie i powiadomienie, jeżeli nie

  global $_SESSION;
  if (isset($_SESSION['uzyt_admin'])) {
    return true;
  } else {
    return false;
  }
}

function zmien_haslo($nazwa_uz, $stare_haslo, $nowe_haslo) {
// zmiana hasła użytkownika
// zwraca true lub false

  // jeżeli stare hasło prawidłowe
  // zmiana hasła na nowe_haslo i zwraca true
  // w przeciwnym wypadku false
  if (loguj($nazwa_uz, $stare_haslo)) {
    if (!($lacz = lacz_bd())) {
      return false;
    }
    $wynik = $lacz->query( "update admin
                            set haslo = sha1('".$nowe_haslo."')
                            where nazwa_uz = '".$nazwa_uz."'");
    if (!$wynik) {
      return false;  // brak zmian
    } else {
      return true;  // zmiana pomyślna
    }
  }
  else {
    return false; // nieprawidłowe stare hasło
  }
}


?>