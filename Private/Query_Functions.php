<?php
  function find_all_reviews() {
    global $db;
    $query = "SELECT * FROM Reviews";
    $result=mysqli_query($db,$query);
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
    global $db;
    $query = "INSERT INTO Reviews (ID_Device,  Upload_date, Last_upload_date,";
    $query .= " Review_name, Content, Image) VALUES ";
    $query .= "(" . $review['ID_Device'] . ", '" . $review['Upload_date'] . "', ";
    $query .= "'" . $review['Last_upload_date'] . "', '" . $review['Review_name'] . "', ";
    $query .= "'" . $review['Content'] . "', '" . $review['Image'] . "')";

    $result = mysqli_query($db, $query);
    if ($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function insert_device($device) {
    global $db;

    $query = "INSERT INTO Devices (Brand, Device_name, Lauch_date, Spesifies)";
    $query .= " VALUES ('" . $device['Brand'] . "', '" . $device['Device_name'];
    $query .= "', '" . $device['Lauch_date'] . "', '" . $device['Spesifies'] . "')";

    $result = mysqli_query($db, $query);
    if ($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function find_all_devices() {
    global $db;
    $query = "SELECT * FROM Devices ORDER BY ID_Device ASC";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    return $result;
  }

  function find_device_by_id($id) {
    global $db;
    $query = "SELECT * FROM Devices WHERE ID_Device='" . $id . "'";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    $device = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $device;
  }

  function delete_device($id) {
    global $db;
    $query = "DELETE FROM Devices WHERE ID_Device='" . $id . "' LIMIT 1";
    $result = mysqli_query($db, $query);

    if ($result) {
      return true;
    } else {
      echo nysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_device($device) {
    global $db;
    $query = "UPDATE Devices SET Brand='" . $device['Brand'] . "', Device_name='";
    $query .= $device['Device_name'] . "', Lauch_date='" . $device['Lauch_date'] . "', ";
    $query .= "Spesifies='" . $device['Spesifies'] . "' WHERE ID_Device='";
    $query .= $device['ID_Device'] . "' LIMIT 1";

    $resul = mysqli_query($db, $query);
    if ($resul) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function all_info_review($id) {
    global $db;
    $query = "SELECT * FROM Reviews INNER JOIN Devices ON Reviews.ID_Device";
    $query .= "=Devices.ID_device WHERE Devices.ID_Device='" . $id . "'";
    $result = mysqli_query($db, $query);
    confirm_result_set($result);
    $info_review = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $info_review;
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
