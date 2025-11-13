<h2><?= isset($post) ? 'Edit Post' : 'Create New Post' ?></h2>
<form method="post" action="index.php?action=<?= isset($post) ? 'update' : 'create' ?>">
    <?php if (isset($post)): ?>
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
    <?php endif; ?>
    
    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($post['title'] ?? '') ?>" required>
    
    <label>Category:</label>
    <input type="text" name="category" value="<?= htmlspecialchars($post['category'] ?? '') ?>">
    
    <label>Content:</label>
    <textarea name="content" rows="10" required><?= htmlspecialchars($post['content'] ?? '') ?></textarea>
    
    <button type="submit"><?= isset($post) ? 'Update' : 'Create' ?> Post</button>
</form>

