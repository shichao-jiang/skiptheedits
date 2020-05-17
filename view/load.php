<?php 
    require_once('../dbconnect.php');

    $edits = array();
    
    $essay_id = $_GET['id'];
    $sql = "SELECT * FROM edits WHERE essay_id='$essay_id'";
    $result = mysqli_query($conn, $sql);

    while ($row = $result->fetch_assoc()) {
        $edits[] = $row;
    }

    foreach ($edits as $edit) {?>
        <div class="comment" id=<?php echo $edit['uuid']?> style="top:<?php echo $edit['pos']?>px">
            <?php echo $edit['edit'] ?>
        </div>
    <?php
    }
?>