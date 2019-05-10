<?php
  require_once('../../Private/Initialize.php');

  if (is_post_request()) {
    $review = [];
    $review['Upload_date'] = $_POST['Upload_date'] ?? '';
    $review['Review_name'] = $_POST['Review_name'] ?? '';
    $review['Content'] = $_POST['Content'] ?? '';
    $review['Image'] = $_POST['Image'] ?? '';
    $review['ID_Device'] = $_POST['ID_Device'] ?? '';

    $result = insert_review($review);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('Views/ViewReview.php?id=' . $new_id));

  } else {
    redirect_to(url_for('CreateReview.php'));
  }
 ?>
