<?php
session_start();

require_once 'db/db_connection.php';

$post_id = (int) $_GET['id']; // gets the id of the post to display

// gets post from the db
$sql = "SELECT * FROM posts WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $post_id]);
$post = $stmt->fetch();

// comment functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_content = trim($_POST['comment_content'] ?? '');
    $user_id = $_SESSION['user_id'] ?? 1; // placeholder until users get added

    if (!empty($comment_content)) {
        $sql = "INSERT INTO comments (post_id, user_id, content) VALUES ($post_id, $user_id, '$comment_content')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // prevents duplicate form submissions
        header("Location: post.php?id=" . $post['id']);
        exit;
    }
}

// gets comments from the db

$sql = "SELECT content, created_at FROM comments WHERE post_id = $post_id ORDER BY created_at ASC";
$stmt = $pdo->query($sql);
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= htmlspecialchars($post['content']) ?></p>
    <p>Posted on <?= $post['created_at'] ?></p>
    <h3>Leave a Comment</h3>
    <form action="post.php?id=<?= $post['id'] ?>" method="post">
        <textarea name="comment_content" rows="4" cols="50" placeholder="Write your comment..."></textarea><br>
        <button type="submit" name="submit_comment">Submit Comment</button>
    </form>

    <h3>Comments</h3>
    <hr>
    <?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <div>
            <p><?= htmlspecialchars($comment['content']) ?></p>
            <p>Posted on <?= htmlspecialchars($comment['created_at']) ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
    <?php else: ?>
        <p>No comments yet.</p>
    <?php endif; ?>
    <a href="index.php">Return Home</a>
</body>
</html>