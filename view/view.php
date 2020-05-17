<?php
    require_once('../dbconnect.php');
    require_once('../logincheck.php');
    include_once('load.php');
?>

<html>
    <title>Edit an Essay</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="../default.css">
    <script src='view.js'></script>
</head>
<body id="body" style="background-color: rgb(250, 250, 250)" onload="loadedits()">
    <?php include_once "../header/header.html" ?>
    <div id="header-secondary"><h1>Editor Module</h1></div>
    <div id="containerLeft">
        <h1><?php echo $_SESSION['essay']['title'] ?></h1>
        <div id="editor">
            <?php echo $_SESSION['essay']['body'] ?>
        </div>
    </div>
</body>
</html>