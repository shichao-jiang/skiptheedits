<?php
    require_once('../dbconnect.php');

    $essay_id = $_GET['id'];
    $sql = "SELECT * FROM essays WHERE id='$essay_id'";
    $result = mysqli_query($conn, $sql);
    $essay = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        echo $essay['body'];
    } else {
        echo "Error loading essay";
    }
?>