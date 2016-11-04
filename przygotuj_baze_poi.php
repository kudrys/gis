<?php
function przygotuj($tablica_stacji) {
  $file = 'stacje.txt';
  $text = "lat\tlon\ttitle\tdescription\ticonSize\ticonOffset\ticon\r\n";
  #$text .= "\n";
 if($tablica_stacji){
 foreach ($tablica_stacji as $rzad) {
	$text .= $rzad["lat"]."\t".$rzad["lon"]."\t";
	$text .= "Ceny paliw:\t";
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