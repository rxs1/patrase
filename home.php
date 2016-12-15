<!DOCTYPE html>
<html lang="en">
<head>
<?php 

$title = "Home";
include('head.php');?>
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
			<?php include('menubar.php');?>

			<!-- <ul class="nav navbar-nav navbar-right">
				<li><a href="index.php" class="smoothScroll">HOME</a></li>
				<li><a href="dashboard.php" class="smoothScroll">PATRASE</a></li>
			</ul> -->
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
			    <input type="text" style="width: 100%" id="searchInput" class="form-control" placeholder="Search Market..." >
				  	<span class="input-group-btn">
			        <a href="location.php"><button class="btn btn-default" type="button">Go!</button></a>
			      </span>
			</div>
			      
		</div>
	</div>		
</section>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright © Digital Team HTML5 Template | Design: <a href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
			</div>
		</div>
	</div>
</footer>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
<script>
	function initMap() {
    	var input = document.getElementById('searchInput');
		var options = {
		    types: ['(geocode)'],
		};

		autocomplete = new google.maps.places.Autocomplete(input, options);
		
	}
	

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-CkwZplHgj3yDPctt_PKmaAR56SsGbd8&callback=initMap&libraries=places">
    </script>
</body>
</html>