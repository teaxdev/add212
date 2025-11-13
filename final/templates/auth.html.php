<h2><?= $isLogin ? 'Login' : 'Register' ?></h2>
<form method="post" action="index.php?action=<?= $isLogin ? 'login' : 'register' ?>">
    <?php if (!$isLogin): ?>
        <label>Name:</label>
        <input type="text" name="name" required>
    <?php endif; ?>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit"><?= $isLogin ? 'Login' : 'Register' ?></button>
</form>
<p><?= $isLogin ? "Don't have an account? " : "Already have an account? " ?><a href="index.php?action=<?= $isLogin ? 'register' : 'login' ?>"><?= $isLogin ? 'Register' : 'Login' ?></a></p>

