<?php
session_start();
require_once('funkcje_elementy_stacje.php');

  $id = $_GET['id'];

  // pobranie stacji z bazy danych
  $stacja = pobierz_dane_stacji($id);
  
  $tablica_wyn[0] = $stacja;
  przygotuj($tablica_wyn);

  tworz_naglowek_html($stacja['nazwa'],$stacja['lon'], $stacja['lat']);
  wyswietl_mape($z=1);
  wyswietl_dane_stacji($stacja);

  // ustawienie URL-a dla przycisku „powrot”
  $cel = "indeks.php";
  if($stacja['id_kom']) {
    $cel = "pokaz_kom.php?id_kom=".$stacja['id_kom'];
  }
  // jeżeli zalogowany jako administrator, pokaż łącze do edycji stacji
  if(sprawdz_uzyt_admin()) {
    wyswietl_przycisk("edycja_stacji_form.php?id=".$id,"Edycja stacji");
    wyswietl_przycisk("admin.php","Menu administratora");
    wyswietl_przycisk($cel,"Powrót");
  } else {
    wyswietl_przycisk("oblicz_odleglosc.php?id=".$stacja['id'], "Oblicz odległość");
    wyswietl_przycisk($cel,"Powrót");
  }

  tworz_stopke_html();
?>