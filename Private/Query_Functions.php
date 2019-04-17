<?php
  function find_all_reviews() {
    global $db;
    $query = "SELECT * FROM reviews ORDER BY Folio ASC";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    return $result;
  }

  function find_review_by_id($id) {
    global $db;
    $query = "SELECT * FROM Reviews WHERE Folio='" . $id . "'";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    $review = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $review;
  }

  function insert_review($review) {

  }

  function find_all_devices() {
    global $db;
    $query = "SLECT * FROM Devices ORDER BY ID_Device ASC";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    return $result;
  }

  function find_device_by_id($id) {
    global $db;
    $query = "SELECT * FROM Devices WHERE ID_Devive='" . $id . "'";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    $device = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $device;
  }

  function get_user($user, $pass) {
    global $db;
    $query = "SELECT * FROM Users WHERE User_name='" . $user . "' AND ";
    $query .= "Password='" . $pass . "';";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    return $result;
  }




 ?>
