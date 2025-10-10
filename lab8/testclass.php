<?php
include 'DatabaseTable.php';

$pdo = new PDO('mysql:host=localhost;dbname=test_db', 'root', '');

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
// $jokesTable->findAll(); echo "Found " . count($allJokes) . " jokes\n"; 
// Test the find method 
$joke = $jokesTable->find('id', 1); echo "Found joke: " . $joke[0]['joketext'] . "\n"; 

// Test insert 
$newJoke = [ 'joketext' => 'Why do programmers prefer dark mode? Because light attracts bugs!', 'jokedate' => date('Y-m-d'), 'authorId' => 1 ]; 
if ($jokesTable->insert($newJoke)) { 
    echo "Joke inserted successfully!\n"; 
} // Test update 
$updateData = ['joketext' => 'Updated joke text']; if ($jokesTable->update($updateData, 1)) { 
    echo "Joke updated successfully!\n"; 
} // Test delete (be careful!) 
// $jokesTable->delete('id', 5);

// But this works - you can call public methods 
$jokes = $jokesTable->findAll(); // This works fine
echo "Table name: " . $jokesTable->getTableName() . "\n";
?>