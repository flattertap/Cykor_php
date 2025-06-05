<?php
    session_start();
    require_once 'db.php';

    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit;
    }

    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $user_id = $_SESSION['id'];

    if (!$title || !$content) {
        $_SESSION['msg'] = 'Title and content required';
        header('Location: write.php');
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $content);
    $stmt->execute();
    header("Location: list.php");
    exit;
?>