<?php require_once 'db_connection.php'; $searchResults = []; $searchGenre = ''; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { $searchGenre = trim($_POST['genre'] ?? ''); 
if (!empty($searchGenre)) { try { $stmt = $pdo->prepare("SELECT * FROM `books` WHERE `genre` LIKE ? ORDER BY `title`"); 
$stmt->execute(['%' . $searchGenre . '%']); $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC); } 
catch(PDOException $e) { echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>"; } } } ?> 
<!DOCTYPE html> <html> <head> <title>Search Books</title> <style> body { font-family: Arial, sans-serif; margin: 20px; } 
.search-form { margin-bottom: 20px; } input[type="text"] { padding: 8px; width: 200px; } 
button { padding: 8px 16px; background-color: #007bff; color: white; border: none; cursor: pointer; } 
table { border-collapse: collapse; width: 100%; margin-top: 20px; } th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } 
th { background-color: #f2f2f2; } </style> </head> <body> <h1>Search Books by Genre</h1> 
<form method="POST" class="search-form"> <label for="genre">Genre:</label> <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($searchGenre); ?>"> 
<button type="submit">Search</button> </form> <?php if (!empty($searchResults)): ?> <h3>Search Results (<?php echo count($searchResults); ?> books found):</h3> 
    <table> <tr> <th>Title</th> <th>Author</th> <th>Genre</th> <th>Year</th> <th>Price</th> </tr> <?php foreach ($searchResults as $book): ?> <tr> <td>
        <?php echo htmlspecialchars($book['title']); ?></td> <td><?php echo htmlspecialchars($book['author']); ?></td> <td>
        <?php echo htmlspecialchars($book['genre']); ?></td> <td><?php echo htmlspecialchars($book['publication_year']); ?></td> <td>$
        <?php echo htmlspecialchars($book['price']); ?></td> </tr> <?php endforeach; ?> </table> <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?> 
    <p>No books found for the genre "<?php echo htmlspecialchars($searchGenre); ?>".</p> <?php endif; ?> 
<?php try { // Prepare and execute query 
$stmt = $pdo->prepare("SELECT * FROM `books` ORDER BY `title`"); $stmt->execute(); 
// Fetch all results 
$books = $stmt->fetchAll(PDO::FETCH_ASSOC); echo "<h2>Book Collection</h2>"; if (count($books) > 0) 
{ echo "<table border='1' style='border-collapse: collapse; width: 100%;'>"; 
echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Price</th></tr>"; 
foreach ($books as $book) { echo "<tr>"; echo "<td>" . htmlspecialchars($book['id']) . "</td>";
echo "<td>" . htmlspecialchars($book['title']) . "</td>"; echo "<td>" . htmlspecialchars($book['author']) . "</td>"; 
echo "<td>" . htmlspecialchars($book['genre']) . "</td>"; echo "<td>" . htmlspecialchars($book['publication_year']) . "</td>"; 
echo "<td>$" . htmlspecialchars($book['price']) . "</td>"; echo "</tr>"; } echo "</table>"; } else { echo "<p>No books found in the database.</p>"; } } 
catch(PDOException $e) { echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>"; } ?>