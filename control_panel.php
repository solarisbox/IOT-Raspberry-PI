<?php session_start(); 

    if ($_SESSION['user']['logged'] == false){
            header("Location: login.php");
    }

    if (!array_key_exists('user', $_SESSION)) {
    $_SESSION['user'] = Array('logged' => false);
    }

    //date_default_timezone_set('America/New_York');
    //$today = date("F j, Y, g:i a"); 
    $city_id = trim($_SESSION['user']['city']);
    $url = "http://api.openweathermap.org/data/2.5/weather?id=$city_id&units=metric&APPID=763cd58f81cdee29b143fe4d90bc394e";
    $contents = file_get_contents($url); 
    $clima=json_decode($contents); 
    $temp_max=$clima->main->temp_max; 
    $temp_min=$clima->main->temp_min; 
    $humidity = $clima->main->humidity;
    $icon=$clima->weather[0]->icon.".png";
    $cityname = $clima->name; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>
  .carousel-inner img {
  width:100%;
    height:100%;
  }
  #myCarousel {
    font-size:90%;
  }
  .carousel-controls-mini {
  }
  .carousel-controls-mini > a {
    border:1px solid #eee;
      width:20px;
      display:block;
      float:left;
      text-align:center;
  }
  
  li {
    list-style-type: none;
  }

  .navbar-default {
    background-color: #020202;
    border-color: #e7e7e7;
  }
</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="control_panel.php">SecureTek</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="control_panel.php">Home</a></li>
      <li><a href="settings.php">Settings</a></li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <form action="api.php?method=logout" method="post">
        <input type="submit" value="Logout" class="btn btn-primary align-right">
        </input>
      </form>
    </ul>
  </div>
</nav>

  <div class="container">
  <h2 class=""> <?php echo $_SESSION['user']['username'];?></h2>
  
      <hr>
      <!-- Slider -->
      <div class="row">
          <div class="col-md-12" id="slider">
              <!-- Top part of the slider -->
              <div class="row">
                  <div class="col-md-6" id="carousel-bounding-box">
                      <div id="myCarousel" class="carousel slide">
                          <!-- Carousel items -->
                          <div class="carousel-inner">
                              <div class="active item" data-slide-number="0">
                                  <img class="img-rounded img-responsive" src="http://lorempixel.com/640/480">
                              </div>
                              <div class="item" data-slide-number="1">
                                  <img class="img-rounded img-responsive" src="http://lorempixel.com/640/480/technics/1">
                              </div>
                              <div class="item" data-slide-number="2">
                                  <img class="img-rounded img-responsive" src="http://lorempixel.com/640/480/business/1">
                              </div>
                              <div class="item" data-slide-number="3">
                                  <img class="img-rounded img-responsive" src="http://lorempixel.com/640/480/city">
                              </div>
                              <div class="item" data-slide-number="4">
                                  <img class="img-rounded img-responsive" src="http://lorempixel.com/640/480/city/1">
                              </div>
                              <div class="item" data-slide-number="5">
                                  <img class="img-rounded img-responsive" src="http://lorempixel.com/640/480">
                              </div>
                          </div>
                      </div>
                      <!-- Carousel nav -->
                      <div class="carousel-controls-mini"> 
                        <a href="#myCarousel" data-slide="prev">‹</a>
                        <a href="#myCarousel" data-slide="next">›</a>
                      </div>
                  </div>
                  <div class="col-md-6" id="carousel-text2">
                    <div class="row">
                      <h4>Your City: <?php echo $cityname . "<br>"; ?></h4>
                      <h4><?php echo "Temp Max: " . $temp_max ."&deg;C<br>"; ?></h4>
                      <h4><?php echo "Temp Min: " . $temp_min ."&deg;C<br>"; ?></h4>
                      <h4><?php echo "Humidity: " . $humidity . "<br>";?></h4>
                      <?php echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >"; ?>
                    </div>
                   
                   <div class="row">
                     <div class="col-md-6">
                    <div class="radio">
                      <label class="radio-inline"><input type="radio" name="optradio">Photo</label>
                      <label class="radio-inline"><input type="radio" name="optradio">Video</label>
                    </div>
                   </div>

                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="sel1">Set Interval:</label>
                        <select class="form-control" id="interval">
                          <option>5 Minutes</option>
                          <option>10 Minutes</option>
                          <option>30 Minutes</option>
                          <option>60 Minutes</option>
                        </select>
                      </div>
                    </div>
                   </div>
                   
                   <div class="row">   
                   </div>

                    <div class="row">
                      <div class="col-md-3">
                        <button  class="btn btn-primary">Snapshot</button>
                      </div>
                      <div class="col-md-3">
                        <button  class="btn btn-primary">Set Interval</button>
                      </div>
                    </div>
                  </div>
                  <div style="display:none;" id="slide-content">
                      <div id="slide-content-0">
                          <h5>Slide One</h5>
                          <p>This is mini slider / carousel with Bootstrap. AARE YOU A RACIS?Blah blah, blah, blah blah.
                              Lorem dolor?</p> <small>October 13 2013 - </small>
                      </div>
                      <div id="slide-content-1">
                          <h5>Slide Two</h5>
                          <p>Mini carousel with Bootstrap</p> <small>October 15 2013 </small>
                      </div>
                      <div id="slide-content-2">
                          <h5>Slider Three</h5>
                          <p>Facebook-style paged image slider</p> <small>October 19 2013  </small>
                      </div>
                      <div id="slide-content-3">
                          <h5>Slider Four</h5>
                          <p>Lorem Ipsum Dolor</p> <small>October 22 2013  </small>
                      </div>
                      <div id="slide-content-4">
                          <h5>Slider Five</h5>
                          <p>Lorem Ipsum Dolor</p> <small>October 25 2013  </small>
                      </div>
                      <div id="slide-content-5">
                          <h5>Slider Six</h5>
                          <p>Lorem Ipsum Dolor</p>
                          <p class="sub-text">October 24 2012 
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--/Slider-->

      <hr>
      <div class="row hidden-sm" id="slider-thumbs">
          <div class="col-md-12">
              <!-- Bottom switcher of slider -->
              <ul class="thumbnails">
                  <li class="col-md-2"> <a class="thumbnail" id="carousel-selector-0">
              <img src="http://placehold.it/170x100&amp;text=one" class="img-responsive">
            </a>
                  </li>
                  <li class="col-md-2"> <a class="thumbnail" id="carousel-selector-1">
              <img src="http://placehold.it/170x100&amp;text=two" class="img-responsive">
            </a>
                  </li>
                  <li class="col-md-2"> <a class="thumbnail" id="carousel-selector-2">
              <img src="http://placehold.it/170x100&amp;text=three" class="img-responsive">
            </a>
                  </li>
                  <li class="col-md-2"> <a class="thumbnail" id="carousel-selector-3">
              <img src="http://placehold.it/170x100&amp;text=four" class="img-responsive">
            </a>
                  </li>
                  <li class="col-md-2"> <a class="thumbnail" id="carousel-selector-4">
              <img src="http://placehold.it/170x100&amp;text=five" class="img-responsive">
            </a>
                  </li>
                  <li class="col-md-2"> <a class="thumbnail" id="carousel-selector-5">
              <img src="http://placehold.it/170x100&amp;text=six" class="img-responsive">
            </a>
                  </li>
              </ul>
          </div>
      </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
    $('#myCarousel').carousel({
                interval: 5000
        });

    $('#carousel-text').html($('#slide-content-0').html());

    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
            var id_selector = $(this).attr("id");
            var id = id_selector.substr(id_selector.length-1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
    });

    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid', function (e) {
          var id = $('.item.active').data('slide-number');
          $('#carousel-text').html($('#slide-content-'+id).html());
    });

    $(".nav a").on("click", function(){
      $(".nav").find(".active").removeClass("active");
      $(this).parent().addClass("active");
    });
  </script>
</body>
</html>