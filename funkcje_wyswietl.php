<?php

function tworz_naglowek_html($tytul = '', $llonst = 0, $llatst = 0) {

?>
  <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
	<meta charset="utf-8">
	<link rel="Shortcut icon" href="obrazki/apteka.jpg" />
	<link rel="Shortcut icon" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />
    <title><?php echo $tytul; ?></title>
	<!-- The gmaps script -->
    <script src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
    <!-- The openlayers script -->
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<style>
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: #FF0000; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px; background: lightgrey }
	  /* sieci aptek */
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
	  /* kreska */
      hr { border-color: darkred; color: darkred; background-color: #FF0000; width: 100%; text-align: center;}
      /* sieci aptek - tekst */
	  a { color: darkred }
	  /* div content */
	  div#content { margin: 0 200px;}
	  #map { width:750px; height:600px; border-style: groove; float:right;}

	  .cont {
		  margin-right: 66;
	  }

	  div.olControlZoom {disable: True}
	  button {
		  -webkit-border-radius: 28px;
		  -moz-border-radius: 28px;
		  border-radius: 28px;
		  font-family: Arial;
		  color: darkred; border-color: darkred; background-color: darkgrey;
		  font-size: 18px;
		  background: darkgrey;
		  padding: 18px 28px 18px 28px;
		  text-decoration: none;
		}
	  button:hover {
		  background: #545953;
		  text-decoration: none;
		}
	  .hide {
          display: none; }
    </style>
	<script type="text/javascript">
            var lon = 18.61239;
            var lat = 54.37170;
			var lonst = <?php echo $llonst ?>;
            var latst = <?php echo $llatst ?>;
            var zoom = 2;
            var mercator = new OpenLayers.Projection("EPSG:900913");
            var wgs84 = new OpenLayers.Projection("EPSG:4326");
            var apiKey = "AqTGBsziZHIJYYxgivLBf0hVdrAk9mWO5cQcb8Yux8sW5M8c8opEC2lZqKR1ZZXf";
            var options = { projection: mercator, displayProjection: wgs84, controls: []};
	</script>
  </head>
  <div id="content">
	  <body>

	  <table width="100%" border="0" cellspacing = "0" bgcolor="#cccccc">
	  <tr>
	  <td rowspan = "2">
	  <td rowspan = "2">
	  <?php
		if(isset($_SESSION['uzyt_admin'])) {
		   wyswietl_przycisk('wylog.php', 'Wylogowanie');
		}
	  ?>
	  </td>
	  <td rowspan = "2">
	  </tr>
	  </table>
	<?php
	  if($tytul) {
		tworz_tytul_html($tytul);
	  }
	  ?>
	   <div id="map"></div>
	<?php
	}

	function tworz_stopke_html() {
	  // wyświetlenie stopki HTML
	?>
	  </body>
  </div>
  </html>
<?php
}

function tworz_tytul_html($naglowek) {
  // wyświetlenie nagłówka
?>
  <h2><?php echo $naglowek; ?></h2>
<?php
}

function tworz_html_url($url, $nazwa) {
  // wyświetlenie URL-a jako łącza i nowa linia
?>
  <a href="<?php echo $url; ?>"><?php echo $nazwa; ?></a><br />
<?php
}

function wyswietl_sieci($tablica_sieci) {
  if (!is_array($tablica_sieci)) {
     echo "<p>Brak zapisanych sieci aptek</p>";
     return;
  }
  //stworzenie tabeli
	echo "<table width = \"30%\" cellspacing = \"0\" border = \"0\">";

	//stworzenie wiersza tabeli dla każdego elementu
	foreach ($tablica_sieci as $rzad)
	{
	  $url = "pokaz_sieci.php?id_kom=".($rzad['id_kom']);
	  echo "<tr><td>";
	  if (@file_exists("obrazki/".$rzad['id_kom'].".png")) {
		$tytul = "<img src=\"obrazki/".($rzad['id_kom']).".png\"
				  style=\"border: 1px solid black\"/>";
		tworz_html_url($url, $tytul);
	  } else {
	     echo "&nbsp;";
	     echo "</td><td>";
	     $tytul =  $rzad['nazwakat'];
	     tworz_html_url($url, $tytul);
	     echo "</td></tr>";
		}
	}
	echo "</table>";

}

function wyswietl_apteki($tablica_aptek) {
  //wyświetlenie wszystkich stacji z przekazanej tablicy
  if (!is_array($tablica_aptek)) {
     echo "<p>Brak zapisanych aptek w tej kategorii</p>";
  } else {
    //stworzenie tabeli
    echo "<table width = \"30%\" cellspacing = \"0\" border = \"0\">";

    //stworzenie wiersza tabeli dla każdego elementu
    foreach ($tablica_aptek as $rzad)
    {
      $url = "pokaz_apteki.php?id=".($rzad['id']);
      echo "<tr><td>";
      if (1 || @file_exists("obrazki/".$rzad['id'].".jpg")) {
        $link = "<img src=\"obrazki/".($rzad['id']).".jpg\"
                  style=\"border: 1px solid black\"/>";
        tworz_html_url($url, $link);
      } else {
        echo "&nbsp; k";
      }
      echo "</td><td>";
      $link =  $rzad['miasto'].', '.$rzad['dzielnica'].', '.$rzad['ulica'];
      tworz_html_url($url, $link);
      echo "</td></tr>";
    }
    echo "</table>";
  }
  echo "<hr />";
}

function wyswietl_dane_apteki($apteka) {
  // wy�wietlenie wszystkich danych konkretnego elementu
  if (is_array($apteka)) {
    echo "<table><tr>";
    //w�wietlenie obrazka je�eli istnieje
    if (@file_exists("obrazki/".($apteka['id']).".jpg")) {
      $wielkosc = GetImageSize("obrazki/".$apteka['id'].".jpg");
      if(($wielkosc[0] > 0) && ($wielkosc[1] > 0)) {
        echo "<td><img src=\"obrazki/".$apteka['id'].".jpg\" style=\"border: 1px solid black\"/></td";
      }
    }
    echo "<td><ul>";
    echo "<li><strong>Miasto:</strong> ";
    echo $apteka['miasto'];
	echo "<li><strong>Dzielnica:</strong> ";
    echo $apteka['dzielnica'];
	echo "<li><strong>Ulica:</strong> ";
    echo $apteka['ulica'];
	echo "<li><strong>Nazwa:</strong> ";
    echo $apteka['nazwa'];
    echo "</li><li><strong>Id:</strong> ";
    echo $apteka['id'];
    echo "</li><li><strong>Lon:</strong> ";
    echo number_format($apteka['lon'], 5);
	echo "</li><li><strong>Lat:</strong> ";
    echo number_format($apteka['lat'], 5);
    echo "</li><li><strong>Opis:</strong> ";
    echo $apteka['opis'];
    echo "</li></ul></td></tr></table>";
  } else {
    echo "B��d! Nie mo�na wy�wietli� danych dla tego elementu.";
  }
  echo "<hr />";
}

function wyswietl_form_log() {
  // wyświetlenie formularza logowania
?>
  <form method="post" action="admin.php">
  <table bgcolor="#cccccc">
   <tr>
     <td>Nazwa u�ytkownika:</td>
     <td><input type="text" name="nazwa_uz"/></td></tr>
   <tr>
     <td>Has�o:</td>
     <td><input type="password" name="haslo"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <button type="submin">Logowanie</button></td></tr>
   <tr>
 </table></form>
<?php
}

function wyswietl_menu_admin() {
?>
<br />
<?php
wyswietl_przycisk("index.php", "Strona g��wna");
wyswietl_przycisk("dodaj_siec_form.php", "Dodanie nowej sieci aptek");
wyswietl_przycisk("dodaj_apteke_form.php", "Dodanie nowej apteki");
wyswietl_przycisk("zmiana_hasla_form.php", "Zmiana has�a administratora");

}

function wyswietl_przycisk($cel, $alt) {
  echo "<center><div><button><a href=\"$cel\">$alt</a></button></div></center>";
}

function wyswietl_form_przycisk($obrazek, $alt) {
  echo "<div align=\"center\"><input type = \"image\"
        src=\"obrazki/$obrazek".".gif\"
        alt=\"".$alt."\" border=\"0\" height = \"50\"
        width = \"135\"/></center>";
}

function wyswietl_form_trasy() {
?>
	<div class="row">
		<p>Przeci�gnij czerwony punkt by wyznaczy� tras� do apteki.</p>
		<p>GIS Support GeoNetwork API</p>
		<label for="typ">Oblicz dla pojazdu: </label>
			<select id="typ">
			<option selected="selected" value="osobowy">do 3,5 t</option>
			<option value="ciezarowy">powy�ej 3,5 t</option>
		</select>
		<div id="wynik" class="hide">
		Odleg�o��: <span id="dystans"></span>, szacowany czas przejazdu: <span id="czas"></span>
		</div>
		<div id="wyznaczanie" class="hide">Wyznaczam now� tras�...</div>
		<hr />
	</div>
<?php
}
function wyswietl_mape($z=0){
?>
<script type="text/javascript">
	var map = new OpenLayers.Map('map', options);
	var google_teren = new OpenLayers.Layer.Google("Google teren", { type: google.maps.MapTypeId.TERRAIN });
	var google_satelita = new OpenLayers.Layer.Google("Google satelita", { type: google.maps.MapTypeId.SATELLITE });
	var google_hybryda = new OpenLayers.Layer.Google("Google hybryda", { type: google.maps.MapTypeId.HYBRID });
	var osm = new OpenLayers.Layer.OSM("Simple OSM Map");

	var bing1 = new OpenLayers.Layer.Bing({name: "Bing ulice", key: apiKey, type: "Road"});
	var bing2 = new OpenLayers.Layer.Bing({name: "Bing satelita", key: apiKey, type: "Aerial"});
	var bing3 = new OpenLayers.Layer.Bing({name: "Bing hybryda", key: apiKey, type: "AerialWithLabels"});
	
	map.addLayers([osm, google_teren, google_satelita, google_hybryda, bing1, bing2, bing3]);
	map.zoomIn();
        map.zoomOut();
        
	map.addControl(new OpenLayers.Control.LayerSwitcher());
	map.addControl(new OpenLayers.Control.PanZoomBar());
	map.addControl(new OpenLayers.Control.ScaleLine());
	map.addControl(new OpenLayers.Control.OverviewMap());
	map.addControl(new OpenLayers.Control.KeyboardDefaults());
	map.addControl(new OpenLayers.Control.MousePosition());
	map.addControl(new OpenLayers.Control.Navigation());
	
	var pois = new OpenLayers.Layer.Text( "Apteki",
                    { location:"./apteki.txt",
                      projection: map.displayProjection
                    });
    map.addLayer(pois);
	
	
	
	<?php if ($z) { ?>
		var zoom=15;
		var position = new OpenLayers.LonLat(lonst,latst).transform(wgs84, mercator);
		map.setCenter(position, zoom);
	<?php } else {?>
		var zoom=12;
		var position = new OpenLayers.LonLat(lon,lat).transform(wgs84, mercator);
		map.setCenter(position, zoom);
	<?php } ?>
</script>
<?php
}
function wyswietl_trase($id_obr){
?>
<script type="text/javascript">
	var map = new OpenLayers.Map('map', options);
	var google_teren = new OpenLayers.Layer.Google("Google teren", { type: google.maps.MapTypeId.TERRAIN });
	var google_satelita = new OpenLayers.Layer.Google("Google satelita", { type: google.maps.MapTypeId.SATELLITE });
	var google_hybryda = new OpenLayers.Layer.Google("Google hybryda", { type: google.maps.MapTypeId.HYBRID });
	var osm = new OpenLayers.Layer.OSM("Simple OSM Map");

	var bing1 = new OpenLayers.Layer.Bing({name: "Bing ulice", key: apiKey, type: "Road"});
	var bing2 = new OpenLayers.Layer.Bing({name: "Bing satelita", key: apiKey, type: "Aerial"});
	var bing3 = new OpenLayers.Layer.Bing({name: "Bing hybryda", key: apiKey, type: "AerialWithLabels"});
	
	var routeLayer = new OpenLayers.Layer.Vector("Wyznaczona trasa", {
		styleMap: new OpenLayers.Style({
			strokeColor: "#2f09c7",
			strokeWidth: 5.5,
			strokeOpacity: 0.4
		})
	});
	var markersLayer = new OpenLayers.Layer.Vector("Punkt pocz�tkowy i apteka");

	var startPoint = new OpenLayers.Geometry.Point(lonst,latst).transform(wgs84, mercator)
		
	var endPoint = new OpenLayers.Geometry.Point(lon,lat).transform(wgs84, mercator);
	markersLayer.addFeatures([
		new OpenLayers.Feature.Vector(startPoint, {}, {
			'pointRadius': 14,
			'externalGraphic': 'obrazki/'+<?php echo $id_obr ?>+'.png',
		}),
		new OpenLayers.Feature.Vector(endPoint, {}, {
			'pointRadius': 14,
			'externalGraphic': 'obrazki/marker_red.png',
		})
	]);
	var dragControl = new OpenLayers.Control.DragFeature(markersLayer, {
		onComplete: function () {
			calculateRoute()
		}
	});
	map.addControl(dragControl);
	dragControl.activate();
	map.addLayers([osm, google_teren, google_satelita, google_hybryda, bing1, bing2, bing3, routeLayer, markersLayer]);
	
	map.addControl(new OpenLayers.Control.LayerSwitcher());
	map.addControl(new OpenLayers.Control.PanZoomBar());
	map.addControl(new OpenLayers.Control.ScaleLine());
	map.addControl(new OpenLayers.Control.OverviewMap());
	map.addControl(new OpenLayers.Control.KeyboardDefaults());
	map.addControl(new OpenLayers.Control.MousePosition());
	map.addControl(new OpenLayers.Control.Navigation());
	
	var position = new OpenLayers.LonLat(lon,lat).transform(wgs84, mercator);
	var zoom=12;
	map.setCenter(position, zoom);
	
	var reader = new OpenLayers.Format.GeoJSON();
	 
	function calculateRoute() {
		routeLayer.removeAllFeatures();
		var x1 = markersLayer.features[0].geometry.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326")).x;
		var y1 = markersLayer.features[0].geometry.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326")).y;
		var x2 = markersLayer.features[1].geometry.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326")).x;
		var y2 = markersLayer.features[1].geometry.clone().transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326")).y;
		$('#wyznaczanie').removeClass('hide');
		$('#wynik').addClass('hide');
		$.getJSON(
			'http://api.gis-support.pl/v1/geonetwork/route/shortest', {
				flon: x1,
				flat: y1,
				tlon: x2,
				tlat: y2,
				vehicle: $('#typ').val(),
				user_key: '0062ea45e2b9e7957211ef97a9791b71'
			},
			function (data) {
				var newRoute = reader.read(data);
				newRoute[0].geometry = newRoute[0].geometry.clone().transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
				routeLayer.removeAllFeatures();
				routeLayer.addFeatures(newRoute);
				if (routeLayer.features.length) {
					$('#wynik').removeClass('hide');
					var feature = routeLayer.features[0];
					var kms = parseFloat(feature.attributes['length']).toFixed(2) + ' km ';
					var time = parseFloat(feature.attributes['time']);
					var hours = Math.floor(time);
					var ms = Math.round((time % 1) * 60);
					var mins = hours + ' h ' + ms + ' min';
					$('#czas').html(mins);
					$('#dystans').html(kms);
					map.zoomToExtent(routeLayer.getDataExtent());
				}
				$('#wyznaczanie').addClass('hide');
			}
	 
		)
			.fail(function (err) {
				$('#wyznaczanie').addClass('hide');
				alert('B��d serwera!');
			});
	}
	calculateRoute();
	$('#typ').change(function () {
		calculateRoute();
	});
</script>
<?php
}
?>