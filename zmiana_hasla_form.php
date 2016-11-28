<?php
 session_start();
 require_once('funkcje_elementy_apteki.php');
 
 tworz_naglowek_html("Zmiana hasła administratora");
if (sprawdz_uzyt_admin()) {

 wyswietl_haslo_form();

 wyswietl_przycisk("admin.php", "Powrót do menu administratora");
}
else {
 echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}
 tworz_stopke_html();
?>