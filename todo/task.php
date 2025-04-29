<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id='$user_id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tasks</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

<h3>Your Tasks:</h3>
<?php
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($task = $result->fetch_assoc()) {
        echo "<li>" . $task['task'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tasks assigned to you.</p>";
}
?>

<a href="add_tasks.php">Add New Task</a> |
<a href="logout.php">Logout</a>


</body>
</html>
