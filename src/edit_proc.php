<?php
    session_start();
    require_once 'db.php';

    $post_id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $user_id = $_SESSION['id'] ?? '';

    $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ssii", $title, $content, $post_id, $user_id);
    $stmt->execute();
    header("Location: list.php");
    exit;
?>