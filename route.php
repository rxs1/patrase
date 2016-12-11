<!DOCTYPE html>
<html lang="en">
<head>
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
<section class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background-color:#4B4B4B">
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
        <li><a href="dashboard.php" class="smoothScroll">PATRASE</a></li>
      </ul>
    </div>
  </div>
</section>

<!-- route section -->
<section id="route">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>From</h3>
        <input type="text" id="from" style="width: 100%" class="form-control" placeholder="Please input beginning location ..." >

        <h3>To Market ..</h3>
        <div class="col-md-4 col-sm-4">
          <h5><i class="icon-globe small-icon"></i> Region</h5>
            <select name="region" class="form-control" aria-hidden="true" tabindex="-1" id="region">
                <option value="" disabled="true" selected="true">Please select region ..</option>
                <?php
                  require_once('connect_database.php');
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

    <div class="row">
      <div class="col-md-12 col-sm-12" >
        <h3>Insert map heree....</h3>
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
<script type="text/javascript">
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
      //gimana caranya buat rutenya #.#
    });

  });
</script>

</body>
</html>

