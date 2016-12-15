<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $title='ROUTE TO MARKET';
  include('head.php');
  ?>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<?php include('menubar.php')?>


<!-- route section -->
<section id="route">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>From</h3>
        <input type="text" readonly="readonly" id="from" style="width: 100%" class="form-control" placeholder="Please input beginning location ..." >

        <h3>To Market ..</h3>
        <div class="col-md-4 col-sm-4">
          <h5><i class="icon-globe small-icon"></i> Region</h5>
            <select name="region" class="form-control" aria-hidden="true" tabindex="-1" id="region">
                <option value="" disabled="true" selected="true">Please select region ..</option>
                <?php 
                  $query1 = "SELECT * FROM mst_region";
                  $result1 = @mysql_query($query1);
                  $i=0;

                  while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                ?>

                <option value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                                <?php } ?>
            </select>
        </div>

        <div class="col-md-4 col-sm-4">
          <h5><i class="icon-grid small-icon"></i> Category</h5>
            <select name="category" class="form-control" aria-hidden="true" tabindex="-1" id="category">
                <option value="" disabled="true" selected="true">Please select category ..</option>
                <?php
                  $query1 = "SELECT * FROM mst_category";
                  $result1 = @mysql_query($query1);

                  while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                ?>

                <option value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                                <?php } ?>
            </select>
        </div>
        <div class="col-md-4 col-sm-4">
          <h5><i class="icon-basket small-icon"></i> Market</h5>
            <select name="market" class="form-control" aria-hidden="true" tabindex="-1" id="market">
                <option value="" disabled="true" selected="true">Please select market destination ..</option>
                <?php 
                //default option value: list all market
                //when region or category are choosen, adjust option value
               
                  $query_pasar = "SELECT * FROM mst_pasar";
                  $result_pasar = @mysql_query($query_pasar);

                    while ($row1 = mysql_fetch_array($result_pasar, MYSQL_ASSOC)) {
                  ?>

                  <option value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                                  <?php }
                   //kalau udh ada id pasarnya, otomatis kepilih 
                ?>
            </select>
            <br>
        </div>

        <div id="button-route" style="text-align:center;">
          <button id="get-route" class="btn default">Get Route</button>
        </div>
      </div>
            
    </div>
    <br>
    <div class="row">
      <div class="col-md-8 col-sm-8" >
      <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="map" style="width:100%;height:600px;">
           
        </div>
      </div>
      <div class="col-md-4 col-sm-4" >
       <div class="scrolling">
        <div id="route-direction" ></div>
      </div>
      </div>
    </div>
    
  </div>    
</section>

<!-- footer section -->
<?php include('footer.php')?>


<script type="text/javascript">
    var pos;
    var map; 
    var marker;
    var defaults = {lat: -6.22171915637258, lng: 106.85611756132812};
   function initMap() {
        var geocoder = new google.maps.Geocoder;
        map = new google.maps.Map(document.getElementById('map'), {
          center: defaults,
          zoom: 15,
          draggable : true
        });
        directionsDisplay = new google.maps.DirectionsRenderer;
        directionsService = new google.maps.DirectionsService;
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('route-direction'));
        var infoWindow = new google.maps.InfoWindow({map: map});
       
        pos = defaults;
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            handleLocationName(geocoder, pos);
            marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    draggable: true
            });

            marker.addListener('drag', function () {
              pos = marker.getPosition();
            });
            google.maps.event.addListener(marker, 'dragend', function() {
              handleLocationName(geocoder, pos);
            });
            
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
            
        
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {

          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
                pos = marker.getPosition();
                infoWindow.setPosition(pos);
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
      }
      function handleLocationName(geocoder, pos){
        geocoder.geocode({'location': pos}, function(results, status) {
              if (status === 'OK') {
                if (results[0]) {
                 

                  document.getElementById("from").value = results[0].formatted_address + " " + marker.getPosition();
                } else {
                  window.alert('No results found');
                }
              } else {
                window.alert('Geocoder failed due to: ' + status);
              }
            });
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
         marker = new google.maps.Marker({
          position: defaults,
          map: map,
          draggable: true
        });

        marker.addListener('drag', function () {
          pos = marker.getPosition();
        });
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
  $(document).ready(function(){
    if (sessionStorage.getItem("id_pasar")) {
      document.getElementById('market').value=sessionStorage.getItem("id_pasar");
    }
    $('#region').change(function(){
      $('#market').html('');
      $('#market').append('<option value="" disabled="true" selected="true">Please select market destination ..</option>');

      var region = $(this).val();
      var category = $('#category').val();
      var action = 'list';
        $.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                //contentType: "application/json",
                data:{
                    'action': action,
                    'region': region,
                    'category': category}, 
                success: function(response){
                    
                    data = jQuery.parseJSON(response);
                    if (data.length == 0) {
                      $('#market').append( "<option disabled>-- No market with choosen category and region --</option>");
                    } else {
                      for (var i = 0; i < data.length; i++) {
                        $('#market').append( "<option value=" + data[i].id + ">" + data[i].name + "</option>");

                      }
                    }
                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });
    });

    $('#category').change(function(){
      $('#market').html('');
      $('#market').append('<option value="" disabled="true" selected="true">Please select market destination ..</option>');

      var region = $('#region').val();
      var category = $('#category').val();
      var action = 'list';
        $.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                //contentType: "application/json",
                data:{
                    'action': action,
                    'region': region,
                    'category': category}, 
                success: function(response){
                    
                    data = jQuery.parseJSON(response);
                    if (data.length == 0) {
                      $('#market').append( "<option disabled>-- No market with choosen category and region --</option>");
                    } else {
                      for (var i = 0; i < data.length; i++) {
                        $('#market').append( "<option value=" + data[i].id + ">" + data[i].name + "</option>");

                      }
                    }
                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });
    });

    $('#button-route').on('click', '#get-route', function() {
    
      //get value 'from'
      var from = $('#from').val();
      //get id market for get market location
      var id_market = $('#market').val();
      if(id_market != null) {
         //gimana caranya buat rutenya #.#
      var action = 'location';
      
      $.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                //contentType: "application/json",
                data:{
                    'action': action,
                    'id_market': id_market}, 
                success: function(response){
                    
                    data = jQuery.parseJSON(response);
                    if (data.length == 0) {
                      $('#market').append( "<option disabled>-- No market with choosen category and region --</option>");
                    } else {
                      var longEnd = data.lng;
                      var latEnd = data.lat;
                      //alert(data);
                      end = latEnd + ", " + longEnd;
                      
                      calculateAndDisplayRoute(directionsService, directionsDisplay, pos, end);
                    }
                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });
      
      } else {
        alert("Please choose the market destination.")
      }
     

    });

  });
  function calculateAndDisplayRoute(directionsService, directionsDisplay, start, end) {
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
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-CkwZplHgj3yDPctt_PKmaAR56SsGbd8&callback=initMap&libraries=places">
    </script>

</body>
</html>

