<?php // echo "<h2>If Statement Examples</h2>"; $age = 18; $hasLicense = true; 
// Simple if statement if ($age >= 18) { echo "<p>You are an adult.</p>"; } 
// If-else statement if ($age >= 16) { echo "<p>You can drive (with restrictions).</p>"; } else { echo "<p>You cannot drive yet.</p>"; } 
// If-elseif-else statement if ($age >= 18 && $hasLicense) { echo "<p>You can drive without restrictions.</p>"; } elseif ($age >= 16) { echo "<p>You can drive with restrictions.</p>"; } else { echo "<p>You cannot drive yet.</p>"; } 
// Nested if statements $temperature = 75; $isRaining = false; if ($temperature > 70) { if ($isRaining) { echo "<p>It's warm but raining. Bring an umbrella!</p>"; } else { echo "<p>It's a nice day for outdoor activities!</p>"; } } else { echo "<p>It's a bit cool today.</p>"; } ?>

<?php echo "<h1>If Statement Examples 2 </h1>"; $grade = 85;
    if ($grade < 60) { echo "<p>You have an F.</p>"; } elseif ($grade >= 60 && $grade < 70) { echo "<p>You have a D.</p>"; }
    elseif ($grade >= 70 && $grade < 80) { echo "<p>You have a C.</p>"; } elseif ($grade >= 80 && $grade < 90) { echo "<p>You have a B.</p>"; }
    elseif ($grade >= 90) { echo "<p>You have an A.</p>"; } ?>

<?php // echo "<h3>For Loop Examples:</h3>"; 
// Count from 1 to 5 echo "<p>Counting from 1 to 5:</p>"; for ($i = 1; $i <= 5; $i++) { echo $i . " "; } echo "<br><br>"; 
// Count by 2s echo "<p>Even numbers from 2 to 10:</p>"; for ($i = 2; $i <= 10; $i += 2) { echo $i . " "; } echo "<br><br>"; 
// Create a multiplication table echo "<p>Multiplication table for 5:</p>"; for ($i = 1; $i <= 10; $i++) { echo "5 × " . $i . " = " . (5 * $i) . "<br>"; } 

// echo "<h3>While Loop Example:</h3>"; $counter = 1; while ($counter <= 3) { echo "<p>While loop iteration: " . $counter . "</p>"; $counter++; }
// echo "<h3>Do-While Loop Example:</h3>"; $number = 1; do { echo "<p>Do-while iteration: " . $number . "</p>"; $number++; } while ($number <= 3); 
// echo "<h3>Foreach Loop Example:</h3>"; $colors = ["red", "green", "blue", "yellow"]; 
// echo "<p>My favorite colors:</p>"; foreach ($colors as $color) { echo "<span style='color: " . $color . "; margin-right: 10px;'>" . $color . "</span>"; } 

?>

<?php echo "<h3>For Loop Examples 2:</h3>";
"<p>Cycle through students</p>"; $students = ["Billy", "Bobby", "Greg", "William", "Manny"];
foreach ($students as $student) { echo " . $student . "; }