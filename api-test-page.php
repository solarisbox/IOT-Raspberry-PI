<?php session_start(); if (!array_key_exists('user', $_SESSION)) {
    $_SESSION['user'] = Array('logged' => false);
}?>
<html>
  <head>
    <title>Login Test Page</title>
  </head>
  <body>
    <?php if ($_SESSION['user']['logged'] == false) {?>

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
      <?php
        print_r($_SESSION['registration']);
      ?>
    <?php } else {?>

      <h1>Logged in as <?php echo $_SESSION['user']['username']; ?></h1>
      <?php print_r($_SESSION['user']); ?>
      <form action="api.php?method=logout" method="post">
        <input type="submit" value="Logout" />
      </form>

    <?php } ?>

  </body>
</html>
