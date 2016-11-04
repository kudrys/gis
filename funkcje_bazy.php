<?php

function lacz_bd() {
   $wynik = new mysqli('localhost', 'stacje_paliw', 'stacje_paliw', 'stacje_paliw');
   if (!$wynik) {
      return false;
   }
   
   $wynik->autocommit(TRUE);
   return $wynik;
}

function wynik_bd_do_tablicy($wynik) {

   $tablica_wyn = array();

   for ($licznik=0; $rzad = $wynik->fetch_assoc(); $licznik++) {
     $tablica_wyn[$licznik] = $rzad;
   }

   return $tablica_wyn;
}

?>