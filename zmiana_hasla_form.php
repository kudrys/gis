<?php
 session_start();
 require_once('funkcje_elementy_apteki.php');
 
 tworz_naglowek_html("Zmiana has�a administratora");
if (sprawdz_uzyt_admin()) {

 wyswietl_haslo_form();

 wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
}
else {
 echo "<p>Brak autoryzacji do ogl�dania tej strony.</p>";
}
 tworz_stopke_html();
?>