<?php
require_once './db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data from POST request
    $nic = isset($_POST['nic']) ? trim($_POST['nic']) : '';
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $tel_no = isset($_POST['tel_no']) ? trim($_POST['tel_no']) : '';
    $course = isset($_POST['course']) ? trim($_POST['course']) : '';

    // Input validation
    if (empty($nic)) {
        die('NIC is required.');
    }

    // Prepare the base query
    $query = "UPDATE students SET ";
    $params = [];
    $types = "";

    // Append fields to the query only if they are set
    if (!empty($name)) {
        $query .= "name = ?, ";
        $params[] = $name;
        $types .= "s";
    }
    if (!empty($address)) {
        $query .= "address = ?, ";
        $params[] = $address;
        $types .= "s";
    }
    if (!empty($tel_no)) {
        $query .= "tel_no = ?, ";
        $params[] = $tel_no;
        $types .= "s";
    }
    if (!empty($course)) {
        $query .= "course = ?, ";
        $params[] = $course;
        $types .= "s";
    }

    // Remove trailing comma and space
    $query = rtrim($query, ', ');

    // Append the WHERE clause
    $query .= " WHERE nic = ?";
    $params[] = $nic;
    $types .= "s";

    // Prepare the SQL query
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Error preparing the statement: ' . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param($types, ...$params);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../html/serch.php");
    } else {
        // Error handling
        echo "Error updating student details: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form was not submitted via POST
    die('Invalid request method.');
}
?>
