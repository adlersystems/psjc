// JavaScript Document

function onBodyLoad() {    
	document.addEventListener("deviceready", onDeviceReady, false);
}


/* begin onDeviceReady */
function onDeviceReady(){
	
	/* begin update */
	jQuery(document).ready(function(){
		jQuery("#update").load("http://www.parroquiasjc.org/app/php/update.php");
	});
	/* end update */
	
	/* begin lecturas */
	$( "#lecturas" ).load( "http://www.parroquiasjc.org/app/php/palabra-diaria.php", function( response, status, xhr ) {
	  if ( status == "error" ) {
		var msg = "Sorry but there was an error: ";
	  $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
	  }
	});
	/* end lecturas */
	
	
	/* begin avisos */
	  $( "#noticias" ).load( "http://www.parroquiasjc.org/app/php/avisos.php", function( response, status, xhr ) {
		if ( status == "error" ) {
		  var msg = "Sorry but there was an error: ";
		$( "#error2" ).html( msg + xhr.status + " " + xhr.statusText );
		}
	  });
	/* end avisos */
	
}
/* end onDeviceReady */




/* AS framework - www.adlersystems.com */