<?php echo "<h1>Database Connection Test</h1>"; 
try { $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", ""); 
echo "<p style='color: green;'>✅ Database connection successful!</p>"; 
$stmt = $pdo->query("SELECT COUNT(*) as count FROM users"); $result = $stmt->fetch(); 
echo "<p>Number of users in database: " . $result['count'] . "</p>"; } 
catch (Exception $e) { echo "<p style='color: red;'>❌ Database connection failed: " . $e->getMessage() . "</p>"; } ?>