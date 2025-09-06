<?php // Database connection configuration 
$host = 'localhost'; $dbname = 'lab03_db'; $username = 'root'; $password = ''; 
// Update with your WAMP/MAMP MySQL password 
try { // Create PDO connection 
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
// Set PDO error mode to exception 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
echo "<p style='color: green;'>✅ Database connected successfully!</p>"; } catch(PDOException $e) { echo "<p style='color: red;'>❌ Connection failed: " . $e->getMessage() . "</p>"; } ?>