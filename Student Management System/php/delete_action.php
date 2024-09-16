<?php
require_once './db.php'; 

// Check if the ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete query
    $query = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect to the main page after successful deletion
        header("Location: ../html/serch.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
} else {
    echo "Invalid ID.";
}

$stmt->close();
$conn->close();
?>
