<?php // String variables $name = "John Doe"; $email = "john@example.com"; 
// Integer variables $age = 25; $score = 100; 
// Float variables $price = 19.99; $temperature = 98.6; 
// Boolean variables $isStudent = true; $isWorking = false; 
// Display variables echo "<h2>Variable Examples</h2>"; echo "<p>Name: " . $name . "</p>"; echo "<p>Email: " . $email . "</p>"; echo "<p>Age: " . $age . "</p>"; echo "<p>Score: " . $score . "</p>"; echo "<p>Price: $" . $price . "</p>"; echo "<p>Temperature: " . $temperature . "°F</p>"; echo "<p>Is Student: " . ($isStudent ? "Yes" : "No") . "</p>"; echo "<p>Is Working: " . ($isWorking ? "Yes" : "No") . "</p>"; 
// Check data types echo "<h3>Data Types:</h3>"; echo "<p>Name is: " . gettype($name) . "</p>"; echo "<p>Age is: " . gettype($age) . "</p>"; echo "<p>Price is: " . gettype($price) . "</p>"; echo "<p>Is Student is: " . gettype($isStudent) . "</p>"; 

// Type conversion examples echo "<h3>Type Conversion:</h3>"; $number = "42"; echo "<p>Original: " . $number . " (type: " . gettype($number) . ")</p>"; $converted = (int)$number; echo "<p>Converted to integer: " . $converted . " (type: " . gettype($converted) . ")</p>"; $floatNumber = 3.14; $intNumber = (int)$floatNumber; echo "<p>Float to integer: " . $floatNumber . " → " . $intNumber . "</p>"; 
// Constants define("PI", 3.14159); define("MAX_USERS", 100); const WEBSITE_NAME = "My PHP Site"; echo "<h3>Constants:</h3>"; echo "<p>PI: " . PI . "</p>"; echo "<p>Max Users: " . MAX_USERS . "</p>"; echo "<p>Website: " . WEBSITE_NAME . "</p>"; ?>
?>

<?php $word = "Fox"; echo "<p>Your word of the day: " . $word . "</p>";
    $cucumber = "1"; echo "<p>Your cucumbers: " . $cucumber . "</p>";
    $money = "17.61"; echo "<p>Your bank account: " . $money . "</p>";