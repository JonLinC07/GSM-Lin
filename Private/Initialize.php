<?php
  ob_start();

  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/Public');
  define("SHARED_PATH", PRIVATE_PATH . '/Shared');

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/Public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('Functions.php');
  require_once('Database.php');
  require_once('Query_Functions');

  $db = DB_connect();
 ?>
