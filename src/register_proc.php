<?php
    session_start();
    require_once 'db.php';

    $userid = $_POST['userid'] ?? '';
    $password = $_POST['pw'] ?? '';

    if (!$userid || !$password) {
        $_SESSION['msg'] = 'enter all';
        header('Location: register.php');
        exit;
    }

    $check_stmt = $conn->prepare("SELECT userid FROM users WHERE userid = ?");
    $check_stmt->bind_param("s", $userid);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    $_SESSION['msg'] = 'ID already exists';
    header('Location: register.php');
    exit;
}

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (userid, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $userid, $hashed);

    if ($stmt->execute()) {
        $_SESSION['msg'] = 'Success';
        header('Location: login.php');
    } else {
        $_SESSION['msg'] = 'Please try other id or password';
        header('Location: register.php');
    }
    exit;
?>