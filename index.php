<?php
  session_start();
  require ('funkcje_elementy_apteki.php');
  
  // pobranie kompanii z bazy danych
  $tablica_sieci = pobierz_sieci();
  // pobranie informacji o stacjach z bazy danych
  $tablica_aptek = pobierz_wszystkie_apteki();
  przygotuj($tablica_aptek);
  
  //tworz_naglowek_html($nazwa);
  tworz_naglowek_html("Apteki na terenie Trójmiasta");
  wyswietl_mape();

  echo "<p>Proszę wybrać sieć aptek:</p>";

  wyswietl_sieci($tablica_sieci);

  // jeżeli zalogowany jako administrator, udostępnij dodawanie,
  // usuwanie i edycję
  if(isset($_SESSION['uzyt_admin'])) {
    wyswietl_przycisk("admin.php", "Menu Administratora");
  }
  tworz_stopke_html();
?>