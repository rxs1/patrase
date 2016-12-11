<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pasar Traditional Search</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">

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

<!-- market list section -->
<section id="market-list">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
          <div class="col-md-6 col-sm-6">
            <h4><i class="icon-globe medium-icon"></i> Region</h4>

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
          <div class="col-md-6 col-sm-6">
            <h4><i class="icon-grid medium-icon"></i> Category</h4>
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
      </div>
      
            
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12" id="list" >
        <div class="col-md-4 col-sm-4" id="result">
          <h4><i class="icon-clipboard medium-icon"></i> List of Market</h4>
        </div>
        <div class="col-md-8 col-sm-8" id="detail">
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

    $('#region').change(function(){
      $('#result').html("");
      $('#detail').html("");
      $('#result').append( "<h4><i class='icon-clipboard medium-icon'></i> List of Market</h4>");

      var region = $(this).val();
      var category = $('#category').val();
      var action = 'list';
        $.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                data:{
                    'action': action,
                    'region': region,
                    'category': category}, 
                success: function(response){
                    
                    data = jQuery.parseJSON(response);
                    if (data.length == 0) {
                      $('#result').append( "<p>-- No market with choosen category and region --</p>");
                    } else {
                      for (var i = 0; i < data.length; i++) {
                        $('#result').append( "<label><input type='radio' name='pasar' value=" + data[i].id + "> "
                          + data[i].name + "</label><br>");
                      }
                    }
                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });
    });

    $('#category').change(function(){
      $('#result').html("");
      $('#detail').html("");
      $('#result').append( "<h4><i class='icon-clipboard medium-icon'></i> List of Market</h4>");

      var category = $(this).val();
      var region = $('#region').val();
      var action = 'list';
        $.ajax({
                type: "POST",
                url: "function.php",
                crossDomain: false,
                data:{
                    'action': action,
                    'region': region,
                    'category': category}, 
                success: function(response){
                    
                    data = jQuery.parseJSON(response);
                    if (data.length == 0) {
                      $('#result').append( "<p>-- No market with choosen category and region --</p>");
                    } else {
                      for (var i = 0; i < data.length; i++) {
                        $('#result').append( "<label><input type='radio' name='pasar' value=" + data[i].id + "> "
                          + data[i].name + "</label><br>");

                      }
                    }
                },  error: function (xhr, ajaxOptions, thrownError) {
                    window.alert("Kesalahan Internal");//error handle
                }
            });

    });

    $('#result').on('change', 'input[name="pasar"]:radio', function() {
        $('#detail').html("");
        var id = $(this).val();
        var action = 'detail';
          $.ajax({
                  type: "POST",
                  url: "function.php",
                  crossDomain: false,
                  data:{
                      'action': action,
                      'id': id}, 
                  success: function(response){
                      
                      data = jQuery.parseJSON(response);
                      $('#detail').append( "<h4 style='text-align:center'><i class='icon-basket medium-icon'></i> "+ data.name + "</h4><hr>");
                      $('#detail').append('<div id="slideshow">');

                      for (var i = 0; i < data.img.length; i++) {
                         $('#detail #slideshow').append('<div>'
                          + '<img src= cms/upload/img_pasar/'+data.img[i]+' >'
                          +'</div>');
                       }

                      $('#detail').append('</div>'
                        + '<div id = "keterangan">'
                        + "<p><strong><i class='icon-streetsign small-icon'></i> Address : </strong>"+ data.address+"</p>"
                        + "<p><strong><i class='icon-clock small-icon'></i> Operational Time : </strong>"+ data.time_open + " - " +data.time_close +"</p>"
                        + "<p><strong><i class='icon-quote small-icon'></i> Description : </strong>" + data.keterangan +"</p>"
                        //button ini ke halaman route, session id pasar yang dipilih
                        + "<div style='text-align:right;'><a href='route.php' style='color:#000;'><button class='btn default '><i class='icon-map small-icon'></i>  Route to Market </button></a></div>"
                        +'</div>');
                     
                     //set session id_pasar
                      sessionStorage.SessionName = "id_pasar";
                      sessionStorage.setItem("id_pasar",id);

                      $("#detail #slideshow > div:gt(0)").hide();

                      setInterval(function() { 
                        $('#slideshow > div:first')
                          .fadeOut(2000)
                          .next()
                          .fadeIn(2000)
                          .end()
                          .appendTo('#slideshow');
                      },  4000);

                  },  error: function (xhr, ajaxOptions, thrownError) {
                      window.alert("Kesalahan Internal");//error handle
                  }
              });
    });
});

</script>

</body>
</html>

