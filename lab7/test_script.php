<?php 
$data = [ 'id' => 1, 'joketext' => 'Why did the programmer quit his job? He didn\'t get arrays' ];

// $data = [ 'joketext' => 'A new joke', 'jokedate' => new DateTime(), 'authorId' => 1 ]; 

$newJoke = [ 'joketext' => 'Why do programmers prefer dark mode? Because light attracts bugs!', 'jokedate' => new DateTime(), 'authorId' => 1 ]; 
if (insert($pdo, 'joke', $newJoke)) { echo "Joke inserted successfully!\n"; }

// Try to save a new joke 
$joke = [ 'joketext' => 'New joke without ID', 'jokedate' => new DateTime(), 'authorId' => 1 ]; 
save($pdo, 'joke', 'id', $joke); 
// Try to save an existing joke 
$joke = [ 'id' => 1, 
// Existing ID 
'joketext' => 'Updated joke text', 'jokedate' => new DateTime(), 'authorId' => 1 ]; 
save($pdo, 'joke', 'id', $joke);

$processedData = processDates($data); print_r($processedData);

$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

$updatedJoke = updateJoke($pdo, $data); print_r($updatedJoke);
// $stmt = $pdo->prepare($sql); $stmt->execute([$joketext, $authorId, $jokedate, $id]);


?>

