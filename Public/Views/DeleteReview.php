<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/Stylesheet.css">
    <title>Delete Review</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');
    session_start();

    if (!Session_Validator()) {
      redirect_to(url_for('/Views/Login.php'));
    }

    if (!isset($_GET['id'])) {
      redirect_to(url_for('Views/Index.php'));
    }
    $id = $_GET['id'] ?? '1';
    $review = all_info_review($id);

    if (is_post_request()) {
      $result = delete_review($id);
      redirect_to(url_for('Views/Index.php'));
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
      <h1>Delete <?php echo h($review['Review_name']) ?>?</h1>
      <h2> Folio:<?php echo h($review['Folio']) ?></h2>
      <h2> Device name:<?php echo h($review['Device_name']) ?></h2>
      <h3>Brand: <?php echo h($review['Brand']) ?></h3>
      <h3>Device Spesifies: <?php echo h($review['Spesifies']) ?></h3>
      <h3>review Content: <?php echo h($review['Content']) ?></h3>
    </div>

    <form class="" action="<?php echo url_for('Views/DeleteReview.php?id=' . h(u($review['Folio']))); ?>" method="post">
      <input type="submit" name="Delete" value="Delete Phone">
    </form>
  </body>
</html>
