<?php

function pobierz_sieci() {
   // zapytanie bazy danych o listę sieci aptek
   $lacz = lacz_bd();
   $zapytanie = "select id_kom, nazwakat from sieci";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
      return false;
   }
   $ilosc_sieci = @$wynik->num_rows;
   if ($ilosc_sieci == 0) {
      return false;
   }
   $wynik = wynik_bd_do_tablicy($wynik);
   return $wynik;
}

function pobierz_nazwe_sieci($id_kom) {
   // zapytanie bazy danych o nazwę dla identyfikatora sieci aptek
   $id_kom = intval($id_kom);
   $lacz = lacz_bd();
   $zapytanie = "select nazwakat from sieci where id_kom = '".$id_kom."'";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $ilosc_sieci = @$wynik->num_rows;
   if ($ilosc_sieci == 0) {
     return false;
   }
   $rzad = $wynik->fetch_object();
   return $rzad->nazwakat;
}

function pobierz_wszystkie_apteki() {
   // zapytanie bazy danych o apteki
   $lacz = lacz_bd();
   $zapytanie = "select * from apteki";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $ilosc_aptek = @$wynik->num_rows;
   if ($ilosc_aptek == 0) {
      return false;
   }
   $wynik = wynik_bd_do_tablicy($wynik);
   return $wynik;
}

function pobierz_apteki($id_kom) {
   // zapytanie bazy danych o apteki w danej sieci
   if ((!$id_kom) || ($id_kom=='')) {
     return false;
   }

   $lacz = lacz_bd();
   $zapytanie = "select * from apteki where id_kom='".$id_kom."'";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $ilosc_aptek = @$wynik->num_rows;
   if ($ilosc_aptek == 0) {
      return false;
   }
   $wynik = wynik_bd_do_tablicy($wynik);
   return $wynik;
}

function pobierz_dane_apteki($id) {
  // zapytanie bazy danych o wszystkie dane konkretnej apteki
  if ((!$id) || ($id=='')) {
     return false;
  }

   $lacz = lacz_bd();
   $zapytanie = "select * from apteki where id='".$id."'";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $wynik = @$wynik->fetch_assoc();
   return $wynik;
}

?>