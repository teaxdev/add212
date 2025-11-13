<h2>All Blog Posts</h2>
<?php if (empty($posts) || !is_array($posts)): ?>
    <p>No posts yet.</p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <article>
            <h3><a href="index.php?action=view&id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
            <p>Category: <?= htmlspecialchars($post['category'] ?? 'Uncategorized') ?></p>
            <p>Posted on: <?= date('F j, Y', strtotime($post['created_at'])) ?></p>
            <p><?= substr(htmlspecialchars($post['content']), 0, 200) ?>...</p>
        </article>
    <?php endforeach; ?>
<?php endif; ?>

