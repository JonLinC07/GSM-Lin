<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../Public/css/Stylesheet.css">
    <?php
      require_once('../../Private/Initialize.php');

      $reviews_set = find_all_reviews();
    ?>
    <title>GSM - Lin</title>
  </head>

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

    <div class="content-reviews">
      <h2>REVIEWS</h2>

      <div class="create-button">
        <a href="Create.html"> <img src="../Images/Create.png" alt=""> </a>
      </div>

      <?php while($review = mysqli_fetch_assoc($reviews_set)) { ?>

        <div class="review">
          <div class="to-show">
            <div class="image">
              <img src="../../Public/Images/Phones/<?php echo h($review['Image']); ?>" alt="">
            </div>

            <div class="info-review">
              <div class="title">
                  <h3><?php echo h($review['Review_name']); ?></h3>
              </div>

              <p><?php echo h($review['Upload_date']); ?></p>
              <p><?php echo h($review['Last_upload_date']); ?></p>
            </div>
          </div>

          <div class="to-hidden">
            <div class="hide">
              <h6>Edit</h6>
              <a href="#"><img src="../../Public/Images/Edit.png" alt=""></a>
            </div>

            <div class="hide">
              <h6>Preview</h6>
              <a href="#"><img src="../../Public/Images/Show.png" alt=""></a>
            </div>

            <div class="hide">
              <h6>Delete</h6>
              <a href="#"><img src="../../Public/Images/Delete.png" alt=""></a>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>

    <?php mysqli_free_result($reviews_set); ?>


<!--
      <div class="footer">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
          eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
          sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
-->
  </body>
</html>
