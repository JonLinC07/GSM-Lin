<?php
 require_once('../../Private/Initialize.php');
 session_start();
 session_destroy();

 $_SESSION = array();
 redirect_to(url_for('/Views/Index.php'));
 ?>
