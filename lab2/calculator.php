<?php $result = ""; $num1 = ""; $num2 = ""; $operation = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { $num1 = $_POST["num1"] ?? ""; $num2 = $_POST["num2"] ?? ""; 
$operation = $_POST["operation"] ?? ""; if (is_numeric($num1) && is_numeric($num2)) 
    { switch ($operation) { case "add": $result = $num1 + $num2; break; case "subtract": $result = $num1 - $num2; break; case "multiply": $result = $num1 * $num2; break; case "divide": if ($num2 != 0) { $result = $num1 / $num2; } 
    else { $result = "Error: Division by zero!"; } break; default: $result = "Please select an operation"; } } 
    else { $result = "Please enter valid numbers"; } } ?> 

    <!DOCTYPE html> <html> <head> <title>Simple Calculator</title> <style> body { font-family: Arial, sans-serif; margin: 20px; } 
    .calculator { max-width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; } 
    .form-group { margin-bottom: 15px; } label { display: block; margin-bottom: 5px; } 
    input, select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; } 
    button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; } 
    .result { margin-top: 15px; padding: 10px; background-color: #f8f9fa; border-radius: 4px; } </style> </head> 
    <body> <h1>Simple Calculator</h1> <div class="calculator"> <form method="POST" action=""> <div class="form-group"> 
        <label for="num1">First Number:</label> <input type="number" id="num1" name="num1" value="<?php echo htmlspecialchars($num1); ?>" step="any"> </div> 
        <div class="form-group"> <label for="operation">Operation:</label> <select id="operation" name="operation"> <option value="">Select operation</option>

        <option value="add" <?php echo ($operation == "add") ? "selected" : ""; ?>>Add (+)</option> 
        <option value="subtract" <?php echo ($operation == "subtract") ? "selected" : ""; ?>>Subtract (-)</option> 
        <option value="multiply" <?php echo ($operation == "multiply") ? "selected" : ""; ?>>Multiply (×)</option> 
        <option value="divide" <?php echo ($operation == "divide") ? "selected" : ""; ?>>Divide (÷)</option> </select> </div>

    <div class="form-group"> <label for="num2">Second Number:</label> 
        <input type="number" id="num2" name="num2" value="<?php echo htmlspecialchars($num2); ?>" step="any"> </div> 
        <button type="submit">Calculate</button> </form> <?php if ($result !== ""): ?> 
            <div class="result"> <strong>Result: </strong><?php echo htmlspecialchars($result); ?> </div> 
            <?php endif; ?> </div>

                <label for="num1">First Number:</label> <input type="number" id="num1" name="num1" value="<?php echo htmlspecialchars($num1); ?>" step="any"> </div> 
        
    <label for="question1">Question 1</label>  
        <div class="form-group"> <label for="operation">Operation:</label> <select id="operation" name="operation"> <option value="">Select operation</option>
    <div class="form-group"> <label for="operation">Operation:</label> <select id="operation" name="operation"> <option value="">Select operation</option>

    <option value="add" <?php echo ($operation == "add") ? "selected" : ""; ?>>Add (+)</option> 
    <option value="subtract" <?php echo ($operation == "subtract") ? "selected" : ""; ?>>Subtract (-)</option> 
    <option value="multiply" <?php echo ($operation == "multiply") ? "selected" : ""; ?>>Multiply (×)</option> 
    <option value="divide" <?php echo ($operation == "divide") ? "selected" : ""; ?>>Divide (÷)</option> </select> </div> </body> </html>