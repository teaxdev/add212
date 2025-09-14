<h2>Jokes</h2> <?php foreach ($jokes as $joke): ?> <blockquote> <p> <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?> 
</p> <form action="deletejoke.php" method="post"> <input type="hidden" name="id" value="<?=$joke['id']?>"> <input type="submit" value="Delete"> </form> </blockquote> 
<?php endforeach; ?> <p><a href="addjoke.php">Add a new joke</a></p>