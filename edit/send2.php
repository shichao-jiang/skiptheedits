<?php
    require_once('../dbconnect.php');
    
    $essay_id = $_SESSION['essay']['id'];
    $body = $_POST['text'];

    $sql = "UPDATE essays SET body='$body' WHERE id='$essay_id'";

    if (mysqli_query($conn, $sql)) {
        
    } else {
        echo mysqli_error($conn);
    }
?>