<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Link to the CSS file -->
</head>
<body>
    
<?php include './header.html'; ?>
<div class="container">
    <h2>Delete Student by NIC</h2>
    <form action="../php/delete.php" method="POST">
        <input type="text" name="nic" placeholder="Enter NIC" required>
        <button type="submit">Delete</button>
    </form>
</div>
<div class="table-wrapper">
  <?php include './table.html'; ?>
  </div>
<script src="../js/script.js"></script> <!-- Link to the JavaScript file -->
</body>

</html>