<?php
  session_start();
  require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
</head>
<body>
  <h1>Register</h1>
  <form method="post" action="register_proc.php">
    <p>ID: <input type="text" name="id" required></p>
    <p>Password: <input type="password" name="pw" required></p>
    <input type="submit" value="Register">
  </form>

  <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
  ?>
</body>
</html>