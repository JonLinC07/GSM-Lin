<?php
  function Session_Validator() {
    if (!isset($_SESSION['admin'])) {
      return false;
    } else {
      return true;
    }
  }

  function url_for($script_path) {
    if ($script_path[0] != '/') {
      $script_path = "/".$script_path;
    }
    return WWW_ROOT . $script_path;
  }

  function u($string = "") {
    return urlencode($string);
  }

  function raw_u($string = "") {
    return rawurlencode($string);
  }

  function h($string = "") {
    return htmlspecialchars($string);
  }

  function error_404() {
    header($_SERVER['SERVER_PROTOCOL'] . " 404 Not found");
    exit();
  }

  function error_500() {
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Not found");
    exit();
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

  function is_post_request() {
    return $_SERVER["REQUEST_METHOD"] == 'POST';
  }

  function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  //VALIDATIONS

  function validate_review($review) {
    $error = "";
    if (strlen($review['Review_name']) < 3 || strlen($review['Content']) < 10) {
      $error .= "Invalid field with few input chars ";
    }

    if (empty($review['Upload_date'])) {
      $error .= "Whitout upload date";
    }

    $error .= unique_review($review['Review_name']);
    return $error;
  }

  function validate_device($device) {
    $error .= "";
    if (strlen($device['Device_name']) < 3 || strlen($device['Brand']) < 3 || strlen($device['Spesifies']) < 10) {
      $error .= "Inputs with few chars ";
    }

    $error .= unique_device($device);
    return $error;
  }
 ?>
