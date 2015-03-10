<?php
  include("php/connect.php");
  
  $fecha = date("Y-m-d");
  
  $query = "SELECT * FROM palabra where date_format(fecha, '%Y-%m-%d') = '$fecha'";
  $result = mysqli_query($link, $query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  
  <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="css/themes/psjc.min.css" />
  <link rel="stylesheet" href="css/icon-pack-custom.css"/>
  
  <link rel="stylesheet" href="css/styles.css" />
  
  <title>Parroquia San Juan de la Cruz</title>
  
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/assets/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/assets/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/assets/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/assets/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/assets/favicon.ico">
  
  <script>
    function addLeadingChars(string, nrOfChars, leadingChar) {
	  string = string + '';
	  return Array(Math.max(0, (nrOfChars || 2) - string.length + 1)).join(leadingChar || '0') + string;
	}

    var date1 = new Date();
	var year = date1.getFullYear();
	var month = ("0" + (date1.getMonth() + 1)).slice(-2)
	var date = ("0" + date1.getDate()).slice(-2)
	
	var fecha = year+'-'+month+'-'+date;
	
	
	/*jQuery.ajax({
		type: "POST",
		url: "http://www.parroquiasjc.org/app/php/get-date.php",
		data: 'data='+JSON.stringify(fecha),
		cache: false,
		dataType: "text",
		success: onSuccess
	});*/
	
	////////////////////////////////////////////////////////////
	
	$('#map_canvas').gmap().bind('init', function(ev, map) {
	$('#map_canvas').gmap('addMarker', {'position': '57.7973333,12.0502107', 'bounds': true}).click(function() {
		$('#map_canvas').gmap('openInfoWindow', {'content': 'Hello World!'}, this);
	});
});
  </script>
  
</head>

<body>
  <!-- Home -->
  <div data-role="page" id="home" data-theme="e">
    <!-- header -->
	<div data-role="header">
	  <h1>Parroquia<br />San Juan de la Cruz</h1>
	</div>
	<!-- /header -->
	
	<!-- content -->
	<div role="main" class="ui-content">
      <div class="ui-grid-a ui-responsive">
        <div class="ui-block-a"><a href="#palabra" class="ui-btn ui-input-btn ui-icon-comment ui-btn-icon-top ui-corner-all ui-shadow">Palabra diaria</a></div>
        
        <div class="ui-block-b"><a href="#horarios" class="ui-btn ui-input-btn ui-icon-clock ui-btn-icon-top ui-corner-all ui-shadow">Horarios</a></div>
        
        <div class="ui-block-a"><a href="#avisos" class="ui-btn ui-input-btn ui-icon-info ui-btn-icon-top ui-corner-all ui-shadow">Avisos</a></div>
        
        <div class="ui-block-b"><a href="#map-page" class="ui-btn ui-input-btn ui-icon-mail ui-btn-icon-top ui-corner-all ui-shadow">Contacto</a></div>
      </div>
	</div>
	<!-- /content -->
	
	<!-- footer -->
	<div data-role="footer">
	  <h4>2015 &copy; PSJC.<br />Creado por <a href="http://www.adlersystems.com" target="_blank">Adler Systems</a>.</h4>
	</div>
	<!-- /footer -->
  </div>
  <!-- /Home -->
  
  <!-- Palabra diaria -->
  <div data-role="page" id="palabra" data-theme="e">
	<!-- header -->
	<div data-role="header">
      <a href="#home" data-icon="home" data-iconpos="notext" data-transition="fade">Inicio</a>
      
	  <h1>Parroquia<br />San Juan de la Cruz</h1>
	</div>
	<!-- /header -->
	
	<!-- content -->
	<div role="main" class="ui-content" id="lecturas">
     <?php include("php/palabra-diaria.php"); ?>
	</div>
	<!-- /content -->
	
	<!-- footer -->
	<div data-role="footer">
	  <h4>2015 &copy; PSJC.<br />Creado por <a href="http://www.adlersystems.com" target="_blank">Adler Systems</a>.</h4>
	</div>
	<!-- /footer -->
  </div>
  <!-- /Palabra diaria -->
  
  <!-- Horarios -->
  <div data-role="page" id="horarios" data-theme="e">
	<!-- header -->
	<div data-role="header">
      <a href="#home" data-icon="home" data-iconpos="notext" data-transition="fade">Inicio</a>
      
	  <h1>Parroquia<br />San Juan de la Cruz</h1>
	</div>
	<!-- /header -->
	
	<!-- content -->
	<div role="main" class="ui-content">
      <!-- Secretaría -->
      <div data-role="collapsible">
        <h4>Secretar&iacute;a</h4>
        <p>
          <strong>Lunes a Viernes:</strong> 8:30 a.m. a 12:30 p.m.; 2:00 a 5:30 p.m.
          <br /><br />
          <strong>S&aacute;bados:</strong> 8:00 a.m. a 1:00 p.m.
        </p>
      </div>
      <!-- /Secretaría -->
      
      <!-- Misas -->
      <div data-role="collapsible">
        <h4>Misas</h4>
        <p>
          <strong>Lunes a Viernes:</strong> 7:00 a.m. y 6:00 p.m.
          <br /><br />
          <strong>S&aacute;bados:</strong> 7:00 a.m.; 12:30 y 6:00 p.m.
          <br /><br />
          <strong>Domingos y d&iacute;as festivos:</strong> 7:30 y 10:00 a.m.; 5:00 y 6:30 p.m.
        </p>
      </div>
      <!-- /Misas -->
      
      <!-- Confesiones -->
      <div data-role="collapsible">
        <h4>Confesiones</h4>
        <p>Las confesiones se realizan durante las Misas de fin de semana.</p>
      </div>
      <!-- /Confesiones -->
      
      <!-- Bautizos -->
      <div data-role="collapsible">
        <h4>Bautizos comunitarios</h4>
        <p>Los bautizos comunitarios se realizan el <strong>1er s&aacute;bado</strong> y el <strong>3er domingo</strong> de cada mes.</p>
      </div>
      <!-- /Bautizos -->
	</div>
	<!-- /content -->
	
	<!-- footer -->
	<div data-role="footer">
	  <h4>2015 &copy; PSJC.<br />Creado por <a href="http://www.adlersystems.com" target="_blank">Adler Systems</a>.</h4>
	</div>
	<!-- /footer -->
  </div>
  <!-- /Horarios -->
  
  <!-- Avisos -->
  <div data-role="page" id="avisos" data-theme="e">
    <!-- header -->
	<div data-role="header">
      <a href="#home" data-icon="home" data-iconpos="notext" data-transition="fade">Inicio</a>
      
	  <h1>Parroquia<br />San Juan de la Cruz</h1>
	</div>
	<!-- /header -->
    
    <!-- content -->
	<div role="main" class="ui-content" id="noticias">
      <ul data-role="listview" data-inset="true">
        <?php include("php/avisos.php"); ?>
      </ul>
	</div>
	<!-- /content -->
    
    <!-- footer -->
	<div data-role="footer">
	  <h4>2015 &copy; PSJC.<br />Creado por <a href="http://www.adlersystems.com" target="_blank">Adler Systems</a>.</h4>
	</div>
	<!-- /footer -->
  </div>
  <!-- /Avisos -->
  
  <!-- Contacto -->
  <div data-url="map-page" data-role="page" id="map-page" data-theme="e">
	<!-- header -->
	<div data-role="header">
      <a href="#home" data-icon="home" data-iconpos="notext" data-transition="fade">Inicio</a>
      
	  <h1>Parroquia<br />San Juan de la Cruz</h1>
	</div>
	<!-- /header -->
	
	<!-- content -->
	<div role="main" class="ui-content">
      <h2>Detalles de contacto</h2>
      <ul data-role="listview" data-inset="true">
        <li title="Res. Via del Mar, Km. 11 1/2 a La Libertad, El Salvador."><i class="ui-icon-location ui-btn-icon-left"></i> Res. Via del Mar, Km. 11 1/2 a La Libertad, El Salvador.</li>
        <li title="+503 2242-7582"><i class="ui-icon-phone ui-btn-icon-left"></i> +503 2242-7582</li>
        <li title="info@parroquiasjc.org"><a href=""><i class="ui-icon-mail ui-btn-icon-left"></i> info@parroquiasjc.org</a></li>
      </ul>
      
      <div class="ui-bar-c ui-corner-all ui-shadow" style="padding:1em;">
        <div id="map-canvas" style="height:350px;"></div>
      </div>
      
      <p>&nbsp;</p>
      
      <h2>S&iacute;guenos en...</h2>
      <div class="ui-grid-a ui-responsive">
        <div class="ui-block-a"><a href="https://www.facebook.com/parroquiasjcruz" data-role="button" data-icon="facebook" data-theme="a">Facebook</a></div>
        
        <div class="ui-block-b"><a href="https://www.twitter.com/parroquiasjcruz" data-role="button" data-icon="twitter" data-theme="b">Twitter</a></div>
      </div>
	</div>
	<!-- /content -->
	
	<!-- footer -->
	<div data-role="footer">
	  <h4>2015 &copy; PSJC.<br />Creado por <a href="http://www.adlersystems.com" target="_blank">Adler Systems</a>.</h4>
	</div>
	<!-- /footer -->
  </div>
  <!-- /Contacto -->
  
  <!-- JS -->
  <script type="text/javascript" src="js/custom.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
</body>
</html>