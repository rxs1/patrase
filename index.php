<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $title='ROUTE TO MARKET';
  include('head.php');
  ?>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<<<<<<< HEAD
<?php include('menubar.php')?>
=======
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
			<a href="#" class="navbar-brand">Atlas Team</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php" class="smoothScroll">HOME</a></li>
				<li><a href="#work" class="smoothScroll">WHAT WE DO</a></li>
				<li><a href="#about" class="smoothScroll">ABOUT US</a></li>
				<li><a href="#team" class="smoothScroll">TEAM</a></li>
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
>>>>>>> master

<!-- home section -->
<section id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>Pasar Traditional Search</h3>
				<h1>Patrase</h1>
				<hr>
				<a href="#work" class="smoothScroll btn btn-danger">What we do</a>
				<a href="find-market.php" class="smoothScroll btn btn-default">Try to Search</a>
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
					<strong>WHAT WE DO</strong>
					<!--<h1 class="heading bold">WHAT WE DO</h1>
					<hr>-->
				</div>
			</div>
			<div class="col-md-6">
				<a href="find-market.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-cloud medium-icon"></i>
							<h3>Find Traditional Market</h3>
							<hr>
							<p>You can search any traditional markets here by the name.</p>
					</div>
				</a>
			</div>

			<div class="col-md-6">
				<a href="nearest.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-cloud medium-icon"></i>
							<h3>Find Nearest Traditional Market</h3>
							<hr>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteu sunt in culpa qui officia.</p>
					</div>
				</a>
			</div>

			<div class="col-md-6">
				<a href="market-list.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-cloud medium-icon"></i>
							<h3>List of Traditional Market</h3>
							<hr>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteu sunt in culpa qui officia.</p>
					</div>
				</a>
			</div>

			<div class="col-md-6">
				<a href="route.php" style="color: #000">
					<div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
						<i class="icon-cloud medium-icon"></i>
							<h3>Route to A Market</h3>
							<hr>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteu sunt in culpa qui officia.</p>
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
					<strong>ABOUT US</strong>
					<!--<h1 class="heading bold">ABOUT US</h1>
					<hr>-->
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<img src="images/about-img.jpg" class="img-responsive" alt="about img">
			</div>
			<div class="col-md-6 col-sm-12">
				<h3 class="bold">ATLAS TEAM</h3>
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
					<strong>OUR TEAM</strong>
					<!--<h1 class="heading bold">OUR TEAM</h1>
					<hr>-->
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.9s">
				<div class="team-wrapper">
					<img src="images/team1.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Saufi Rahman</h4>
							<h3>Back End Developer</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
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
				<p>Copyright © Digital Team HTML5 Template | Design: <a href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
				<hr>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-tumblr wow fadeIn" data-wow-delay="0.9s"></a></li>
				</ul>
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