<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/Stylesheet.css">
    <title>View Review</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');

    $id = $_GET['id'] ?? '1';
    $review = all_info_review($id);

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

  <div class="preview-content">
    <img src="../../Public/Images/Phones/<?php echo h($review['Image']); ?>" alt="" id="phoneimg">

    <div class="preview-info">
      <h2><?php echo h($review['Review_name']) ?></h2>
      <h3>Brand: <?php echo h($review['Brand']) ?> </h3>
      <h3>Model: <?php echo h($review['Device_name']) ?> </h3>
      <h3>Spesifies: <?php echo h($review['Spesifies']) ?> </h3>
      <h3>Launch Date: <?php echo h($review['Launch_date']) ?> </h3>
      <h3>Upload Date: <?php echo h($review['Upload_date']) ?> </h3>
      <h3> <?php echo h($review['Content']) ?> </h3>
    </div>

  </div>
  </body>
</html>
