<?php
    session_start();
    require_once 'db.php';

    $id = $_POST['id'] ?? '';
    $pw = $_POST['pw'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data && password_verify($pw, $user_data['password'])) {
        $_SESSION['is_login'] = true;
        $_SESSION['id'] = $user_data['id'];
        header('Location: index.php');
        exit;
    }

    $_SESSION['msg'] = 'Invalid username or password';
    header('Location: login.php');
    exit;
?>