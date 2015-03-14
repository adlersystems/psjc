// JavaScript Document

function onBodyLoad() {    
	document.addEventListener("deviceready", onDeviceReady, false);
}


/* begin onDeviceReady */
function onDeviceReady(){
	/* begin Check for updates */
	window.requestFileSystem(LocalFileSystem.PERSISTENT, 0, function(fileSystem){
		fileSystem.root.getFile('download/filename.apk', {
			create: true, 
			exclusive: false
		},
		function(fileEntry) {
			var localPath = fileEntry.fullPath,
			fileTransfer = new FileTransfer(); 
			fileTransfer.download(apkURL, localPath, function(entry) {
				window.plugins.webintent.startActivity({
					action: window.plugins.webintent.ACTION_VIEW,
					url: 'file://' + entry.fullPath,
					type: 'application/vnd.android.package-archive'
				},
				function(){},
				function(e){
					alert('Error launching app update');
				}
			);
		},
		function (error) {
			alert("Error downloading APK: " + error.code);
		});
		},
		function(evt){
			alert("Error downloading apk: " + evt.target.error.code); 
		});
		},
		function(evt){
			alert("Error preparing to download apk: " + evt.target.error.code);
		});
	/* end Check for updates */
	
	/*
	 * Uses the filetransfer plugin
	 
	function downloadApkAndroid(data) {
		var fileURL = "http://www.parroquiasjc.org/app/apk/PSJCApp-debug.apk";
	
		var fileTransfer = new FileTransfer();
		var uri = encodeURI(data.android);
	
		fileTransfer.download(
			uri,
			fileURL,
			function (entry) {
	
				console.log("download complete: " + entry.fullPath);
	
				promptForUpdateAndroid(entry);
			},
			function (error) {
				console.log("download error source " + error.source);
				console.log("download error target " + error.target);
				console.log("upload error code" + error.code);
			},
			false,
			{
	
			}
		);
	}
	
	/*
	 * Uses the borismus webintent plugin
	 
	function promptForUpdateAndroid(entry) {
		window.plugins.webintent.startActivity({
			action: window.plugins.webintent.ACTION_VIEW,
			url: entry.toURL(),
			type: 'application/vnd.android.package-archive'
			},
			function () {
			},
			function () {
				alert('Failed to open URL via Android Intent.');
				console.log("Failed to open URL via Android Intent. URL: " + entry.fullPath);
			}
		);
	}
	
	/////////////////////////////////////////////////////////////////////////////////
	
	/*
	 * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
	 * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
	 */
	$( document ).on( "pagecreate", "#map-page", function() {
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
}
/* end onDeviceReady */




/* AS framework - www.adlersystems.com */