<?php // try accessing localhost/api/method/params
session_start();
// Check connection

/* ==== ==== GET METHODS ARE HERE ==== ==== */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && sizeof($_GET) != 0) {


/* ==== ==== POST METHODS ARE HERE ==== ==== */
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_GET['method'] == "login") {
    $connection = connectToDatabase('localhost', 'root', '', 'iot');
    $results = mysqli_query($connection, "select * from users where username = '" . $_POST['user'] . "' and password = '" . $_POST['pass'] . "';");
    if (mysqli_num_rows($results) == 1) {
      $result = mysqli_fetch_row($results);
      $_SESSION['loggedUser'] = Array(
        'username' => $result[3],
        'userId' => $result[0],
        'logged' => true
      );
    } else {
      $_SESSION['loggedUser'] = Array('logged' => false);
    }
    header("Location: index.php");
  }
  if ($_GET['method'] == "logout") {
    $_SESSION['loggedUser'] = Array('logged' => false);
    header("Location: index.php");
  }
  if ($_GET['method'] == "signup") {
    $connection = connectToDatabase('localhost', 'root', '', 'iot');
    $results = mysqli_query($connection, "select * from users where username = '" . $_POST['user'] . "' and password = '" . $_POST['pass'] . "';");
    if (mysqli_num_rows($results) > 0) {
      $_SESSION['registration'] = Array(
        
      );
    }
  }
}

function connectToDatabase($host, $user, $pass, $schema) {
  $con = mysqli_connect($host, $user, $pass, $schema);
  if (mysqli_connect_errno()) {
    return false;
  } else {
    return $con;
  }
}
?>
