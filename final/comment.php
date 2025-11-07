<?php
session_start();
require_once 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = 1;

    if (!empty($title) && !empty($content)) {
        $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', $user_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header('Location: index.php');
        exit;
    } else {
        echo "<p>Please fill out all fields</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Comment</title>
</head>
<body>
    <h1>New Comment</h1>
    <form method="POST" action="">

        <label>Comment:</label><br>
        <textarea name="content" rows="4" cols="30" required></textarea><br><br>

        <button type="submit">Publish</button>
    </form>

    <p><a href="index.php">Return Home</a></p>
</body>
</html>