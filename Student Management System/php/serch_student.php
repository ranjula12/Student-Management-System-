<?php
require_once './db.php';

// Initialize search query
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

// Prepare and execute the search query
$query = "SELECT * FROM students WHERE nic LIKE ? OR name LIKE ?";
$stmt = $conn->prepare($query);

// Check if the query preparation was successful
if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}

$searchTerm = "%{$searchQuery}%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();

// Check for errors in the execution
if ($stmt->error) {
    die("Query execution failed: " . $stmt->error);
}

$students = $stmt->get_result();

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php include '../html/header.html'; ?> 

  <div class="container">
    <h1>Search Results</h1>

    <!-- Search Form -->
    <form id="searchForm" action="../html/serch.php" method="post">
      <input type="text" name="searchQuery" id="searchQuery" placeholder="Enter student NIC or Name" value="<?php echo htmlspecialchars($searchQuery); ?>">
      <button type="submit">Search</button>
    </form>
  </div>

  <div class="table-wrapper">
    <h1>Search Results</h1>
    <table class="table-wrapper">
      <thead>
        <tr>
          <th>NIC</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Course</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($students->num_rows > 0): ?>
          <?php while ($row = $students->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['nic']); ?></td>
              <td><?php echo htmlspecialchars($row['name']); ?></td>
              <td><?php echo htmlspecialchars($row['address']); ?></td>
              <td><?php echo htmlspecialchars($row['tel_no']); ?></td>
              <td><?php echo htmlspecialchars($row['course']); ?></td>
              <td>
                <a href="./delete_action.php?id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6">No students found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script src="../js/script.js"></script>
</body>
</html>
