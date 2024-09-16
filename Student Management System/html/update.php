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
    <title>Update Page</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Link to the CSS file -->
</head>
<body>
<?php include 'header.html'; ?>
<div class="container">
    <h2>Update Student Details</h2>
    <form action="../php/update_action.php" method="POST">
        <input type="text" name="nic" placeholder="NIC (12 digits)" required>
        <input type="text" name="name" placeholder="New Name" >
        <input type="text" name="address" placeholder="New Address" >
        <input type="text" name="tel_no" placeholder="New Tel No" >
        <input type="text" name="course" placeholder="New Course" >
        <button type="submit">Update</button>
    </form>
</div>

<!-- Instructions Section -->
    <div class="instructions">
        <h3>How to Update Student Records</h3>
        <p>Follow these steps to update student details:</p>
        <ol>
            <li><strong>NIC (12 digits):</strong> Enter the NIC of the student you want to update. This field is required.</li>
            <li><strong>New Name:</strong> Enter the new name of the student. You may leave this field empty if you do not wish to update the name.</li>
            <li><strong>New Address:</strong> Enter the new address of the student. You may leave this field empty if you do not wish to update the address.</li>
            <li><strong>New Tel No:</strong> Enter the new telephone number of the student. You may leave this field empty if you do not wish to update the telephone number.</li>
            <li><strong>New Course:</strong> Enter the new course of the student. You may leave this field empty if you do not wish to update the course.</li>
            <li>After filling in the fields you want to update, click the <strong>Update</strong> button to save the changes.</li>
        </ol>
        <p>Ensure that you have the correct NIC before updating the record, as the NIC is used to identify the student record.</p>
    </div>
<script src="../js/script.js"></script> <!-- Link to the JavaScript file -->
</body>

</html>