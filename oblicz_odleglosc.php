<?php
session_start();
require_once('funkcje_elementy_apteki.php');

  $id = $_GET['id'];

  // pobranie danych apteki z bazy danych
  $apteka = pobierz_dane_apteki($id);
  
  $tablica_wyn[0] = $apteka;
  przygotuj($tablica_wyn);

  tworz_naglowek_html("Wyznaczanie trasy",$apteka['lon'], $apteka['lat']);
  wyswietl_form_trasy();
  wyswietl_trase($apteka['id_kom']);

  // ustawienie URL-a dla przycisku powrotu
  $cel = "index.php";
  if($apteka['id']) {
    $cel = "pokaz_apteki.php?id=".$apteka['id'];
  }
  // je¿eli zalogowany jako administrator, udostêpnij edycjê danych apteki
  if(sprawdz_uzyt_admin()) {
    wyswietl_przycisk("admin.php","Menu administratora");
    wyswietl_przycisk($cel,"Powrót");
  } else {
    wyswietl_przycisk($cel,"Powrót");
  }
  
  tworz_stopke_html();
?>