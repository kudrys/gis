<?php

function wypelniony($zmienne_form) {

  // sprawdzenie czy każda zmienna posiada wartość
  foreach ($zmienne_form as $klucz => $wartosc) {
     if ((!isset($klucz)) || ($wartosc == '')) {
        return false;
     }
  }
  return true;
}
?>