<?php  include "./includes/db.php"  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3">Task Management </h1>
      <a href="create.php" class="btn btn-primary">+ Add New Task </a>
    </div>
    <table class="table table-hover table-bordered bg-white shadow-sm">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM tasks");

      if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['priority']; ?></td>
          <td>
            <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">View</a>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
      <?php
        endwhile;
      else:
      ?>
        <tr>
          <td colspan="5" class="text-center">No tasks found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
    </table>
  </div>
</body>
</html>