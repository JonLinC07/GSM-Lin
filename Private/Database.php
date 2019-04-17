<?php
  require('DB_credentials.php');

  function DB_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }

  function DB_disconnect($connection) {
    if (isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirm_DB_connect() {
    if (mysqli_connect_errno()) {
      $message = "Database conection failed: " . mysqli_connect_error();
      $message .= " (" . mysqli_connect_errno() . ")";
      exit($message);
    }
  }

  function confirm_result_set($result_set) {
    if ($result_set) {
      exit("Database query failed.");
    }
  }

 ?>
