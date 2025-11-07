<?php // starts a session that saves user cookies
session_start();

require_once 'db/db_connection.php';

// connects to the db
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>final</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<h1>My Blog</h1>
<a href="new_post.php">Add New Post</a>
<hr>

<?php
if ($posts) { // loops through each post and displays them
    foreach ($posts as $post) {
        echo '<h2><a href="post.php?id=' . $post['id'] . '">' . htmlspecialchars($post['title']) . '</a></h2>';
        echo '<p>' . htmlspecialchars($post['content']) . '...</p>';
        echo '<p>Posted on ' . $post['created_at'] . '</p><hr>';
    }
} else {
    echo '<p>No posts yet.</p>';
}
?>
    
</body>
</html>