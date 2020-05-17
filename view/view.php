<?php
    require_once('../dbconnect.php');
    require_once('../logincheck.php');
    include_once('load.php');
?>

<html>
    <title>Edit an Essay</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="../default.css">
</head>
<body id="body" style="background-color: rgb(250, 250, 250)">
    <?php include_once "../header/header.html" ?>
    <div id="header-secondary"><h1>Editor Module</h1></div>
    <div id="containerLeft">
        <h1><?php echo $_SESSION['essay']['title'] ?></h1>
        <div id="editor" onmouseup="popup(event)">
            <?php echo $_SESSION['essay']['body'] ?>
        </div>
    </div>
    <?php
        $edits = array();
    
        $sq2 = "SELECT * FROM edits WHERE essay_id='$essay_id'";
        $result2 = mysqli_query($conn, $sq2);
    
        while ($row = $result2->fetch_assoc()) {
            $edits[] = $row;
        }
    
        foreach ($edits as $edit) {?>
            <div class="comment" id=<?php echo $edit['uuid']?> style="top:<?php echo $edit['pos']?>px; left:calc(50% + 21rem)">
                <?php echo $edit['edit'] ?>
            </div>
        <?php
        }
    ?>
    <script src="edit.js"></script>
</body>
</html>