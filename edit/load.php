<?php
    require_once('../dbconnect.php');

    $essay_id = $_GET['id'];
    $sql = "SELECT * FROM essays WHERE id='$essay_id'";
    $result = mysqli_query($conn, $sql);
    $essay = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $_SESSION['essay_id'] = $essay_id;
        echo $essay['body'];
    } else {
        echo "Error loading essay";
    }

    $edits = array();

    $sql2 = "SELECT * FROM edits WHERE essay_id='$essay_id'";
    $result2 = mysqli_query($conn, $sql2);

    while ($row = $result2->fetch_assoc()) {
        $edits[] = $row;
    }

    foreach ($edits as $edit) {?>
        <div class="comment" id=<?php echo $edit['uuid']?> >
            <?php echo $edit['edit'] ?>
        </div>
    <?php
    }
?>