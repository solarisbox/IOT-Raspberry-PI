// try accessing localhost/api/method/params

<?php
  if (array_key_exists('PATH_INFO', $_SERVER)) {
      $params = $_SERVER['PATH_INFO'];

      switch($params) {
        case 'picture':

        case 'interval':

        default:
          header('header("HTTP/1.0 404 Not Found");')
      }
  }
?>
