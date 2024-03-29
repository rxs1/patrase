<!DOCTYPE html>
<html>
<head>
<?php
$title='Nearest Market';
include('head.php');
?>
</head>
<body>  
<?php
include('menubar.php');
?>

<!-- market list section -->
<section id="market-list">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
            <center><h2>Find Nearest</h2></center>
            <hr>
            <br>
            <input type="text" readonly="readonly" id="start" style="width: 100%" class="form-control" placeholder="Drag marker if your still not define start location" >
           
            <center><p style="margin-top:3%"><button class="btn btn-primary"  id="find" ">Find Now</button></p></center>
             <p class="col-md-12" id="result"> </p>
      </div>
       <div class="col-md-12 col-sm-12">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="map" style="width:100%;height:400px;">
           
        </div>
      </div>
    </div>
  </div>    
</section>


<?php
include('footer.php');
?>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-CkwZplHgj3yDPctt_PKmaAR56SsGbd8&libraries=geometry,places&callback=initMap">
    </script>
 <script>
function myFunction(id) {
    sessionStorage.SessionName = "id_pasar";
    sessionStorage.setItem("id_pasar",id);
    window.location.href = 'route.php';
    //infowindow.setContent('<div style="background-color: green">' + infowindow.getContent() + "</div>");
  }
  function initMap(){



		$.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                data:{
                    'action': 'allLocation'}, 
                success: function(response){
                    
                    data = jQuery.parseJSON(response);
                    locations= new Array();
                    locationsObj = data;
                    if (data.length <= 1) {
                      $('#result').append( "<p>-- No market is define yet minimal 2 market --</p>");
                    } else {

                      for (var i = 0; i < data.length; i++) {
                        locations.push(data[i].lat+', '+data[i].lng);
                        
                      }
                      init();
                      
                    }


                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });
      
            function init(){
                  var latlngs = [];
                  var locInfo = [];
                  var map; 
                  var marker;
                  var startPoint;
                  var marker1; 
                  var defaults = {lat: -6.22171915637258, lng: 106.85611756132812};    
                  
                  //map
                  var bounds = new google.maps.LatLngBounds();
                  var geocoder = new google.maps.Geocoder;
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: defaults,
                      zoom: 15,
                      draggable : true
                    });
                  var infoWindow = new google.maps.InfoWindow({map: map});
                  var infoWindow1 = new google.maps.InfoWindow({map: map});;
                  // Try HTML5 geolocation.
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                      startPoint = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                      };
                      handleLocationName(geocoder, startPoint);
                      marker = new google.maps.Marker({
                              position:startPoint,
                              map: map,
                              icon: "http://www.conceptfire-uk.com/wp-content/uploads/2011/07/icon-pin-color.png",
                              draggable: true
                      });

                      marker.addListener('drag', function () {
                        startPoint = marker.getPosition();
                      });

                      google.maps.event.addListener(marker, 'dragend', function() {
                        handleLocationName(geocoder, startPoint);
                      });
                      
                      infoWindow.setPosition(startPoint);
                      infoWindow.setContent('Location found.');
                      map.setCenter(startPoint);

                     start = new google.maps.LatLng(startPoint); 
                     $('#find').click(function(){
                      findNearest();
                     });
                                
                    }, function() {
                      handleLocationError(true, infoWindow, map.getCenter());
                    });
                  } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, defaults);
                  }

                    
                  //searchbox init 
                  var input = document.getElementById('pac-input');
                  var searchBox = new google.maps.places.SearchBox(input);
                  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                  map.addListener('bounds_changed', function () {
                      searchBox.setBounds(map.getBounds());
                      startPoint = marker.getPosition();
                      infoWindow.setPosition(startPoint);
                      infoWindow.setContent('Location found.');
                     
                      
                  });

                  searchBox.addListener('places_changed', function () {
                      var places = searchBox.getPlaces();
                      if (places.length == 0) {
                          return;
                      }
                              // For each place, get the icon, name and location.
                            var bounds = new google.maps.LatLngBounds();
                              places.forEach(function (place) {
                                  var icon = {
                                      url: place.icon,
                                      size: new google.maps.Size(71, 71),
                                      origin: new google.maps.Point(0, 0),
                                      anchor: new google.maps.Point(17, 34),
                                      scaledSize: new google.maps.Size(25, 25)
                                  };
                                  marker.setPosition(place.geometry.location);
                                  if (place.geometry.viewport) {
                                      // Only geocodes have viewport.
                                      bounds.union(place.geometry.viewport);
                                  } else {
                                      bounds.extend(place.geometry.location);
                                  }
                              });
                              map.fitBounds(bounds);
                          });  

                  function findNearest(){
                     //find nearest

                     latlngs =[];
                     locInfo = [];
                   
                      for (var j = 0; j < locations.length; j++) {

                          codeAddress(locations[j]);
                      } 
                  }
                  
                  function codeAddress(address) {
                     // alert(address);
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
                   var bounds = new google.maps.LatLngBounds();        
                    latlngs.push(loc);//add markers to the latlngs array
                    locInfo = locationsObj;
                    //alert("mnb m"+locInfo[0].id);
                    //when the markers array length matches the locations array length...
                    if (latlngs.length == locations.length){
                        var distances = [];
                        
                        //use geometry.spherical to calculate the distances between pairs of lat/lng coordinates
                        for(var j = 0; j < latlngs.length; j++){
                            var dist = {distance:google.maps.geometry.spherical.computeDistanceBetween(startPoint, latlngs[j]), marker: j};
                            distances.push(dist);
                            locInfo[j].distance = dist.distance;
                            
                            //alert(dist + " " + locationsObj[j]["distance"]);


                        }

                        locInfo.sort(function(a, b) {
                            //alert("sort");
                            return a.distance - b.distance;
                        });
                        //reorder the distances, shortest first, closest will then be distances[0] and distances[1]
                        distances.sort(function(a,b) {
                            //alert (a.distance - b.distance);
                            return a.distance - b.distance;
                        });
                       
                        //add the two closest markers
                        if(marker1 != null){
                          marker1.setPosition(latlngs[distances[0].marker]);

                        }else{
                          marker1= new google.maps.Marker({map: map, position: latlngs[distances[0].marker]});  
                        }
                        //extend the bounds of the map to include the two closest markers and the starting point
                        bounds.extend(startPoint);
                        //alert(locInfo[0]["id"]);
                        bounds.extend(latlngs[distances[0].marker]);
                        $.ajax({
                            type: "POST",
                            url: "function.php",
                            crossDomain: false,
                            data:{
                                'action': "detail",
                                'id': locInfo[0]["id"]}, 
                            success: function(response){
                                data = jQuery.parseJSON(response);
                                infoWindow1.setPosition(latlngs[distances[0].marker]);
                                infoWindow1.setContent('<p><b>' + data.name + '</b></p>' +
                                  '<p>' + data.address + '</p>' +
                                  '<button class="btn btn-success" onclick="myFunction(' + data.id + ')">Route to</button>');
                                alert
                            },  error: function (xhr, ajaxOptions, thrownError) {
                                window.alert("Kesalahan Internal");//error handle
                            }
                        });
                        
                        //alert (locationsObj[0]["id"]);

                        
                        //zoom the map to nicely fit the bounds of the two closest markers and the starting point
                        map.fitBounds(bounds);

                    }
                  } 
                    
                    function handleLocationName(geocoder, pos){
                      geocoder.geocode({'location': start}, function(results, status) {
                            if (status === 'OK') {
                              if (results[0]) {
                               

                                document.getElementById("start").value = results[0].formatted_address + " " + marker.getPosition();
                              } else {
                                window.alert('No results found');
                              }
                            } else {
                              window.alert('Geocoder failed due to: ' + status);
                            }
                          });
                    }

                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                      $('#result').append( "<p class=' alert alert-warning'>Please refresh or active your gps and then refresh, [gps error]</p>");

                      infoWindow.setPosition(pos);
                      infoWindow.setContent(browserHasGeolocation ?


                                            'Error: The Geolocation service failed.' :
                                            'Error: Your browser doesn\'t support geolocation.');
                    }


                }

      



}

    </script>
</body>
</html>