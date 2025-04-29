<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Click here to login</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <h2>Register</h2>
    Username: <input type="text" name="username" required> <br><br>
    Password: <input type="password" name="password" required> <br><br>
    <input type="submit" value="Register">
</form>

<p>Already have an account? <a href="login.php">Login here</a></p>
