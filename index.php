<!DOCTYPE html>
<html lang="en">
<head>
<?php
	$title = "Patrase Home";
include('head.php');
?>
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
			<a href="#" class="navbar-brand">Digital Team</a>
		</div>
		<div class="collapse navbar-collapse">
				<?php include('menubar.php');?>
			<!-- <ul class="nav navbar-nav navbar-right">
				<li><a href="index.php" class="smoothScroll">HOME</a></li>
				<li><a href="discover.php" class="smoothScroll">PATRASE</a></li>

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
				<a href="#work" class="smoothScroll btn btn-danger">What we do</a>
				<a href="discover.php" class="smoothScroll btn btn-default">Try this apps</a>
			</div>
		</div>
	</div>		
</section>

<!-- work section -->
<section id="work">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<strong>PATRASE</strong>
					<h1 class="heading bold">WHAT WE DO</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-6">
				<a href="discover.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-map-pin medium-icon"></i>
							<h3>Discover Market Location</h3>
							<hr>
							<p>You can discover any traditional markets.</p>
					</div>
				</a>
			</div>

			<div class="col-md-6">
				<a href="market-list.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-basket medium-icon"></i>
							<h3>View List of Traditional Market</h3>
							<hr>
							<p>View list of market including its information. </p>
					</div>
				</a>
			</div>

			<div class="col-md-6">
				<a href="nearest.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-globe medium-icon"></i>
							<h3>Find Nearest Traditional Market</h3>
							<hr>
							<p>Find nearest market from desired location.</p>
					</div>
				</a>
			</div>

			<div class="col-md-6">
				<a href="route.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-map medium-icon"></i>
							<h3>Route to A Market</h3>
							<hr>
							<p>Route to a market from your position.</p>
					</div>
				</a>
			</div>

			
			
		
		</div>
	</div>
</section>

<!-- about section -->
<section id="about">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<div class="section-title">
					<strong>02</strong>
					<h1 class="heading bold">ABOUT US</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<img src="images/about-img.jpg" class="img-responsive" alt="about img">
			</div>
			<div class="col-md-6 col-sm-12">
				<h3 class="bold">PATRASE TEAM</h3>
				<h1 class="heading bold">Pasar Traditional Search</h1>
				
				<!-- tab panes -->
				<div class="tab-content">
						<p>Patrase is a geographic information system of traditional markets in DKI Jakarta. We provide complete information about the market you want to know or visit. This is a beta version so there are only about 28 markets we've collected. In the future, we hope that this website can grow much bigger and be the best solution for people to know about traditional markets in DKI Jakarta.</p>
						<p>We actually build this website as our final project in geographic information system's course. Hope you like it.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- team section -->
<section id="team">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<strong>03</strong>
					<h1 class="heading bold">OUR TEAM</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.9s">
				<div class="team-wrapper">
					<img src="images/team1.jpg" class="img-responsive" alt="team img" style="size: ">
						<div class="team-des">
							<h4>Saufi Rahman</h4>
							<h3>Back End Developer</h3>
							<hr>
						
						</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="1.3s">
				<div class="team-wrapper">
					<img src="images/team2.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Clara Indriyani</h4>
							<h3>Back End Developer</h3>
							<hr>
							
						</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="1.6s">
				<div class="team-wrapper">
					<img src="images/team3.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Intan Amalia Sari</h4>
							<h3>Front End Developer</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
						</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="1.6s">
				<div class="team-wrapper">
					<img src="images/team4.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Dewi Suci Rafianti</h4>
							<h3>Front End Developer</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright © Patrase Team Geographic Information Sistem 2016 </p>
				<hr>
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

</body>
</html>