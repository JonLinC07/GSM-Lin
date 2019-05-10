<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../Public/css/Stylesheet.css">
    <title>Update Phone</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');

    if (!isset($_GET['id'])) {
      redirect_to(url_for('Views/Phones.php'));
    }

    $id = $_GET['id'];
    $error = $_GET['error'] ?? '';

    if (is_post_request()) {
      $device = [];
      $device['ID_Device'] = $id;
      $device['Brand'] = $_POST['Brand'] ?? '';
      $device['Device_name'] = $_POST['Device_name'] ?? '';
      $device['Lauch_date'] = $_POST['Launch_date'] ?? '';
      $device['Spesifies'] = $_POST['Spesifies'] ?? '';

      $result = update_device($device);
      redirect_to(url_for('Views/ViewPhone.php?id=' . $id));
    } else {
      $device = find_device_by_id($id);
      $device_set = find_all_devices();
      $device_count = mysqli_num_rows($device_set);
    }
   ?>

  <body>
    <div class="headers">

    </div>

    <nav class="menu-bar">
      <a href="Index.php"> REVIEWS </a>
      <a href="Phones.php"> PHONES </a>
      <a href="Android.php"> ANDROID </a>
      <a href="Ios.php"> iOS </a>
      <a href="Login.php"> LOGIN </a>
      <a href="About.php"> GSM Lin </a>
    </nav>

    <!---         CONTENIDO         --->

    <div class="create-device">
      <h1>EDIT PHONE</h1>

      <form class="" action="<?php echo url_for('Views/Edit.php?id=' . h(u($id))); ?>" method="post">
        <div class="inputs-devices">
          <input type="text" name="Device_name" placeholder="Device Name" value="<?php echo h($device['Device_name']); ?>">
          <input type="text" name="Brand" placeholder="Brand" value="<?php echo h($device['Brand']); ?>">
          <input type="date" name="Launch_date" placeholder="Launch Date" value="<?php echo h($device['Lauch_date']); ?>">
        </div>

        <div class="text-area">
          <textarea name="Spesifies" rows="8" cols="80" placeholder="Write the Spesifies of device" value=""></textarea>
          <h4>Content Spesifies:</h4>
          <p><?php echo h($device['Spesifies']); ?></p>
          <input type="submit" name="Create Phone" value="Update Review">
        </div>
      </form>
    </div>
  </body>
</html>
