<?php

function wypelniony($zmienne_form) {

  // sprawdzenie czy ka¿da zmienna posiada wartoœæ
  foreach ($zmienne_form as $klucz => $wartosc) {
     if ((!isset($klucz)) || ($wartosc == '')) {
        return false;
     }
  }
  return true;
}
?>