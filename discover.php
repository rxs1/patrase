<!DOCTYPE html>
<html>
<head>
<?php
$title='Discover Market';
include('head.php');
?>
</head>
<body>
<?php
include('menubar.php');
?>
<section id="market-list">

<!-- <div class="container"> -->
<div id="map" style=" margin-top:5%;width:100%;height:600px;">
        </div>   
<!-- </div> -->
</section>
<?php
include('footer.php');
?>
</body>
<script type="text/javascript">
	function myFunction(id) {
    sessionStorage.SessionName = "id_pasar";
    sessionStorage.setItem("id_pasar",id);
    window.location.href = 'route.php';
    //infowindow.setContent('<div style="background-color: green">' + infowindow.getContent() + "</div>");
  }
  var defaults = {lat: -6.22171915637258, lng: 106.85611756132812};    

	var arr = new Array();
    function initialize() { 
        var locations = new Array();

        $.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                data:{
                    'action': 'allLocationDetail'}, 
                success: function(response){
                    data = jQuery.parseJSON(response);
                    locations= new Array();
                    if (data.length <= 1) {
                      $('#result').append( "<p>-- No market is define yet minimal 1 market --</p>");
                    } else {
                      locations = data;
                      init();
                      
                    }


                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });
         function init(){
                          
            var myOptions = {
                zoom: 10,
                center: defaults,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("map"), myOptions);

            var infowindow =  new google.maps.InfoWindow({
                content: ''
            });
            var i; 
            for (i = 0; i < locations.length; i++) {
                       
                    size=15;        
                   //  var img=new google.maps.MarkerImage('marker.png',           
                   //      new google.maps.Size(size, size),
                   //      new google.maps.Point(0,0),
                   //      new google.maps.Point(size/2, size/2)
                   // );

                var marker = new google.maps.Marker({

                    map: map,
                    title: locations[i].title,
                    position: new google.maps.LatLng(locations[i].lat, locations[i].lon),           
                        // icon: img
                });

                bindInfoWindow(marker, map, infowindow, "<p>" + locations[i].descr + "</p>" +
                                  '<button class="btn btn-success" onclick="myFunction(' + locations[i].id + ')">Route to</button>',locations[i].title);  

            }
            function bindInfoWindow(marker, map, infowindow, html, Ltitle) { 
                  google.maps.event.addListener(marker, 'mouseover', function() {
                          infowindow.setContent(html); 
                          infowindow.open(map, marker); 

                  });

            }

        }

  
}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-CkwZplHgj3yDPctt_PKmaAR56SsGbd8&callback=initialize&libraries=places">
    </script>
</html>