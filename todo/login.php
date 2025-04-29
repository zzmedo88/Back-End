<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $username;
        header("Location: task.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<form method="POST" action="">
    <h2>Login</h2>
    Username: <input type="text" name="username" required> <br><br>
    Password: <input type="password" name="password" required> <br><br>
    <input type="submit" value="Login" >
</form>

<a href="register.php">
    <button type="button">Sign Up</button>
</a>