<?php

function pobierz_kompanie() {
   // zapytanie bazy danych o listê kompanii
   $lacz = lacz_bd();
   $zapytanie = "select id_kom, nazwakat from kompania";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
      return false;
   }
   $ilosc_kom = @$wynik->num_rows;
   if ($ilosc_kom == 0) {
      return false;
   }
   $wynik = wynik_bd_do_tablicy($wynik);
   return $wynik;
}

function pobierz_nazwe_kompanii($id_kom) {
   // zapytanie bazy danych o nazwê dla identyfikatora kompanii
   $id_kom = intval($id_kom);
   $lacz = lacz_bd();
   $zapytanie = "select nazwakat from kompania where id_kom = '".$id_kom."'";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $ilosc_kom = @$wynik->num_rows;
   if ($ilosc_kom == 0) {
     return false;
   }
   $rzad = $wynik->fetch_object();
   return $rzad->nazwakat;
}

function pobierz_wszystkie_stacje() {
   // zapytanie bazy danych o stacje
   $lacz = lacz_bd();
   $zapytanie = "select * from stacje";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $ilosc_stacji = @$wynik->num_rows;
   if ($ilosc_stacji == 0) {
      return false;
   }
   $wynik = wynik_bd_do_tablicy($wynik);
   return $wynik;
}

function pobierz_stacje($id_kom) {
   // zapytanie bazy danych o stacje danej kompanii
   if ((!$id_kom) || ($id_kom=='')) {
     return false;
   }

   $lacz = lacz_bd();
   $zapytanie = "select * from stacje where id_kom='".$id_kom."'";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $ilosc_stacji = @$wynik->num_rows;
   if ($ilosc_stacji == 0) {
      return false;
   }
   $wynik = wynik_bd_do_tablicy($wynik);
   return $wynik;
}

function pobierz_dane_stacji($id) {
  // zapytanie bazy danych o wszystkie dane konkretnej stacji
  if ((!$id) || ($id=='')) {
     return false;
  }

   $lacz = lacz_bd();
   $zapytanie = "select * from stacje where id='".$id."'";
   $wynik = @$lacz->query($zapytanie);
   if (!$wynik) {
     return false;
   }
   $wynik = @$wynik->fetch_assoc();
   return $wynik;
}

?>