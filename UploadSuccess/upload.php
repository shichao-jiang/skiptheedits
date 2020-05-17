<?php

$servername = "35.203.5.122";
$username = "root";
$password = "harshilpicopenis123";
$db = "skiptheedits";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
	
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $desc = mysqli_real_escape_string($conn, $_POST['instructions']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
	
  $sql = "INSERT INTO essays (title, descrip, body) VALUES ('$title', '$desc', '$body')";
  mysqli_query($conn, $sql);

  header("Location: ../home/home.php");
}