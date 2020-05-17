<?php
    require_once('../dbconnect.php');
    
    $essay_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $uuid = msqli_real_escape_string($conn, $_POST['uuid']);
    $pos = msqli_real_escape_string($conn, $_POST['pos']);
    $edit = msqli_real_escape_string($conn, $_POST['edit']);
    $date = gmdate('Y-m-d H:i:s');

    $sql = "INSERT INTO edits (essay_id, user_id, uuid, pos, edit) VALUES ('$essay_id', '$user_id', '$uuid', '$pos', '$edit', '$date')";

    mysqli_query($conn, $sql);
?>