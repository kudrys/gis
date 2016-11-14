<?php
function przygotuj($tablica_aptek) {
  $file = 'apteki.txt';
  $text = "lat\tlon\ttitle\tdescription\ticonSize\ticonOffset\ticon\r\n";
  #$text .= "\n";
 if($tablica_aptek){
 foreach ($tablica_aptek as $rzad) {
	$text .= $rzad["lat"]."\t".$rzad["lon"]."\t";
	$text .= "Ceny leków:\t";
	$text .= $rzad["opis"]."\t";
	$text .= "38,38\t";
	$text .= "-10,-38\t";
	$text .= ".";
	$text .= "/obrazki/";
	$text .= $rzad["id_kom"];
	$text .= ".";
	$text .= "png";
	
    $text .= "\r\n";
 }
 }
 file_put_contents($file, $text);
}
?>