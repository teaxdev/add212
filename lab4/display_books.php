<?php query("SELECT * FROM `books` ORDER BY `title`"); // Check if we have books 
if ($stmt->rowCount() > 0) { 
    echo " Found " . $stmt->rowCount() . " books in the library!"; 
    // Display each book 
    while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        echo ""; 
        echo ""; 
        echo ""; 
        echo "Author: " . htmlspecialchars($book['author']) . ""; 
        echo "Genre: " . htmlspecialchars($book['genre']) . ""; 
        echo "Published: " . htmlspecialchars($book['publication_year']) . ""; 
        echo "ISBN: " . htmlspecialchars($book['isbn']) . ""; 
        echo "Added: " . htmlspecialchars($book['created_at']); 
        echo ""; 
        echo ""; 
    } 
} else { 
    echo "
No books found in the library."; 
} 
?>