<?php echo "<h2>Function Examples</h2>"; 
// Simple function with no parameters function sayHello() { echo "<p>Hello, World!</p>"; } 
// Function with parameters function greetPerson($name) { echo "<p>Hello, " . $name . "!</p>"; } 
// Function with return value function addNumbers($a, $b) { return $a + $b; } 
// Function with default parameter function createGreeting($name, $time = "today") { return "Good " . $time . ", " . $name . "!"; } 
// Function with multiple return types function checkNumber($number) { if ($number > 0) { return "positive"; } elseif ($number < 0) { return "negative"; } else { return "zero"; } } 
// Test the functions sayHello(); greetPerson("Alice"); greetPerson("Bob"); $result = addNumbers(5, 3); echo "<p>5 + 3 = " . $result . "</p>"; echo "<p>" . createGreeting("John") . "</p>"; echo "<p>" . createGreeting("Jane", "morning") . "</p>"; echo "<p>10 is " . checkNumber(10) . "</p>"; echo "<p>-5 is " . checkNumber(-5) . "</p>"; echo "<p>0 is " . checkNumber(0) . "</p>";

echo "<h3>Variable Scope Example:</h3>"; // $globalVar = "I'm global"; function testScope() { $localVar = "I'm local"; global $globalVar;
// Access global variable echo 
// "<p>Inside function: " . $localVar . "</p>"; echo "<p>Global variable: " . $globalVar . "</p>"; } 
//testScope(); echo "<p>Outside function: " . $globalVar . "</p>"; 
// echo $localVar; 
// This would cause an error - $localVar is not accessible here ?>

<?php "<h1>Part 3</h1>"; function calculateArea($a, $b) {echo "<p>The area is: </p>"; return $a * $b; }
echo calculateArea(4, 5);
echo calculateArea(6, 7);
echo calculateArea(8, 4);