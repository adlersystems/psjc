// JavaScript Document

function onBodyLoad() {    
	document.addEventListener("deviceready", onDeviceReady, false);
}


/* begin onDeviceReady */
function onDeviceReady(){
	
	/* begin Check for updates */
	$.ajax({
		type: "GET",
		url: "http://www.parroquiasjc.org/app/php/update.php",
		dataType: "json",
		success: function(data) {
		  if (data.var == 1) {
			  $("#updateHeader").html('<a href="http://www.parroquiasjc.org/app/update.html" data-icon="alert" data-transition="fade">Actualizaci&oacute;n disponible</a>  <h1>Parroquia<br />San Juan de la Cruz</h1>');
		  }
		  else {
			  $("#updateHeader").html('<h1>Parroquia<br />San Juan de la Cruz</h1>');
		  }
		},
		error: function(data) {
			alert("Problem - perhaps malformed JSON?");
		}
	});
	/* end Check for updates */
	
	/////////////////////////////////////////////////////////////////////////////////
	
	/*
	 * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
	 * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
	 */
/*	$( document ).on( "pagecreate", "#map-page", function() {
		var defaultLatLng = new google.maps.LatLng(13.6436097, -89.2803691);  // Default to Hollywood, CA when no geolocation support
		
		if ( navigator.geolocation ) {
			function success(pos) {
				// Location found, show map with these coordinates
				// drawMap(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
				drawMap(defaultLatLng);
			}
			function fail(error) {
				drawMap(defaultLatLng);  // Failed to find location, show default map
			}
			// Find the users current position.  Cache the location for 5 minutes, timeout after 6 seconds
			navigator.geolocation.getCurrentPosition(success, fail, {maximumAge: 500000, enableHighAccuracy:true, timeout: 6000});
		} else {
			drawMap(defaultLatLng);  // No geolocation support, show default map
		}
		
		function drawMap(latlng) {
			var myOptions = {
				zoom: 10,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
			// Add an overlay to the map of current lat/lng
			var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				title: "Greetings!"
			});
		}
	});
*/}
/* end onDeviceReady */




/* AS framework - www.adlersystems.com */