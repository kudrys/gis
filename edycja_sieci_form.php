<?php
session_start();

require_once('funkcje_elementy_apteki.php');


tworz_naglowek_html('Edycja sieci aptek');
if (sprawdz_uzyt_admin()) {
  if ($nazwakat = pobierz_nazwe_kompanii($_GET['id_kom'])) {
    $id_kom = $_GET['id_kom'];
    $kom = compact('nazwakat', 'id_kom');
    wyswietl_form_kompanii($kom);
  } else {
    echo "<p>Pobranie danych dotycz¹cych sieci aptek niemo¿liwe.</p>";
  }
  wyswietl_przycisk("admin.php", "Powrót do menu administratora");
} else {
  echo "<p>Brak autoryzacji do przegl¹dania obszaru administracyjnego.</p>";
}

tworz_stopke_html();

?>