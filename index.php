<?php
  session_start();
  require ('funkcje_elementy_stacje.php');
  
  // pobranie kompanii z bazy danych
  $tablica_kom = pobierz_kompanie();
  // pobranie informacji o stacjach z bazy danych
  $tablica_stacji = pobierz_wszystkie_stacje();
  przygotuj($tablica_stacji);
  
  //tworz_naglowek_html($nazwa);
  tworz_naglowek_html("Trójmiejskie stacje paliw");
  wyswietl_mape();

  echo "<p>Proszę wybrać kompanię:</p>";

  // wyświetlenie jako łącza do strony kategorii
  wyswietl_kompanie($tablica_kom);

  // jeżeli zalogowany jako administrator, pokaż łącza dodawania,
  // usuwania i edycji
  if(isset($_SESSION['uzyt_admin'])) {
    wyswietl_przycisk("admin.php", "Menu Administratora");
  }
  tworz_stopke_html();
?>