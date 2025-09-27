<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Includes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<!--
Includes allow for cleaner code, as all you have to do is link the file its contained in.
Variable Scope: variables inside of functions can only be used inside the function, while global variables can always be accessed.
I used DRY with include, instead of repeating the function/header/footer code in test.php, I can just link that code with include to both.
-->
<body>
    <p>Header:</p>
    <?php include 'includes/header.html.php'; ?>
    <p>Math:</p>
    <?php include 'mathFunctions.php'; ?>
    <p>Footer:</p>
    <?php include 'includes/footer.html.php'; ?>
</body>
</html>