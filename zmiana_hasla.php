<?php
 session_start();
 require_once('funkcje_elementy_apteki.php');

 tworz_naglowek_html('Zmiana has³a');
if (sprawdz_uzyt_admin()) {
 if (!wypelniony($_POST)) {
   echo "<p>Formularza nie wype³niono w ca³oœci.<br/>
         Spróbuj ponownie.</p>";
   wyswietl_przycisk("admin.php", "Powrót do menu administratora");
   tworz_stopke_html();
   exit;
 } else {
    $nowe_haslo = $_POST['nowe_haslo'];
    $nowe_haslo2 = $_POST['nowe_haslo2'];
    $stare_haslo = $_POST['stare_haslo'];
    if ($nowe_haslo != $nowe_haslo2) {
       echo "<p>Has³a wprowadzone nie pasuj¹ do siebie. Brak zmian.</p>";
    } else if ((strlen($nowe_haslo)>12) || (strlen($nowe_haslo)<8)) {
       echo "<p>Nowe has³o musi mieæ d³ugoœæ od 8 do 12 znaków. Proszê spróbowaæ ponownie.</p>";
    } else {
        // prÃ³ba uaktualnienia
        if (zmien_haslo($_SESSION['uzyt_admin'], $stare_haslo, $nowe_haslo)) {
           echo "<p>Has³o zosta³o zmienione.</p>";
        } else {
           echo "<p>B³¹d! Has³o nie zosta³o zmienione.</p>";
        }
    }
 }
   wyswietl_przycisk('admin.php', 'Powrót do menu administratora');
}
else {
 echo "<p>Brak autoryzacji do ogl¹dania tej strony.</p>";
}

  tworz_stopke_html();
?>