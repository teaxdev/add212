<?php 
// include 'testclass.php';
class DatabaseTable {

    public function __construct(private PDO $pdo, private string $table, private string $primaryKey) {
        $this->pdo = $pdo; 
        $this->table = $table; 
        $this->primaryKey = $primaryKey;
    }

    public function findAll() { 
        $sql = "SELECT * FROM {$this->table}"; $stmt = $this->pdo->query($sql); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 
    
    public function find($field, $value) { 
        $sql = "SELECT * FROM {$this->table} WHERE $field = ?"; 
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([$value]); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 

    public function insert($values) { 
        $columns = implode(', ', array_keys($values)); 
        $placeholders = implode(', ', array_fill(0, count($values), '?')); 
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)"; 
        $stmt = $this->pdo->prepare($sql); return $stmt->execute(array_values($values)); 
    } 
    
    public function update($values, $id) { 
        $sql = "UPDATE {$this->table} SET "; 
        $params = []; foreach ($values as $field => $value) { 
            $sql .= "$field = ?, "; $params[] = $value; 
        } 
        $sql = rtrim($sql, ', '); 
        $sql .= " WHERE {$this->primaryKey} = ?"; 
        $params[] = $id; 
        $stmt = $this->pdo->prepare($sql); 
        return $stmt->execute($params); 
    } 

    public function delete($field, $value) { 
        $sql = "DELETE FROM {$this->table} WHERE $field = ?"; 
        $stmt = $this->pdo->prepare($sql); 
        return $stmt->execute([$value]); 
    }

    public function getTableName() { return $this->table; }

}






?>