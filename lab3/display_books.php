<?php require_once 'db_connection.php'; try { // Prepare and execute query 
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