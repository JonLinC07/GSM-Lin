<?php
  require_once('../../Private/Initialize.php');

  if (is_post_request()) {
    $device = [];
    $device['Brand'] = $_POST['Brand'];
    $device['Device_name'] = $_POST['Device_name'];
    $device['Lauch_date'] = $_POST['Launch_date'];
    $device['Spesifies'] = $_POST['Spesifies'];

    $result = insert_device($device);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('Views/ViewPhone.php?id=' . $new_id));
  } else {
    redirect_to(url_for('CreatePhone.php'));
  }
 ?>
