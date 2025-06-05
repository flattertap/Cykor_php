<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    $_SESSION['msg'] = 'Login required';
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Write</title>
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="list.php">List</a>
    <a href="logout.php">Logout</a>
</nav>
<h1>Write</h1>
<form action="write_proc.php" method="post">
    <p>Title: <input type="text" name="title" required></p>
    <p>Content:<br><textarea name="content" rows="10" cols="50" required></textarea></p>
    <input type="submit" value="Submit">
</form>
</body>
</html>