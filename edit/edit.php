<html>
    <title>Edit an Essay</title>
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="../default.css">
</head>
<body id="body" style="background-color: rgb(250, 250, 250)">
    <?php include_once "../header/header.html" ?>
    <div id="header-secondary"><h1>Editor Module</h1></div>
    <div id="editor" onmouseup="popup(event)">
        <?php include_once('file.php') ?>
    </div>
    <div id="popup" class="hidden">
        <button onclick="edit(0); display()">&times;</button>
        <button onclick="edit(1); display()" style="background-color:yellow">pp</button>
    </div>
    <script src="edit.js"></script>
</body>
</html>