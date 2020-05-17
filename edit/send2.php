<?php
    require_once('../dbconnect.php');
    
    $essay_id = $_SESSION['essay']['id'];
    $body = addslashes($_POST['text']);

    $sql = "UPDATE essays SET body='$body' WHERE id='$essay_id'";

    if (!mysqli_query($conn, $sql)) {
        echo mysqli_error($conn);
    }
?>