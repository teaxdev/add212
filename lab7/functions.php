<?php prepare($sql); $stmt->execute([$joketext, $authorId, $jokedate, $id]);  
// New way - using arrays 
function updateJoke($pdo, $data) { 
$sql = 'UPDATE joke SET '; $params = []; foreach ($data as $field => $value) { if ($field !== 'id') { // Skip the primary key 
$sql .= "$field = ?, "; $params[] = $value; } } $sql = rtrim($sql, ', '); // Remove trailing comma 
$sql .= ' WHERE id = ?'; $params[] = $data['id']; $stmt = $pdo->prepare($sql); $stmt->execute($params); }
$data = [ 'id' => 1, 'joketext' => 'Why did the programmer quit his job? He didn\'t get arrays' ]; updateJoke($pdo, $data); ?>