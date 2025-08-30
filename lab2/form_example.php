<?php // Initialize variables 
$name = ""; $email = ""; $message = ""; $errors = []; 
// Check if form was submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// Get form data 
$name = trim($_POST["name"] ?? ""); $email = trim($_POST["email"] ?? ""); $message = trim($_POST["message"] ?? ""); 
// Validate input 
if (empty($name)) { $errors[] = "Name is required"; } if (empty($email)) { $errors[] = "Email is required"; } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Invalid email format"; } if (empty($message)) { $errors[] = "Message is required"; } 
// If no errors, process the form 
if (empty($errors)) { $success = "Thank you for your message, " . htmlspecialchars($name) . "!"; 
// Reset form 
$name = $email = $message = ""; } } ?> 

<!DOCTYPE html> <html> <head> <title>Contact Form</title> 
<style> body { font-family: Arial, sans-serif; margin: 20px; } 
.form-group { margin-bottom: 15px; } label { display: block; margin-bottom: 5px; font-weight: bold; } 
input[type="text"], input[type="email"], textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; } 
button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; } 
.error { color: red; margin-bottom: 10px; } .success { color: green; margin-bottom: 10px; } </style> </head> <body> <h1>Contact Form</h1> 

<?php if (!empty($errors)): ?> <div class="error"> <strong>Please fix the following errors:</strong> <ul> 
    <?php foreach ($errors as $error): ?> <li>
        <?php echo htmlspecialchars($error); ?></li> <?php endforeach; ?> </ul> </div> <?php endif; ?> 
        <?php if (isset($success)): ?> <div class="success"> <?php echo htmlspecialchars($success); ?> </div> 
            <?php endif; ?> <form method="POST" action=""> <div class="form-group"> <label for="name">Name:</label> 
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>"> </div> 
            <div class="form-group"> <label for="email">Email:</label> 
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"> </div> 
            <div class="form-group"> <label for="message">Message:</label> <textarea id="message" name="message" rows="4">
                <?php echo htmlspecialchars($message); ?></textarea> </div> <button type="submit">Send Message</button> </form> </body> 
                </html>