<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (nic, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nic, $name, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: ../index.php"); // Redirect to login page after successful registration
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
