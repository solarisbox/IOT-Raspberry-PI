<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
              
  <!-- Slider -->
  <div class="row-fluid">
    <div class="span12" id="slider">
      <!-- Top part of the slider -->
      <div class="row-fluid">
        <div class="span8" id="carousel-bounding-box">
          <div id="myCarousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="active item" data-slide-number="0"><img src="http://placehold.it/770x300&amp;text=video one"></div>
              <div class="item" data-slide-number="1"><img src="http://placehold.it/770x300&amp;text=video two"></div>
              <div class="item" data-slide-number="2"><img src="http://placehold.it/770x300&amp;text=video three"></div>
              <div class="item" data-slide-number="3"><img src="http://placehold.it/770x300&amp;text=video four"></div>
              <div class="item" data-slide-number="4"><img src="http://placehold.it/770x300&amp;text=video five"></div>
              <div class="item" data-slide-number="5"><img src="http://placehold.it/770x300&amp;text=video six"></div>
              <div class="item" data-slide-number="5"><img src="http://placehold.it/770x300&amp;text=video seven"></div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
          </div>
        </div>
        <div class="span4" id="carousel-text"></div>
        
        <div style="display: none;" id="slide-content">
          <div id="slide-content-0">
            <h2>Slider One</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-1">
            <h2>Slider Two</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-2">
            <h2>Slider Three</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-3">
            <h2>Slider Four</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-4">
            <h2>Slider Five</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-5">
            <h2>Slider Six</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
        </div>
      </div>
      
    </div>
  </div> <!--/Slider-->
  
  <div class="row-fluid hidden-phone" id="slider-thumbs">
    <div class="span12">
      <!-- Bottom switcher of slider -->
      <ul class="thumbnails">
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-0">
            <img src="http://placehold.it/170x100&amp;text=one">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-1">
            <img src="http://placehold.it/170x100&amp;text=two">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-2">
            <img src="http://placehold.it/170x100&amp;text=three">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-3">
            <img src="http://placehold.it/170x100&amp;text=four">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-4">
            <img src="http://placehold.it/170x100&amp;text=five">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-5">
            <img src="http://placehold.it/170x100&amp;text=six">
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
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel').carousel(id);
        });


        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
  </script>
</body>
</html>