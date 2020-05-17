<?php
    require_once('../dbconnect.php');
    
    $essay_id = $_SESSION['essay']['id'];
    $user_id = $_SESSION['user']['id'];
    $uuid = mysqli_real_escape_string($conn, $_POST['uuid']);
    $pos = mysqli_real_escape_string($conn, $_POST['pos']);
    $edit = mysqli_real_escape_string($conn, $_POST['edit']);
    $date = gmdate('Y-m-d H:i:s');

    $sql = "INSERT INTO edits (essay_id, userid, uuid, pos, edit) VALUES ('$essay_id', '$user_id', '$uuid', '$pos', '$edit')";

    if (mysqli_query($conn, $sql)) {
        
    } else {
        echo mysqli_error($conn);
    }
?>