<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../Public/css/Stylesheet.css">
    <title>Create Review</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');
    $device_set = find_all_devices();
    $device_count = mysqli_num_rows($device_set);
    mysqli_free_result($device_set);
    $device = [];
    $device['Device_name'] = $device_count;

    $review_set = find_all_reviews();
    $review_count = mysqli_num_rows($review_set);
    mysqli_free_result($review_set);
    $review = [];
    $review['ID_Device'] = $review_count;
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

      <form class="form-review" action="<?php echo url_for('Views/AddReview.php'); ?>" method="post">
        <div class="infos">
          <input type="text" name="Review_name" value="" placeholder="Title">
          <input type="text" name="phone-name" value="" placeholder="Phone Name">
          <input type="date" name="Upload_date" value="" placeholder="Phone Name">
          <select class="device" name="ID_Device">
            <?php
              for ($i=1; $i <= $review_count; $i++) {
                echo "<option value=\"{$i}\"";
                if ($review['ID_Device']) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
             ?>
          </select>
        </div>

        <div class="photo-phone">
          <h4>Phone Photo</h4>
          <input type="file" name="Image" value="">
        </div>

        <div class="text-review">
          <textarea name="Content" rows="20" cols="80" placeholder="Write the review content"></textarea>
          <input type="submit" value="Create Review" />
        </div>
      </form>

    </div>
  </body>
</html>
