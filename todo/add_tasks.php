<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tasks (user_id, task) VALUES ('$user_id', '$task_name')";

    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully! <a href='task.php'>View Tasks</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <h2>Add New Task</h2>
    Task Name: <input type="text" name="task_name" required> <br><br>
    <input type="submit" value="Add Task">
</form>

<p><a href="task.php">Back to Task List</a></p>
