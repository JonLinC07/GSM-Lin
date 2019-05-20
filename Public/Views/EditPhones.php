<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../Public/css/Stylesheet.css">
    <title>Update Phone</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');
    session_start();

    if (!Session_Validator()) {
      redirect_to(url_for('/Views/Login.php'));
    }

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
      $device['Launch_date'] = $_POST['Launch_date'] ?? '';
      $device['Spesifies'] = $_POST['Spesifies'] ?? '';

      $error = validate_device($device);
      if (strlen($error) > 0) {
        redirect_to(url_for('Views/EditDevice.php?error=' . $error . '&id=' . $id));
      }

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
      <a href="CloseSession.php"> LOGOUT </a>
      <a href="About.php"> GSM Lin </a>
    </nav>

    <!---         CONTENIDO         --->

    <div class="create-device">
      <h1>EDIT PHONE</h1>

      <form class="" action="<?php echo url_for('Views/EditPhones.php?id=' . h(u($id))); ?>" method="post">
        <div class="inputs-devices">
          <input type="text" name="Device_name" placeholder="Device Name" value="<?php echo h($device['Device_name']); ?>" required>
          <input type="text" name="Brand" placeholder="Brand" value="<?php echo h($device['Brand']); ?>" required>
          <input type="date" name="Launch_date" placeholder="Launch Date" value="<?php echo h($device['Launch_date']); ?>" required>
        </div>

        <div class="text-area">
          <?php
            if (strlen($error) > 0) {
              echo '<div class="errors"><p>' . $error . '</p></div>';
            }
           ?>
          <textarea name="Spesifies" rows="8" cols="80" placeholder="Write the Spesifies of device" value="" required><?php echo h($device['Spesifies']); ?></textarea>
          <input type="submit" name="Create Phone" value="Update Phone">
        </div>
      </form>
    </div>
  </body>
</html>
