<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Blog') ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>My Personal Blog</h1>
        <nav>
            <a href="index.php?action=list">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="index.php?action=create">Create Post</a>
                <a href="index.php?action=logout">Logout</a>
            <?php else: ?>
                <a href="index.php?action=login">Login</a>
                <a href="index.php?action=register">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>