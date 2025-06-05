<?php
    session_start();
    require_once 'db.php';

    if (!isset($_SESSION['is_login'])) {
        header('Location: login.php');
        exit;
    }

    $post_id = $_GET['id'] ?? '';
    $user_id = $_SESSION['id'];

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    header("Location: list.php");
    exit;
?>