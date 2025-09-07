<?php require_once 'db_connection.php'; $message = ''; $action = $_GET['action'] ?? 'list'; 
// Handle form submissions 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { if (isset($_POST['add_book'])) { $title = trim($_POST['title'] ?? ''); 
$author = trim($_POST['author'] ?? ''); $genre = trim($_POST['genre'] ?? ''); $year = (int)($_POST['year'] ?? 0); 
$price = (float)($_POST['price'] ?? 0); 
if (!empty($title) && !empty($author)) { try { $stmt = $pdo->prepare("INSERT INTO `books` (`title`, `author`, `genre`, `publication_year`, `price`) 
VALUES (?, ?, ?, ?, ?)"); $stmt->execute([$title, $author, $genre, $year, $price]); $message = "Book added successfully!"; } 
catch(PDOException $e) { $message = "Error adding book: " . $e->getMessage(); } } else { $message = "Title and author are required!"; } } 
if (isset($_POST['delete_book'])) { $id = (int)($_POST['book_id'] ?? 0); 
if ($id > 0) { try { $stmt = $pdo->prepare("DELETE FROM `books` WHERE `id` = ?"); $stmt->execute([$id]); 
$message = "Book deleted successfully!"; } catch(PDOException $e) { $message = "Error deleting book: " . $e->getMessage(); } } } } 
// Get books for display 
try { $stmt = $pdo->prepare("SELECT * FROM `books` ORDER BY `title`"); $stmt->execute(); 
$books = $stmt->fetchAll(PDO::FETCH_ASSOC); } catch(PDOException $e) { $message = "Error loading books: " . $e->getMessage(); $books = []; } ?> 
<!DOCTYPE html> <html> <head> <title>Book Management System</title> <style> body { font-family: Arial, sans-serif; margin: 20px; } 
.container { max-width: 1200px; margin: 0 auto; } .message { padding: 10px; margin: 10px 0; border-radius: 4px; } 
.success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; } .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; } 
.form-section { background-color: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 4px; } .form-group { margin-bottom: 15px; } 
label { display: block; margin-bottom: 5px; font-weight: bold; } input[type="text"], input[type="number"] { padding: 8px; width: 100%; border: 1px solid #ddd; border-radius: 4px; } 
button { padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; } 
button.delete { background-color: #dc3545; } table { border-collapse: collapse; width: 100%; margin-top: 20px; } 
th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } th { background-color: #f2f2f2; } 
.actions { display: flex; gap: 10px; } </style> </head> <body> <div class="container"> <h1>Book Management System</h1> 
<?php if (!empty($message)): ?> <div class="message <?php echo strpos($message, 'Error') !== false ? 'error' : 'success'; ?>"> 
    <?php echo htmlspecialchars($message); ?> </div> <?php endif; ?> <div class="form-section"> <h2>Add New Book</h2> 
<form method="POST"> <div class="form-group"> <label for="title">Title:</label> <input type="text" id="title" name="title" required> </div> 
<div class="form-group"> <label for="author">Author:</label> <input type="text" id="author" name="author" required> </div> 
<div class="form-group"> <label for="genre">Genre:</label> <input type="text" id="genre" name="genre"> </div> <div class="form-group"> 
<label for="year">Publication Year:</label> <input type="number" id="year" name="year" min="1000" max="2024"> </div> 
<div class="form-group"> <label for="price">Price:</label> <input type="number" id="price" name="price" min="0" step="0.01"> </div> 
<button type="submit" name="add_book">Add Book</button> </form> </div> <div class="form-section"> <h2>Book Collection (<?php echo count($books); ?> books)</h2> 
<?php if (count($books) > 0): ?> <table> <tr> <th>ID</th> <th>Title</th> <th>Author</th> <th>Genre</th> <th>Year</th> <th>Price</th> <th>Actions</th> </tr> 
    <?php foreach ($books as $book): ?> <tr> <td><?php echo htmlspecialchars($book['id']); ?></td> <td><?php echo htmlspecialchars($book['title']); ?></td> 
        <td><?php echo htmlspecialchars($book['author']); ?></td> <td><?php echo htmlspecialchars($book['genre']); ?></td> 
        <td><?php echo htmlspecialchars($book['publication_year']); ?></td> <td>$<?php echo htmlspecialchars($book['price']); ?></td> 
        <td> <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this book?');"> 
        <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>"> <button type="submit" name="delete_book" class="delete">Delete</button> </form> </td> </tr> 
        <?php endforeach; ?> </table> <?php else: ?> <p>No books found in the database.</p> <?php endif; ?> </div> </div> </body> </html>