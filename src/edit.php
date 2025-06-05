<?php
    session_start();
    if (!isset($_SESSION['is_login'])) {
        $_SESSION['msg'] = 'Login required';
        header('Location: login.php');
        exit;
    }
    require_once 'db.php';

    $post_id = $_GET['id'] ?? '';
    $user_id = $_SESSION['id'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if (!$post || $_SESSION['id'] !== $user_id) {
        echo "Access denied.";
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
<h1>Edit</h1>
<form action="edit_proc.php" method="post">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">
    <p>Title: <input type="text" name="title" value="<?= $post['title'] ?>"></p>
    <p>Content:<br><textarea name="content" rows="10" cols="50"><?= $post['content'] ?></textarea></p>
    <input type="submit" value="Edit">
</form>
</body>
</html>