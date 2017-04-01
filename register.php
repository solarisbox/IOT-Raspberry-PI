<?php session_start(); if (!array_key_exists('user', $_SESSION)) {
    $_SESSION['user'] = Array('logged' => false);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php if ($_SESSION['user']['logged'] == false) {?>

	<!--login modal-->
	<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	          <h1 class="text-center">Register</h1>
	      </div>
	      <div class="modal-body">
	          <form action="api.php?method=signup" method="post" class="form col-md-12 center-block">
	            <div class="form-group">
	            	<input type="text" class="form-control input-lg" name="user" id="user" placeholder="Username">
	            </div>
	            <div class="form-group">
	              <input type="password" class="form-control input-lg" name="pass" id="pass" placeholder="Password">
	            </div>
	            <div class="form-group">
	              <button type="submit" value="Sign Up" class="btn btn-primary btn-lg btn-block">Register</button>
	            </div>
	          </form>
	      </div>
	      <div class="modal-footer">
	          <div class="col-md-12">
	          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	          </div>
	        </div>
	  </div>
	  </div>
	</div>

	<?php
        print_r($_SESSION['registration']);
      ?>
    <?php } else {?>
       <?php header("Location: settings.php"); ?>
    <?php } ?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>