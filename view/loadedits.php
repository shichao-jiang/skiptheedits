<?php
    require_once('../dbconnect.php');

    $edits = array();

    $essay_id = $_SESSION['essay']['id'];
    $sql = "SELECT * FROM edits WHERE essay_id='$essay_id'";
    $result = mysqli_query($conn, $sql);

    while ($row = $result->fetch_assoc()) {
        $edits[] = $row;
    }

    echo json_encode($edits);
?>