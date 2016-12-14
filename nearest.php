<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
  <?php
  $title='Nearest Market';
  include('head.php');
  ?>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<?php include('menubar.php')?>

<!-- home section -->
<section id="nearest">
  <div class="container">
     <div class="row">
      <div class="col-md-12 col-sm-12" >
      <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="map" style="width:100%;height:600px;">
           
        </div>
      </div>
      <div class="col-md-4 col-sm-4" >
       <div class="scrolling">
        <div id="route-direction" ></div>
      </div>
      </div>
=======
  <meta charset="utf-8">
  <title>Pasar Traditional Search</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
<!--

Template 2075 Digital Team

http://www.tooplate.com/view/2075-digital-team

-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/et-line-font.css">
  <link rel="stylesheet" href="css/nivo-lightbox.css">
  <link rel="stylesheet" href="css/nivo_themes/default/default.css">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- preloader section -->
<div class="preloader">
  <div class="sk-spinner sk-spinner-circle">
       <div class="sk-circle1 sk-circle"></div>
       <div class="sk-circle2 sk-circle"></div>
       <div class="sk-circle3 sk-circle"></div>
       <div class="sk-circle4 sk-circle"></div>
       <div class="sk-circle5 sk-circle"></div>
       <div class="sk-circle6 sk-circle"></div>
       <div class="sk-circle7 sk-circle"></div>
       <div class="sk-circle8 sk-circle"></div>
       <div class="sk-circle9 sk-circle"></div>
       <div class="sk-circle10 sk-circle"></div>
       <div class="sk-circle11 sk-circle"></div>
       <div class="sk-circle12 sk-circle"></div>
    </div>
</div>

<!-- navigation section -->
<section class="navbar navbar-fixed-top custom-navbar" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">Patrase</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="smoothScroll">HOME</a></li>
        <li class="dropdown">
          <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">PATRASE<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="background-color: transparent;">
            <li><a href="find-market.php" class="smoothScroll">FIND</a></li>
            <li><a href="nearest.php" class="smoothScroll">NEAREST MARKET</a></li>
            <li><a href="market-list.php" class="smoothScroll">MARKET LIST</a></li>
            <li><a href="route.php" class="smoothScroll">ROUTE</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- home section -->
<section id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>Pasar Traditional Search</h3>
        <h1>Patrase</h1>
        <hr>
      </div>
       <div class="col-md-6 col-md-offset-3">
       <form method="GET" action="">
          <input type="text" style="width: 100%" class="form-control" placeholder="Search Market..." >
            <span class="input-group-btn">
              <a href="location.php"><button class="btn btn-default" type="button">Go!</button></a>
            </span>
        </form>
      </div>
            
>>>>>>> master
    </div>
  </div>    
</section>

<!-- footer section -->
<<<<<<< HEAD
<?php include('footer.php')?>
=======
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <p>Copyright © Digital Team HTML5 Template | Design: <a href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
      </div>
    </div>
  </div>
</footer>

>>>>>>> master

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
<<<<<<< HEAD
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
        marker = new google.maps.Marker({
          position: defaults,
          map: map,
          draggable: true
        });

        marker.addListener('drag', function () {
          pos = marker.getPosition();
        });
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
                  // map.setZoom(11);
                  // var marker = new google.maps.Marker({
                  //   position: pos,
                  //   map: map
                  // });
                  //infowindow.setContent(results[1].formatted_address);
                  //infowindow.open(map, marker);

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
=======
>>>>>>> master

</body>
</html>