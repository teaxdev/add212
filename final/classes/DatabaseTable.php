<?php 
class DatabaseTable {

    public function __construct(private PDO $pdo, private string $table, private string $primaryKey) {
        $this->pdo = $pdo; 
        $this->table = $table; 
        $this->primaryKey = $primaryKey;
    }

    public function findAll($orderBy = null) { 
        $sql = "SELECT * FROM `{$this->table}`"; 
        if ($orderBy) {
            // Parse orderBy to separate column name from direction (ASC/DESC)
            $parts = preg_split('/\s+/', trim($orderBy), 2);
            $column = $parts[0];
            $direction = isset($parts[1]) ? ' ' . strtoupper($parts[1]) : '';
            $sql .= " ORDER BY `$column`$direction";
        }
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 
    
    public function find($field, $value) { 
        $sql = "SELECT * FROM `{$this->table}` WHERE `$field` = :value"; 
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([':value' => $value]); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 

    public function findOne($field, $value) {
        $sql = "SELECT * FROM `{$this->table}` WHERE `$field` = :value LIMIT 1"; 
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([':value' => $value]); 
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function insert($values) { 
        $columns = [];
        $placeholders = [];
        $params = [];
        
        foreach ($values as $key => $value) {
            $columns[] = "`$key`";
            $placeholders[] = ":{$key}";
            $params[":{$key}"] = $value;
        }
        
        $columnsStr = implode(', ', $columns);
        $placeholdersStr = implode(', ', $placeholders);
        $sql = "INSERT INTO `{$this->table}` ($columnsStr) VALUES ($placeholdersStr)"; 
        $stmt = $this->pdo->prepare($sql); 
        return $stmt->execute($params); 
    } 
    
    public function update($values, $id) { 
        $sql = "UPDATE `{$this->table}` SET "; 
        $params = []; 
        foreach ($values as $field => $value) { 
            $sql .= "`$field` = :{$field}, "; 
            $params[":{$field}"] = $value; 
        } 
        $sql = rtrim($sql, ', '); 
        $sql .= " WHERE `{$this->primaryKey}` = :id"; 
        $params[':id'] = $id; 
        $stmt = $this->pdo->prepare($sql); 
        return $stmt->execute($params); 
    } 

    public function delete($field, $value) { 
        $sql = "DELETE FROM `{$this->table}` WHERE `$field` = :value"; 
        $stmt = $this->pdo->prepare($sql); 
        return $stmt->execute([':value' => $value]); 
    }

    public function getTableName() { 
        return $this->table; 
    }
}
?>

