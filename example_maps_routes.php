
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Displaying text directions with <code>setPanel()</code></title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel {
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel select, #right-panel input {
  font-size: 15px;
}

#right-panel select {
  width: 100%;
}

#right-panel i {
  font-size: 12px;
}

      #right-panel {
        height: 100%;
        float: right;
        width: 390px;
        overflow: auto;
      }

      #map {
        margin-right: 400px;
      }

      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #map {
          height: 500px;
          margin: 0;
        }

        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <strong>Asal:
      <input type="text" id='lat' value="Drag Asal" disabled>
	  <input type="text" id='lng' value="Drag Asal" disabled>
      </strong>
    
      <br>
      <strong>Tujuan:</strong>
      <select id="end">
        <option value="chicago, il">Chicago</option>
        <option value="st louis, mo">St Louis</option>
        <option value="joplin, mo">Joplin, MO</option>
        <option value="oklahoma city, ok">Oklahoma City</option>
        <option value="amarillo, tx">Amarillo</option>
        <option value="gallup, nm">Gallup, NM</option>
        <option value="flagstaff, az">Flagstaff, AZ</option>
        <option value="winona, az">Winona</option>
        <option value="kingman, az">Kingman</option>
        <option value="barstow, ca">Barstow</option>
        <option value="san bernardino, ca">San Bernardino</option>
        <option value="-6.22171915637258, 106.85611756132812">Los Angeles</option>
      </select>
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>
    <script>
    var marker;
	var map;
	var myLatLng;

	myLatLng = {lat: -6.22171915637258, lng: 106.85611756132812};



function initMap() {
	
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
    var map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 11,
	    center: myLatLng
    });


	addMarker(myLatLng, map);
    marker.addListener('dragend', function () {
            updateMarkerPosition(marker.getPosition());
    });
   
 

  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  var control = document.getElementById('floating-panel');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  
  document.getElementById('end').addEventListener('change', onChangeHandler);
}

function addMarker(location, map) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.

     marker = new google.maps.Marker({
        position: location,
        label: '',
        map: map,
        draggable: true
    });
}

function updateMarkerPosition(latLng) {
  document.getElementById('lat').value = [latLng.lat()];
  document.getElementById('lng').value = [latLng.lng()];
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var lat = parseFloat(document.getElementById('lat').value);
  var lng = parseFloat(document.getElementById('lng').value);
  var start ={lat: lat, lng: lng};
  alert(start);
  var end = document.getElementById('end').value;
  alert(end);
  directionsService.route({
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOKT6UeawkNsGVZVjOWLczHtcDYfZTyBE&callback=initMap&libraries=places" async defer
></script>
  </body>
</html>