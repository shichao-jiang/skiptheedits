<html>
<head>
    <title>Edit an Essay</title>
    <script src="edit.js"></script>
    <link rel="stylesheet" href="edit.css">
</head>
<body style="background-color: rgb(250, 250, 250)">
    <div id="editor" onmouseup="popup(event)">
        <?php include_once('file.php') ?>
    </div>
    
    <div id="popup" class="hidden">
        <button onclick="edit(0)">&times;</button>
        <button onclick="edit(1)" style="background-color:yellow">pp</button>
    </div>
</body>
</html>