<?php // try accessing localhost/api/method/params
session_start();
include('api_utils.php');

// disable direct access to the page.
if ((sizeof($_POST) == 0 && sizeof($_GET) == 0) || !array_key_exists('HTTP_REFERER', $_SERVER)) {
  header("HTTP/1.0 404 Not Found");
}

/* ==== ==== LOGIN USER API CALL ==== ==== */
if ($_GET['method'] == "login") {
  $_SESSION['user'] = loginUser($_POST['user'], $_POST['pass']);
}

/* ==== ==== LOGOUT USER API CALL ==== ==== */
if ($_GET['method'] == "logout") {
  $_SESSION['user'] = Array(
    'logged' => false,
    'error' => 'User Logout'
  );
}

/* ==== ==== SIGN UP A NEW USER API CALL ==== ==== */
if ($_GET['method'] == "signup") {
  if (!usernameExists($_POST['user'])) {
    createNewUser($_POST['user'], $_POST['pass']);
    $_SESSION['registration'] = Array('success' => true);
    $_SESSION['user'] = loginUser($_POST['user'],$_POST['pass']);
  } else {
    $_SESSION['registration'] = Array(
      'success' => false,
      'error' => "Username already exists."
    );
  }
}

// return the visitor to the previous page they were on.
header("Location: " .  $_SERVER['HTTP_REFERER']);

?>
