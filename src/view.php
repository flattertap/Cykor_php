<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? '';
$stmt = $conn->prepare("SELECT posts.*, users.userid FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if (!$post) {
    echo "Post not found.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $post['title'] ?></title>
</head>
<body>
    <nav>
        <a href="index.php">home</a>
        <a href="write.php">write</a>
        <a href="list.php">list</a>
        <a href="logout.php">logout</a>
    </nav>

    <h1><?= $post['title'] ?></h1>
    <p>By <?= $post['userid'] ?></p>
    <p><?= nl2br($post['content']) ?></p>
    <p>Created at: <?= $post['created_at'] ?></p>
    <p>Last updated: <?= $post['updated_at'] ?></p>


    <a href="edit.php?id=<?= $post['id'] ?>">Edit</a>
    <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Delete this post?')">Delete</a>
</body>
</html>