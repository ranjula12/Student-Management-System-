<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ./html/home.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <button id="modeToggle" onclick="toggleMode()">Dark Mode</button>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="./php/register_action.php">
            <input type="text" name="nic" placeholder="NIC" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="./index.php">Login here</a></p>
    </div>
</body>
</html>
