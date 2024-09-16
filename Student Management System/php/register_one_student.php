<?php
// Include the database connection file
require_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Prepare the SQL query to insert the new student
    $stmt = $conn->prepare("INSERT INTO students (nic, name, address, tel_no, course) VALUES (?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("sssss", $nic, $name, $address, $phone, $course);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to a confirmation or success page
        header("Location: ../html/serch.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form wasn't submitted, redirect back to the form page
    header("Location: ../html/registration.php");
    exit();
}
?>
