<?php include "./includes/db.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO tasks (title, description, status, priority, due_date, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $description, $status, $priority, $due_date, $created_at, $updated_at);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Add New Task</h2>
    <form class="bg-white p-4 rounded shadow-sm" method="POST">
      <div class="row g-3">
        <div class="col-md-12">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" required>
        </div>

        <div class="col-md-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="col-md-6">
          <label class="form-label">Status</label>
          <select name="status" class="form-select" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Priority</label>
          <select name="priority" class="form-select" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Due Date</label>
          <input type="date" name="due_date" class="form-control" required>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Task</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
