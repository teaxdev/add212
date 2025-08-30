<?php // String variables $name = "John Doe"; $email = "john@example.com"; 
// Integer variables $age = 25; $score = 100; 
// Float variables $price = 19.99; $temperature = 98.6; 
// Boolean variables $isStudent = true; $isWorking = false; 
// Display variables echo "<h2>Variable Examples</h2>"; echo "<p>Name: " . $name . "</p>"; echo "<p>Email: " . $email . "</p>"; echo "<p>Age: " . $age . "</p>"; echo "<p>Score: " . $score . "</p>"; echo "<p>Price: $" . $price . "</p>"; echo "<p>Temperature: " . $temperature . "°F</p>"; echo "<p>Is Student: " . ($isStudent ? "Yes" : "No") . "</p>"; echo "<p>Is Working: " . ($isWorking ? "Yes" : "No") . "</p>"; // Check data types echo "<h3>Data Types:</h3>"; echo "<p>Name is: " . gettype($name) . "</p>"; echo "<p>Age is: " . gettype($age) . "</p>"; echo "<p>Price is: " . gettype($price) . "</p>"; echo "<p>Is Student is: " . gettype($isStudent) . "</p>"; ?>

<?php $word = "Fox"; echo "<p>Your word of the day: " . $word . "</p>";
    $cucumber = "1"; echo "<p>Your cucumbers: " . $cucumber . "</p>";
    $money = "17.61"; echo "<p>Your bank account: " . $money . "</p>";