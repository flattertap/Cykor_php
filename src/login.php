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
    <title>Login</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>
    <h1>Login</h1>

    <form method="post" action="login_proc.php">
        <p>
            ID:
            <input type="text" name="userid" placeholder="Enter ID" required>
            Password:
            <input type="password" name="pw" placeholder="Enter password" required>
        </p>
        <input type="submit" value="Login">
    </form>

    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
</body>
</html>