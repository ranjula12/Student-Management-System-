<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}


require_once '../php/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Page</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    
    <?php include './header.html'; ?> <!-- Include the header with navigation -->

    <div class="container">
        <h2>Add Student</h2>
        <form action="../php/register_one_student.php" method="POST">
            <input type="text" name="nic" placeholder="NIC" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="text" name="course" placeholder="Course" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
