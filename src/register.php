<?php
    session_start();
    if (isset($_SESSION['is_login'])) {
        header('Location: ./index.php');
        exit;
    }
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
        <p>ID: <input type="text" name="userid" required></p>
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