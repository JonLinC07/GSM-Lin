<!DOCTYPE html>
//Prueba 
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/Stylesheet.css">
    <title>Delete Phone</title>
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
    $id = $_GET['id'] ?? '1';
    $device = find_device_by_id($id);

    if (is_post_request()) {
      $result = delete_device($id);
      redirect_to(url_for('Views/Phones.php'));
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

    <div class="view-device">
      <h1>Delete <?php echo h($device['Device_name']) ?>?</h1>
      <h2>Brand: <?php echo h($device['Brand']) ?></h2>
      <h3>ID: <?php echo h($device['ID_Device']) ?></h3>
    </div>

    <form class="" action="<?php echo url_for('Views/DeletePhone.php?id=' . h(u($device['ID_Device']))); ?>" method="post">
      <input type="submit" name="Delete" value="Delete Phone">
    </form>
  </body>
</html>
