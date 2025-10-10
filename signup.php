<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$hashed = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed')";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Signup Successful!'); window.location.href='login.html';</script>";
} else {
  echo "<script>alert('Error: Username or Email already exists'); window.location.href='signup.html';</script>";
}
$conn->close();
?>