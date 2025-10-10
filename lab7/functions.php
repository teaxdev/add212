<?php 
include 'test_script.php';

// New way - using arrays 
// function updateJoke($pdo, $data) { 
// $sql = 'UPDATE joke SET '; $params = []; 
// foreach ($data as $field => $value) { if ($field !== 'id') { // Skip the primary key 
// $sql .= "$field = ?, "; $params[] = $value; } } 
// $sql = rtrim($sql, ', '); // Remove trailing comma 
// $sql .= ' WHERE id = ?'; $params[] = $data['id']; 
// $stmt = $pdo->prepare($sql); 
// $stmt->execute($params); }

function processDates($values) { foreach ($values as $key => $value) { 
    if ($value instanceof DateTime) { $values[$key] = $value->format('Y-m-d H:i:s'); } 
    } 
    return $values; 
}

// query($sql); return $stmt->fetchAll(PDO::FETCH_ASSOC); } 
// Generic function to find records by field 
function find($pdo, $table, $field, $value) { 
    $sql = "SELECT * FROM $table WHERE $field = ?"; $stmt = $pdo->prepare($sql); 
    $stmt->execute([$value]); return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 
// Generic function to delete records 
function delete($pdo, $table, $field, $value) { $sql = "DELETE FROM $table WHERE $field = ?"; 
    $stmt = $pdo->prepare($sql); return $stmt->execute([$value]);
}

function findAll($pdo, $table) {
    $stmt = $this->pdo->prepare('SELECT * FROM `' . $this->table . '`');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}
// Test the generic functions 
$allJokes = findAll($pdo, 'joke'); echo "Found " . count($allJokes) . " jokes\n"; 
$jokesByAuthor = find($pdo, 'joke', 'authorId', 1); echo "Found " . count($jokesByAuthor) . " jokes by author 1\n"; 
// Delete a joke (be careful!) 
// delete($pdo, 'joke', 'id', 5);

function insert($values) {
        $query = 'INSERT INTO `' . $this->table . '` (';

        foreach ($values as $key => $value) {
            $query .= '`' . $key . '`,';
        }

        $query = rtrim($query, ',');

        $query .= ') VALUES (';

        foreach ($values as $key => $value) {
            $query .= ':' . $key . ',';
        }

        $query = rtrim($query, ',');

        $query .= ')';

        $values = $this->processDates($values);

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
    }

// getMessage(), 'Duplicate') !== false) 
function save($pdo, $table, $primaryKey, $record) { 
    $id = $record[$primaryKey]; unset($record[$primaryKey]); 
    return update($pdo, $table, $primaryKey, $record, $id); 
} // throw $e; } } 
    
function update($pdo, $table, $primaryKey, $values, $id) { 
    $values = processDates($values); 
    $sql = "UPDATE $table SET "; $params = []; 
    foreach ($values as $field => $value) { $sql .= "$field = ?, "; $params[] = $value; } 
    $sql = rtrim($sql, ', '); 
    $sql .= " WHERE $primaryKey = ?"; 
    $params[] = $id; 
    $stmt = $pdo->prepare($sql); 
    return $stmt->execute($params); 
}
?>