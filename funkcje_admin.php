<?php
// Ten plik zawiera funkcje wykorzystywane przez interfejs administratora

function wyswietl_form_sieci($siec_apt = '') {
// wyświetlenie formularza kategorii

  // jeżeli przekazana istniejąca sieć aptek, wejdź w tryb edycji
  $edycja = is_array($siec_apt);

  
?>
  <form method="post"
      action="<?php echo $edycja?'edycja_kom.php':'dodaj_kom.php'; ?>">
  <table border="0">
  <tr>
    <td>Nazwa sieci aptek:</td>
    <td><input type="text" name="nazwakat" size="40" maxlength="40"
          value="<?php echo $edycja?$siec_apt['nazwakat']:''; ?>" /></td>
   </tr>
  <tr>
    <td <?php if (!$edycja) { echo "colspan=2";} ?> align="center">
      <?php
        if ($edycja) {
           echo "<input type=\"hidden\" name=\"id_kom\"
                value=\"".$siec_apt['id_kom']."\" />";
        }
      ?>
      <button type="submit"><?php echo $edycja?'Uaktualnienie':'Dodanie'; ?> sieci aptek </button></form>
     </td>
     <?php
       if ($edycja) {
          echo "<td>
                <form method=\"post\" action=\"usun_siec.php\">
                <input type=\"hidden\" name=\"id_kom\" value=\"".$siec_apt['id_kom']."\" />
                <button type=\"submit\">Usuń sieć aptek</button>
                </form></td>";
       }
     ?>
  </tr>
  </table>
  </form>
<?php
}

function wyswietl_form_apteki($apteka = '') {


  $edycja = is_array($apteka);

?>
  <form method="post"
        action="<?php echo $edycja?'edycja_apteki.php':'dodaj_apteke.php';?>">
  <table border="0">
  <tr>
    <td>ID:</td>
    <td><input type="text" name="id"
         value="<?php echo $edycja?$apteka['id']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Nazwa:</td>
    <td><input type="text" name="nazwa"
         value="<?php echo $edycja?$apteka['nazwa']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Dzielnica:</td>
    <td><input type="text" name="dzielnica"
         value="<?php echo $edycja?$apteka['dzielnica']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Ulica:</td>
    <td><input type="text" name="ulica"
         value="<?php echo $edycja?$apteka['ulica']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Miasto:</td>
    <td><input type="text" name="miasto"
         value="<?php echo $edycja?$apteka['miasto']:''; ?>" /></td>
  </tr>
   <tr>
      <td>Sie� aptek:</td>
      <td><select name="id_kom">
      <?php
          // lista możliwych kompanii pochodzi z bazy danych
          $tablica_sieci=pobierz_siec();
          foreach ($tablica_sieci as $takom) {
               echo "<option value=\"".$takom['id_kom']."\"";
               // jeżeli istniejąca stacja, umieszczenie w aktualnej kompanii
               if (($edycja) && ($takom['id_kom'] == $apteka['id_kom'])) {
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
         value="<?php echo $edycja?$apteka['lon']:''; ?>" /></td>
  </tr>
  <tr>
    <td>Lat:</td>
    <td><input type="float" name="lat"
         value="<?php echo $edycja?$apteka['lat']:''; ?>" /></td>
  </tr>
    <td>Opis:</td>
    <td><textarea rows="3" cols="30" name="opis">
          <?php echo $edycja?$apteka['opis']:''; ?>
          </textarea></td>
    </tr>
    <tr>
      <td <?php if (!$edycja) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edycja)
             // potrzebny jest stary id, aby znale�� aptek� w bazie danych
             // je�eli id jest uaktualniany
             echo "<input type=\"hidden\" name=\"staryid\"
                    value=\"".$apteka['id']."\" />";
         ?>
        <button type="submit"><?php echo $edycja?'Uaktualnienie':'Dodanie'; ?> apteki</button>
        </form></td>
        <?php
           if ($edycja) {
             echo "<td>
                   <form method=\"post\" action=\"usun_apteke.php\">
                   <input type=\"hidden\" name=\"id\"
                    value=\"".$apteka['id']."\" />
                   <button type=\"submit\">Usuń aptekę</button>
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
// wy�wietlenie formularza html do zmiany has�a
?>
   <br />
   <form action="zmiana_hasla.php" method=post>
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Poprzednie has�o:</td>
       <td><input type="password" name="stare_haslo" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Nowe has�o:</td>
       <td><input type="password" name="nowe_haslo" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Powt�rz nowe has�o:</td>
       <td><input type="password" name="nowe_haslo2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan="2" align="center"><button type="submit">Zmiana has�a</button>
   </td></tr>
   </table>
   <br />
<?php
};

function dodaj_siec($nazwakat) {
// dodaje now� kategori� do bazy danych

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   // sprawdzenie, czy sie� aptek juz nie istnieje
   $zapytanie = "select *
                from sieci
                where nazwakat='".$nazwakat."'";	
   $wynik = mysql_query($zapytanie);
   
   if ((!$wynik) || (mysql_num_rows($wynik)!=0)) {
		 
     return false;
   }

   // dodanie nowej kompanii
   $lacz = lacz_bd();
   $db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "insert into sieci (nazwakat) values
            ('".$nazwakat."')";
   $wynik = mysql_query($zapytanie);
   if (!$wynik) {
   
     return false;
   } else {
     return true;
   }
}

function dodaj_apteke($id, $nazwa, $dzielnica, $ulica, $miasto, $id_kom, $lon, $lat, $opis) {
// dodanie nowej apteki do bazy danych
   $lacz = lacz_bd();

   // sprawdzenie, czy apteka juz nie istnieje
   $db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "select *
             from apteki
             where id='".$id."'";
	
   $wynik = mysql_query($zapytanie);
   if ((!$wynik) || (mysql_num_rows($wynik)!=0)) {
     return false;
   }

   // dodanie nowej apteki
   $db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "insert into apteki values
            ('".$id."', '".$nazwa."', '".$dzielnica."', '".$ulica."', '".$miasto."', '".$id_kom."', '".$lon."', '".$lat."', '".$opis."')";

   $wynik = mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}

function uakt_kom($id_kom, $nazwakat) {
// zmiana nazwy sieci aptek w bazie danych o danym identyfikatorze

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "update sieci
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
// zmiana danych apteki o id danym w $staryid
// nowe dane w argumentach

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "update apteki
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

function usun_siec($id_kom) {
// Usuni�cie sieci aptek z bazy danych
// Je�eli dla danej sieci istnieje apteka, nie zostanie ona
// usuni�ta, a funkcja zwr�ci false.

   $lacz = lacz_bd();

   // sprawdzenie, czy w sieci istnieje apteka
   $db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "select * from apteki
                 where id_kom='".$id_kom."'";
   $wynik = mysql_query($zapytanie);
   if ((!$wynik) || (mysql_num_rows($wynik)!=0)) {
     return false;
   }
	$db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "delete from sieci
		 where id_kom='".$id_kom."'";
   $wynik = mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}


function usun_apteke($id) {
// Usuwa aptek� o danym id z bazy danych

   $lacz = lacz_bd();
	$db = mysql_connect('localhost', 'apteki', 'apteki');
	mysql_select_db( 'apteki',$db);
   $zapytanie = "delete from apteki
             where id='".$id."'";
   $wynik = @mysql_query($zapytanie);
   if (!$wynik) {
     return false;
   } else {
     return true;
   }
}

?>