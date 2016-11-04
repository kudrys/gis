<?php
// Ten plik zawiera funkcje wyorzystywane przez interfejs administratora


function wyswietl_form_kompanii($kompania = '') {
// wyświetlenie formularza kategorii


  // jeżeli przekazana istniejąca kompania, „tryb edycji”
  $edycja = is_array($kompania);

  
?>
  <form method="post"
      action="<?php echo $edycja?'edycja_kom.php':'dodaj_kom.php'; ?>">
  <table border="0">
  <tr>
    <td>Nazwa Kompanii:</td>
    <td><input type="text" name="nazwakat" size="40" maxlength="40"
          value="<?php echo $edycja?$kompania['nazwakat']:''; ?>" /></td>
   </tr>
  <tr>
    <td <?php if (!$edycja) { echo "colspan=2";} ?> align="center">
      <?php
        if ($edycja) {
           echo "<input type=\"hidden\" name=\"id_kom\"
                value=\"".$kompania['id_kom']."\" />";
        }
      ?>
      <button type="submit"><?php echo $edycja?'Uaktualnienie':'Dodanie'; ?> kompanii </button></form>
     </td>
     <?php
       if ($edycja) {
       // umożliwienie usunięcia istniejącej kompanii
          echo "<td>
                <form method=\"post\" action=\"usun_kom.php\">
                <input type=\"hidden\" name=\"id_kom\" value=\"".$kompania['id_kom']."\" />
                <button type=\"submit\">Usuń kompanię</button>
                </form></td>";
       }
     ?>
  </tr>
  </table>
  </form>
<?php
}

function wyswietl_form_stacji($stacja = '') {



  $edycja = is_array($stacja);

  // większość formularza to czysty HTML z pewnymi fragmentami PHP
?>
  <form method="post"
        action="<?php echo $edycja?'edycja_stacji.php':'dodaj_stacje.php';?>">
  <table border="0">
  <tr>
    <td>ID:</td>
    <td><input type="text" name="id"
         value="<?php echo $edycja?$stacja['id']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Nazwa:</td>
    <td><input type="text" name="nazwa"
         value="<?php echo $edycja?$stacja['nazwa']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Dzielnica:</td>
    <td><input type="text" name="dzielnica"
         value="<?php echo $edycja?$stacja['dzielnica']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Ulica:</td>
    <td><input type="text" name="ulica"
         value="<?php echo $edycja?$stacja['ulica']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Miasto:</td>
    <td><input type="text" name="miasto"
         value="<?php echo $edycja?$stacja['miasto']:''; ?>" /></td>
  </tr>
   <tr>
      <td>Kompania:</td>
      <td><select name="id_kom">
      <?php
          // lista możliwych kompanii pochodzi z bazy danych
          $tablica_kom=pobierz_kompanie();
          foreach ($tablica_kom as $takom) {
               echo "<option value=\"".$takom['id_kom']."\"";
               // jeżeli istniejąca stacja, umieszczenie w aktualnej kompanii
               if (($edycja) && ($takom['id_kom'] == $stacja['id_kom'])) {
                   echo " wybrano";
               }
               echo ">".$takom['nazwakat']."</option>";
          }
          ?>
          </select>
        </td>
   </tr>
   <tr>
    <td>Lon:</td>
    <td><input type="float" name="lon"
         value="<?php echo $edycja?$stacja['lon']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Lat:</td>
    <td><input type="float" name="lat"
         value="<?php echo $edycja?$stacja['lat']:''; ?>" /></td>
  </tr>
    <td>Opis:</td>
    <td><textarea rows="3" cols="30" name="opis">
          <?php echo $edycja?$stacja['opis']:''; ?>
          </textarea></td>
    </tr>
    <tr>
      <td <?php if (!$edycja) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edycja)
             // potrzebny jest stary id, aby znaleźć stację w bazie danych
             // jeżeli id jest uaktualniany
             echo "<input type=\"hidden\" name=\"staryid\"
                    value=\"".$stacja['id']."\" />";
         ?>
        <button type="submit"><?php echo $edycja?'Uaktualnienie':'Dodanie'; ?> stacji</button>
        </form></td>
        <?php
           if ($edycja) {
             echo "<td>
                   <form method=\"post\" action=\"usun_stacje.php\">
                   <input type=\"hidden\" name=\"id\"
                    value=\"".$stacja['id']."\" />
                   <button type=\"submit\">Usuń stację</button>
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>
<?php
}

function wyswietl_haslo_form() {
// wyświetlenie formularza html do zmiany hasła
?>
   <br />
   <form action="zmiana_hasla.php" method=post>
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Dotychczasowe hasło:</td>
       <td><input type="password" name="stare_haslo" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Nowe hasło:</td>
       <td><input type="password" name="nowe_haslo" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Powtórz nowe hasło:</td>
       <td><input type="password" name="nowe_haslo2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan="2" align="center"><button type="submit">Zmiana hasła</button>
   </td></tr>
   </table>
   <br />
<?php
};

function dodaj_kom($nazwakat) {
// dodaje nową kategotię do bazy danych

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   // sprawdzenie, czy kompania juz nie istnieje
   $zapytanie = "select *
                from kompania
                where nazwakat='".$nazwakat."'";	
   $wynik = mysql_query($zapytanie);
   
   if ((!$wynik) || (mysql_num_rows($wynik)!=0)) {
		 
     return false;
   }

   // dodanie nowej kompanii
   $lacz = lacz_bd();
   $db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "insert into kompania (nazwakat) values
            ('".$nazwakat."')";
   $wynik = mysql_query($zapytanie);
   if (!$wynik) {
   
     return false;
   } else {
     return true;
   }
}

function dodaj_stacje($id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis) {
// dodanie nowej stacji do bazy danych
   $lacz = lacz_bd();

   // sprawdzenie, czy stacja juz nie istnieje
   $db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "select *
             from stacje
             where id='".$id."'";
	
   $wynik = mysql_query($zapytanie);
   if ((!$wynik) || (mysql_num_rows($wynik)!=0)) {
     return false;
   }

   // dodanie nowej stacji
   $db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "insert into stacje values
            ('".$id."', '".$nazwa."', '".$dzielnica."', '".$ulica."', '".$miasto."', '".$id_kom."', '".$lon."', '".$lat."', '".$opis."')";

   $wynik = mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}

function uakt_kom($id_kom, $nazwakat) {
// zmiana nazwy kompanii w bazie danych o danym identyfikatorze

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "update kompania
             set nazwakat='".$nazwakat."'
             where id_kom='".$id_kom."'";

$wynik = mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}

function uakt_stacje($staryid, $id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis) {
// zmiana danych stacji o id danym w $staryid
// nowe dane w argumentach

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "update stacje
             set id='".$id."',
             nazwa ='".$nazwa."',
             dzielnica = '".$dzielnica."',
             ulica = '".$ulica."',
             miasto = '".$miasto."',
             id_kom = '".$id_kom."',
			 lon = '".$lon."',
			 lat = '".$lat."',
			 opis = '".$opis."'
             where id='".$staryid."'";

   $wynik = @mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}

function usun_kompanie($id_kom) {
// Usunięcie kompanii o id_kom z bazy danych
// Jeżeli w kompanii znajduje się element, nie zostanie ona
// usunięta, a funkcja zwróci false.

   $lacz = lacz_bd();

   // sprawdzenie, czy w kompanii znajdują się stcje
   // w celu uniknięcia anomalii
   $db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "select * from stacje
                 where id_kom='".$id_kom."'";
   $wynik = mysql_query($zapytanie);
   if ((!$wynik) || (mysql_num_rows($wynik)!=0)) {
     return false;
   }
	$db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "delete from kompania
				where id_kom='".$id_kom."'";
   $wynik = mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}


function usun_stacje($id) {
// Usuwa stacje o danym id z bazy danych

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'stacje_paliw', 'stacje_paliw');
	mysql_select_db( 'stacje_paliw',$db);
   $zapytanie = "delete from stacje
             where id='".$id."'";
   $wynik = @mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}

?>