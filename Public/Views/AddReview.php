<?php
  require_once('../../Private/Initialize.php');
  session_start();

  if (!Session_Validator()) {
    redirect_to(url_for('/Views/Login.php'));
  }

  if (is_post_request()) {
    $review = [];
    $review['Upload_date'] = $_POST['Upload_date'] ?? '';
    $review['Review_name'] = $_POST['Review_name'] ?? '';
    $review['Content'] = $_POST['Content'] ?? '';
    $review['ID_Device'] = $_POST['ID_Device'] ?? '';
    $review['Image'] = $_FILES['Image']['name'] ?? '';
    $image_data = $_FILES['Image']['tmp_name'] ?? '';

    $error = validate_review($review);
    if (strlen($error) > 0) {
      redirect_to(url_for('Views/CreateReview.php?error=' . $error));
    }

    $upload_image = 'C:/wamp64/www'. WWW_ROOT . '/Images/Phones/' . $review['Image'];
    move_uploaded_file($image_data, $upload_image);

    $result = insert_review($review);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('Views/ViewReview.php?id=' . $new_id));

  } else {
    redirect_to(url_for('CreateReview.php'));
  }
 ?>
