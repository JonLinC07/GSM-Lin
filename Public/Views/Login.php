<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/Stylesheet.css">
    <title>GSM Lin - Login</title>
  </head>

   <?php
   require_once('../../Private/Initialize.php');
   session_start();

   if (Session_Validator()) {
     redirect_to(url_for('/Views/Index.php'));
   }

   if (is_post_request()) {
     $result = get_user($_POST['User'], $_POST['Pass']);

     if (mysqli_num_rows($result) > 0) {
       $_SESSION['admin'] = $_POST['User'];
       redirect_to(url_for('/Views/Index.php'));
     }
   }
    ?>

  <body>
    <div class="headers">
      <header>

      </header>
    </div>

    <nav class="menu-bar">
      <a href="About.php"> GSM Lin </a>
    </nav>

    <div class="login">
      <h1>LOGIN</h1>

      <form class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h3>User Name</h3>
        <input type="text" name="User" value="" placeholder="User Name" required>
        <h3>Password</h3>
        <input type="password" name="Pass" value="" placeholder="Passwords" required>
        <input type="submit" name="" value="Login" id="submit">
      </form>
    </div>
  </body>
</html>
