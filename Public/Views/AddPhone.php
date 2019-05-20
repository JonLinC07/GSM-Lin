<?php
  require_once('../../Private/Initialize.php');
  session_start();

  if (!Session_Validator()) {
    redirect_to(url_for('/Views/Login.php'));
  }

  if (is_post_request()) {
    $device = [];
    $device['Brand'] = $_POST['Brand'];
    $device['Device_name'] = $_POST['Device_name'];
    $device['Launch_date'] = $_POST['Launch_date'];
    $device['Spesifies'] = $_POST['Spesifies'];

    $error = validate_device($device);
    if (strlen($error)) {
      redirect_to(url_for('Views/CreatePhone.php?error=' . $error));
    }

    $result = insert_device($device);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('Views/ViewPhone.php?id=' . $new_id));
  } else {
    redirect_to(url_for('CreatePhone.php'));
  }
 ?>
