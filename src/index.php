<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
<head>
	<title>Home</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <?php if (!isset($_SESSION['is_login'])): ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php else: ?>
            <a href="write.php">Write</a>
            <a href="list.php">List</a>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </nav>
    <h1>home</h1>
    <br><br>
    <?php
        if(!isset($_SESSION['is_login'])){
            $_SESSION['msg']='You have to login';
            header('Location: ./login.php');
        }else{
            if(isset($_SESSION['id'])){
                echo 'Hello'.$_SESSION['id'];
            }
        }
    ?>
</body>
</html>