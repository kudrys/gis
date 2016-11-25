<?php
  session_start();
  require ('funkcje_elementy_apteki.php');

  $id_kom = $_GET['id_kom'];
  $nazwa = pobierz_nazwe_sieci($id_kom);
  
  // pobranie informacji o stacjach z bazy danych
  $tablica_aptek = pobierz_apteki($id_kom);
  przygotuj($tablica_aptek);
  
  tworz_naglowek_html($nazwa);
  wyswietl_mape();

  wyswietl_apteki($tablica_aptek);
	
  // je?eli zalogowany jako administrator, udost?pnij
  // dodawanie, edycj? i usuwanie aptekw
    wyswietl_przycisk("index.php","Powrót");
  if(isset($_SESSION['uzyt_admin']))
  {

    wyswietl_przycisk("admin.php","Menu Administratora");
    wyswietl_przycisk("edycja_kom_form.php?id_kom=".$id_kom, "Edycja sieci aptek");
  }

  tworz_stopke_html();
?>