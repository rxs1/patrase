


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
    <style type="text/css">
    html { height: 100% }
    body { height: 100%; margin: 0; padding: 0 }
    #map-canvas { height: 100% }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&v=3&libraries=geometry&key=AIzaSyDOKT6UeawkNsGVZVjOWLczHtcDYfZTyBE" type="text/javascript"></script>
    <script>
$(document).ready(function(){
      var latlngs = [];
      var startingPoint;
      var locations = ['-6.3792329,106.9935931','-6.3599549,106.9544543', '-6.3788064,106.9154872', '-6.3832846,106.8922271'];
      
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': 'USA'}, function (results, status) {
            map.fitBounds(results[0].geometry.viewport);               
        });
        var bounds = new google.maps.LatLngBounds();
        for (var j = 0; j < locations.length; j++) {
            codeAddress(locations[j]);
        }   
        startingPoint = new google.maps.LatLng(-6.4259747,107.1590747);  
        var mapOptions = {
          zoom: 14,
          center: startingPoint,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        
        var marker = new google.maps.Marker({
            map: map,
            icon: "http://www.conceptfire-uk.com/wp-content/uploads/2011/07/icon-pin-color.png",
            position: startingPoint
        });
        

      function codeAddress(address) {
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            var location = results[0].geometry.location;
            compareDistances(location);
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      
      function compareDistances(loc){           
        latlngs.push(loc);//add markers to the latlngs array
        //when the markers array length matches the locations array length...
        if (latlngs.length == locations.length){
            var distances = [];
            //use geometry.spherical to calculate the distances between pairs of lat/lng coordinates
            for(var j = 0; j < latlngs.length; j++){
                distances.push({distance:google.maps.geometry.spherical.computeDistanceBetween(startingPoint, latlngs[j]), marker: j});
            }
            //reorder the distances, shortest first, closest will then be distances[0] and distances[1]
            distances.sort(function(a,b) {
                return a.distance - b.distance;
            }); 
            //add the two closest markers
            var marker1 = new google.maps.Marker({map: map, position: latlngs[distances[0].marker]});
            var marker2 = new google.maps.Marker({map: map, position: latlngs[distances[1].marker]});
            //extend the bounds of the map to include the two closest markers and the starting point
            bounds.extend(startingPoint);
            bounds.extend(latlngs[distances[0].marker]);
            bounds.extend(latlngs[distances[1].marker]);
            
            //zoom the map to nicely fit the bounds of the two closest markers and the starting point
            map.fitBounds(bounds);
        }
      }
});

    </script>
  </head>
  <body>

    <div id="map-canvas"></div>
  </body>
</html>