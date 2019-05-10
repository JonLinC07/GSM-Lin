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
      redirect_to(url_for('Views/Index.php'));
    }

    $id = $_GET['id'];
    $error = $_GET['error'] ?? '';

    if (is_post_request()) {
      $reviews = [];
      $reviews['Folio'] = $id;
      $reviews['Upload_date'] = $_POST['Upload_date'] ?? '';
      $reviews['Review_name'] = $_POST['Review_name'] ?? '';
      $reviews['Content'] = $_POST['Content'] ?? '';
      $reviews['Image'] = $_POST['Image'] ?? '';
      //$reviews['ID_Device'] = $_POST['ID_device']


      $result = update_review($reviews);
      redirect_to(url_for('Views/ViewReview.php?id=' . $id));
    } else {
      $device_set = find_all_devices();
      $review = find_review_by_id($id);
      $review_set = find_all_reviews();
      $review_count = mysqli_num_rows($review_set);
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

    <div class="content-create">
      <h2>CREATING REVIEW</h2>

      <form class="form-review" action="<?php echo url_for('Views/EditReviews.php?id=' . h(u($id))); ?>" method="post">
        <div class="infos">
          <input type="text" name="Review_name" value="<?php echo h($review['Review_name']); ?>" placeholder="Review Title">
          <div class="review-device">
            <h4>Phone Name:</h4>
            <select class="" name="ID_Device">
              <?php
                while($device = mysqli_fetch_assoc($device_set)) {
                  echo "<option value=\"{$device['ID_Device']}\"";
                  if ($review['ID_Device']==$device['ID_Device']) {
                    echo " selected";
                  }
                  echo ">{$device['Device_name']}</option>";
                }
               ?>
            </select>
          </div>

          <div class="review-date">
            <h4>Date:</h4>

            <input type="date" name="Upload_date" value="<?php echo h($review['Upload_date']) ?>" placeholder="">
          </div>
        </div>

        <div class="photo-phone">
          <h4>Phone Photo</h4>
          <input type="file" name="Image" value="">
        </div>

        <div class="text-review">
          <textarea name="Content" rows="20" cols="80" placeholder="Write the review content"><?php echo h($review['Content']); ?></textarea>
          <input type="submit" value="Create Review" />
        </div>
      </form>
    </div>
  </body>
</html>
