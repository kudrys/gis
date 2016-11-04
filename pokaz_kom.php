<?php
  session_start();
  require ('funkcje_elementy_stacje.php');

  $id_kom = $_GET['id_kom'];
  $nazwa = pobierz_nazwe_kompanii($id_kom);
  
  // pobranie informacji o stacjach z bazy danych
  $tablica_stacji = pobierz_stacje($id_kom);
  przygotuj($tablica_stacji);
  
  tworz_naglowek_html($nazwa);
  wyswietl_mape();

  wyswietl_stacje($tablica_stacji);
	
  // jeżeli zalogowany jako administrator, przedstawienie łącz
  // do dodawania i usuwania stacji
  if(isset($_SESSION['uzyt_admin']))
  {
    wyswietl_przycisk("index.php","Powrót");
    wyswietl_przycisk("admin.php","Menu Administratora");
    wyswietl_przycisk("edycja_kom_form.php?id_kom=".$id_kom, "Edycja kompanii");
  } else {
    wyswietl_przycisk("index.php","Powrót");
  }

  tworz_stopke_html();
?>