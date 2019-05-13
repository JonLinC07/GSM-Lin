<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/Stylesheet.css">
    <title>View Phone</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');
    session_start();

    if (!Session_Validator()) {
      redirect_to(url_for('/Views/Login.php'));
    }
    
    $id = $_GET['id'] ?? '1';
    $device = find_device_by_id($id);
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

    <div class="view-device">
      <h1><?php echo h($device['Device_name']) ?></h1>
      <h2>Brand: <?php echo h($device['Brand']) ?></h2>
      <h3>ID: <?php echo h($device['ID_Device']) ?></h3>
      <h3>Launnch date: <?php echo h($device['Lauch_date']) ?></h3>
      <h4>Spesifies:</h4>
      <p><?php echo h($device['Spesifies']) ?></p>
    </div>

  </body>
</html>
