<?php session_start(); 
      
      if ($_SESSION['user']['logged'] == false){
        header("Location: login.php");
      }

      if (!array_key_exists('user', $_SESSION)) {
        $_SESSION['user'] = Array('logged' => false);
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Settings</title>
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
  .form-group {
    padding-top: 5%;
  }
  .label-default {
    background-color: #fff;
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
      <li class=""><a href="control_panel.php">Home</a></li>
      <li class="active"><a href="settings.php">Settings</a></li>
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
     <h1>Edit Profile - <?php echo $_SESSION['user']['username'];?></h1>

    <hr>
    <div class="row">
      
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle img-responsive"
                alt="avatar">
                 <h6>Upload a different photo...</h6>

                <input type="file" class="form-control">
            </div>
        </div>
        <!-- edit form column -->
        
        <div class="col-md-9 personal-info">
            <!--
            <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>  <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to thevuser.</div>-->
          
            <h3>Personal info</h3>
          <form action="api.php?method=settings" method="post">
            <div class="form-group">
                <label label-default="" class="col-lg-3 control-label label-default">First name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="" name="fname" id="fname">
                </div>
            </div>
            <div class="form-group">
                <label label-default="" class="col-lg-3 control-label label-default">Last name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="" name="lname" id="lname">
                </div>
            </div>
            <div class="form-group">
                <label label-default="" class="col-lg-3 control-label label-default">Email:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="" name="email" id="email">
                </div>
            </div>
            <div class="form-group">
                <label label-default="" class="col-lg-3 control-label label-default">City:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <select id="city" name="city" class="form-control">
                            <option value="5969785  " selected="selected">Hamilton</option>
                            <option value="6167865">Toronto</option>
                            <option value="5368361  ">Los Angeles</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label label-default="" class="col-md-3 control-label label-default">Password:</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" value="" name="pass" id="pass">
                </div>
            </div>
            <div class="form-group">
                <label label-default="" class="col-md-3 control-label label-default">Confirm password:</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" value="" name="pass" id="pass">
                </div>
            </div>
            <div class="form-group">
                <label label-default="" class="col-md-3 control-label label-default"></label>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="Save Changes"> <span></span>
                    <input type="reset" class="btn btn-default" value="Cancel">
                </div>
            </div>
          </form>
        </div>      
    </div>
</div>
<hr>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(".nav a").on("click", function(){
      $(".nav").find(".active").removeClass("active");
      $(this).parent().addClass("active");
    });
  </script>
</body>
</html>