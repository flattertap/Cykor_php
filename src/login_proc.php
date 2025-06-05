<?php
    session_start();
    require_once 'db.php';

    $userid = $_POST['userid'] ?? '';
    $password = $_POST['pw'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE userid = ?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data && password_verify($password, $user_data['password'])) {
        $_SESSION['is_login'] = true;
        $_SESSION['userid'] = $user_data['userid'];
        $_SESSION['id'] = $user_data['id'];
        header('Location: index.php');
        exit;
    }

    $_SESSION['msg'] = 'Invalid userid or password';
    header('Location: login.php');
    exit;
?>