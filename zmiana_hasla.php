<?php
 session_start();
 require_once('funkcje_elementy_apteki.php');

 tworz_naglowek_html('Zmiana has�a');
if (sprawdz_uzyt_admin()) {
 if (!wypelniony($_POST)) {
   echo "<p>Formularza nie wypełniono w całości.<br/>
         Spróbuj ponownie.</p>";
   wyswietl_przycisk("admin.php", "Powr�t do menu administratora");
   tworz_stopke_html();
   exit;
 } else {
    $nowe_haslo = $_POST['nowe_haslo'];
    $nowe_haslo2 = $_POST['nowe_haslo2'];
    $stare_haslo = $_POST['stare_haslo'];
    if ($nowe_haslo != $nowe_haslo2) {
       echo "<p>Hasła wprowadzone nie pasują do siebie. Brak zmian.</p>";
    } else if ((strlen($nowe_haslo)>12) || (strlen($nowe_haslo)<8)) {
       echo "<p>Nowe hasło musi mieć długość od 8 do 12 znaków. Proszę spróbować ponownie.</p>";
    } else {
        // próba uaktualnienia
        if (zmien_haslo($_SESSION['uzyt_admin'], $stare_haslo, $nowe_haslo)) {
           echo "<p>Hasło zostało zmienione.</p>";
        } else {
           echo "<p>Błąd! Hasło nie zostało zmienione.</p>";
        }
    }
 }
   wyswietl_przycisk('admin.php', 'Powr�t do menu administratora');
}
else {
 echo "<p>Brak autoryzacji do oglądania tej strony.</p>";
}

  tworz_stopke_html();
?>