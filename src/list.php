<?php
    session_start();
    require_once 'db.php';
    if (!isset($_SESSION['is_login'])) {
        header('Location: ./index.php');
        exit;
    }
    $result = $conn->query("SELECT posts.id AS post_id, posts.title, users.userid FROM posts JOIN users ON posts.user_id = users.id  ORDER BY posts.id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>List</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="write.php">Write</a>
        <a href="list.php">list</a>
        <a href="logout.php">Logout</a>
    </nav>
    <h1>List</h1>
    <?php
    echo "total rows: " . $result->num_rows;
    ?>
    <ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li><a href="view.php?id=<?= $row['post_id'] ?>"><?= $row['title'] ?></a></li>
    <?php endwhile; ?>
    </ul>
</body>
</html>