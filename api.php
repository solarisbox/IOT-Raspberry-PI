// try accessing localhost/api/method/params

<?php
  if (array_key_exists('PATH_INFO', $_SERVER)) {
      print_r(explode('/', $_SERVER['PATH_INFO']));
  }
?>
