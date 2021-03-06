<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../Public/css/Stylesheet.css">
    <title>Create Review</title>
  </head>

  <?php
    require_once('../../Private/Initialize.php');
    session_start();

    if (!Session_Validator()) {
      redirect_to(url_for('/Views/Login.php'));
    }

    $review_set = find_all_reviews();
    $review_count = mysqli_num_rows($review_set);
    //mysqli_free_result($review_set);
    $review = [];
    $review['ID_Device'] = $review_count;
    $error = $_GET['error'] ?? '';

    $device_set = find_all_devices();
    $device_count = mysqli_num_rows($device_set);
    //mysqli_free_result($review_set);
    $device = [];
    $device['ID_Device'] = $device_count;

    $current_date =  date("Y")  . "-" . date("m") . "-" . date("d");
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

<!--         CONTENIDO         -->

    <div class="content-create">
      <h2>CREATING REVIEW</h2>

      <form class="form-review" action="<?php echo url_for('Views/AddReview.php'); ?>" method="post" enctype="multipart/form-data">
        <div class="infos">
          <input type="text" name="Review_name" value="" placeholder="Review Title" required>
          <div class="review-device">
            <h4>Phone Name:</h4>
            <select class="" name="ID_Device">
              <?php
                while($device = mysqli_fetch_assoc($device_set)) {
                  echo "<option value=\"{$device['ID_Device']}\"";
                  if ($device['Device_name']) {
                    echo " selected";
                  }
                  echo ">{$device['Device_name']}</option>";
                }
               ?>
            </select>
          </div>

          <div class="review-date">
            <h4>Date:</h4>
            <input type="date" name="Upload_date" value="<?php echo date('Y-m-d', strtotime($current_date)); ?>" placeholder="" required>
          </div>
        </div>

        <div class="photo-phone">
          <h4>Phone Photo</h4>
          <input type="file" name="Image"/ required>
        </div>

        <?php
          if (strlen($error) > 0) {
            echo '<div class="error"><p>' . $error . '</p></div>';
          }
         ?>

        <div class="text-review">
          <textarea name="Content" rows="20" cols="80" placeholder="Write the review content" required></textarea>
          <input type="submit" value="Create Review" />
        </div>
      </form>
    </div>
  </body>
</html>
