<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
        $_SESSION['msg']='You have to login';
        header('Location: ./login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Home</title>
</head>
<body>
    <nav>
        <a href="write.php">Write</a>
        <a href="list.php">List</a>
        <a href="logout.php">Logout</a>
    </nav>
    <h1>home</h1>
    <br><br>
    <?php
        if(isset($_SESSION['id'])){
            echo 'Hello'.$_SESSION['id'];
        }
    ?>
</body>
</html>