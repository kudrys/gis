<?php
session_start();
require_once('funkcje_elementy_apteki.php');

  $id = $_GET['id'];

  // pobranie danych apteki z bazy
  $apteka = pobierz_dane_apteki($id);
  
  $tablica_wyn[0] = $apteka;
  przygotuj($tablica_wyn);

  tworz_naglowek_html($apteka['nazwa'],$apteka['lon'], $apteka['lat']);
  wyswietl_mape($z=1);
  wyswietl_dane_apteki($apteka);

  // ustawienie URL-a dla przycisku powrót
  $cel = "index.php";
  if($apteka['id_kom']) {
    $cel = "pokaz_sieci.php?id_kom=".$apteka['id_kom'];
  }
  // jeżeli zalogowany jako administrator, pokaż łącze do edycji stacji
  if(sprawdz_uzyt_admin()) {
    wyswietl_przycisk("edycja_apteki_form.php?id=".$id,"Edycja danych apteki");
    wyswietl_przycisk("admin.php","Menu administratora");
    wyswietl_przycisk($cel,"Powrót");
  } else {
    wyswietl_przycisk("oblicz_odleglosc.php?id=".$apteka['id'], "Oblicz odległość");
    wyswietl_przycisk($cel,"Powrót");
  }

  tworz_stopke_html();
?>