<?php
    $msg = "";
    if (isset($_POST['upload'])) {
        $target = "../skiptheedits/".basename($_FILES['document']['name']);

        $document = $_FILES['document']['name'];

        if (move_uploaded_file($_FILES['document']['tmp_name'], $target)) {
            $msg = "image uploaded";
        }else {
            $msg = "error";
        }
    }
    include($_SERVER['DOCUMENT_ROOT'].'/skiptheedits/skiptheedits/header/header.html');
?>

<!DOCTYPE html>
<html lang="en">
<link href="uploadpage.css" rel="stylesheet" type="text/css">
<link href="../default.css" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.jpg">
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
<header id='#header-main'></header>
<body>
<header id='header-secondary'>
    <h1>
    TEXT GORES HERE
    </h1>    
</header>    
<div class="main">
    <form action="uploadpage.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="size" value="100000">
        <div>
            <input type="file" name="document">
        </div>
        <div>
            <input type="submit" name="upload" value="upload doc">
        </div>
    </form>
    <form action="fileconversion.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="filename" value="<?php echo $_FILES['document']['name']?>">
        <input type="submit" name="continue" value="preview doc">
    </form>
</div>
</body>
</html>