<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../Public/css/Stylesheet.css">
    <title>Create Phone</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');
    session_start();

    if (!Session_Validator()) {
      redirect_to(url_for('/Views/Login.php'));
    }

    $device_set = find_all_devices();
    $device_count = mysqli_num_rows($device_set);
    mysqli_free_result($device_set);
    $device = [];
    $device['Device_name'] = $device_count;
    $error = $_GET['error'] ?? '';
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
      <h1>UPLOAD PHONE</h1>

      <form class="" action="<?php echo url_for('Views/AddPhone.php'); ?>" method="post">
        <div class="inputs-devices">
          <input type="text" name="Device_name" placeholder="Device Name" required>
          <input type="text" name="Brand" placeholder="Brand" required>
          <input type="date" name="Launch_date" placeholder="Launch Date" required>
        </div>

        <div class="text-area">
          <?php
            if (strlen($error)) {
              echo '<div class="errors"><p>' . $error . '</p></div>';
            }
           ?>
          <textarea name="Spesifies" rows="8" cols="80" placeholder="Write the Spesifies of device" required></textarea>
          <input type="submit" name="Create Phone" value="Create Phone">
        </div>
      </form>
    </div>
  </body>
</html>
