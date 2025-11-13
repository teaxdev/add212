<?php if (isset($post)): ?>
    <article>
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p>By: <?= htmlspecialchars($author['name'] ?? 'Unknown') ?></p>
        <p>Category: <?= htmlspecialchars($post['category'] ?? 'Uncategorized') ?></p>
        <p>Posted on: <?= date('F j, Y', strtotime($post['created_at'])) ?></p>
        <div><?= nl2br(htmlspecialchars($post['content'])) ?></div>
        
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
            <a href="index.php?action=update&id=<?= $post['id'] ?>">Edit</a>
            <form method="post" action="index.php?action=delete" style="display: inline;">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <button type="submit">Delete</button>
            </form>
        <?php endif; ?>
    </article>

    <section>
        <h3>Comments</h3>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form method="post" action="index.php?action=comment">
                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                <textarea name="content" placeholder="Write a comment..." required></textarea>
                <button type="submit">Post Comment</button>
            </form>
        <?php else: ?>
            <p><a href="index.php?action=login">Login</a> to comment</p>
        <?php endif; ?>
        
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div>
                    <p><strong><?= htmlspecialchars($commentAuthors[$comment['id']]['name'] ?? 'Unknown') ?></strong> - <?= date('F j, Y g:i a', strtotime($comment['created_at'])) ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No comments yet.</p>
        <?php endif; ?>
    </section>
<?php endif; ?>

