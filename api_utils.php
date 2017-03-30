<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_schema = 'iot';

/* returns a database connection or FALSE. */
function connectToDatabase() {
  global $db_host, $db_user, $db_pass, $db_schema;
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_schema);
  if (mysqli_connect_errno()) {
    return false;
  } else {
    return $con;
  }
}

/* check if a given username exists */
function usernameExists($username) {
  $connection = connectToDatabase();
  $results = mysqli_query($connection,
    "select * from users "
    ."where username = '{$_POST['user']}';");
  if (mysqli_num_rows($results) > 0) {
    return true;
  }
  return false;
}

/* login a given user and return user info */
function loginUser($username, $password) {
  $connection = connectToDatabase();
  $results = mysqli_query($connection,
    "select * from users "
    ."where username = '$username' "
    ."and password = '$password';"
  );

  if (mysqli_num_rows($results) == 1) { // user exists
    $result = mysqli_fetch_row($results);
    return Array(
      'username' => $result[3],
      'userId' => $result[0],
      'logged' => true
    );
  } else {  // user does not exist
    return Array(
      'logged' => false,
      'error' => "Username/Password combination does not exist."
    );
  }
}

/* create a new user in the database then return a success message. */
function createNewUser($username, $password) {
  $con = connectToDatabase();
  mysqli_query($con,
    "insert into users (username, password) "
    ."values ('$username', '$password');"
  );
}
