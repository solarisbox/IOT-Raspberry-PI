<?php session_start(); if (!array_key_exists('user_logged_in', $_SESSION)) {
    $_SESSION['loggedUser'] = Array('logged' => false);
}?>
<html>
  <head>
    <title>Login Test Page</title>
  </head>
  <body>
    <?php if ($_SESSION['loggedUser'] == false) {?>

      <h3>Log In</h3>
      <form action="api.php?method=login" method="post">
        User: <input type="text" name="user" /><br />
        Pass: <input type="password" name="pass" /><br />
        <input type="submit" value="Login" />
      </form>
      <h3>Sign Up</h3>
      <form action="api.php?method=signup" method="post">
        User: <input type="text" name="user" /><br />
        Pass: <input type="password" name="pass" /><br />
        <input type="submit" value="Sign Up" />
      </form>

    <?php } else {?>

      <h1>Logged in as <?php echo $_SESSION['loggedUser']['username']; ?></h1>
      <?php print_r($_SESSION['loggedUser']); ?>
      <form action="api.php?method=logout" method="post">
        <input type="submit" value="Logout" />
      </form>

    <?php } ?>
    
  </body>
</html>
