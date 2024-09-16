<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../php/db.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id); 
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <?php include './header.html'; ?>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
        <p>Your NIC: <?php echo htmlspecialchars($user['nic']); ?></p>
        <a href="./registration.php" class="btn">Register New Student</a>
        <a href="../php/logout_action.php" class="btn">Logout</a>
    </div>
    <div class="welcome-note">
    <h2>Welcome to the Student Management System</h2>
    <p>We are glad to have you here. You can manage student records, update details, and perform various administrative tasks.</p>
    <p>Use the navigation links to explore different features of the system. If you need any assistance, please refer to the user guide or contact support.</p>
    </div>
    <script src="../js/script.js"></script> <!-- Link to the JavaScript file -->
</body>
</html>
