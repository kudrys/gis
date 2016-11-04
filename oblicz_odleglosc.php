<?php
session_start();
require_once('funkcje_elementy_stacje.php');

  $id = $_GET['id'];

  // pobranie stacji z bazy danych
  $stacja = pobierz_dane_stacji($id);
  
  $tablica_wyn[0] = $stacja;
  przygotuj($tablica_wyn);

  tworz_naglowek_html("Wyznaczanie trasy",$stacja['lon'], $stacja['lat']);
  wyswietl_form_trasy();
  wyswietl_trase($stacja['id_kom']);

  // ustawienie URL-a dla przycisku „powrot”
  $cel = "indeks.php";
  if($stacja['id']) {
    $cel = "pokaz_stacje.php?id=".$stacja['id'];
  }
  // jeżeli zalogowany jako administrator, pokaż łącze do edycji stacji
  if(sprawdz_uzyt_admin()) {
    wyswietl_przycisk("admin.php","Menu administratora");
    wyswietl_przycisk($cel,"Powrót");
  } else {
    wyswietl_przycisk($cel,"Powrót");
  }
  

  tworz_stopke_html();
?>