<?php
    require_once('../dbconnect.php');
    require_once('../logincheck.php');
    $msg = "";
    if (isset($_POST['upload'])) {
        $target = "../".basename($_FILES['document']['name']);

        $document = $_FILES['document']['name'];

        if (move_uploaded_file($_FILES['document']['tmp_name'], $target)) {
            $msg = "image uploaded";
        }else {
            $msg = "error";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta enctype="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload an Essay</title>
    <link href="uploadpage.css" rel="stylesheet" type="text/css">
    <link href="../default.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/jpg" href="../favicon.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
</head>
<body>
    <?php include_once "../header/header.html" ?>
    <header id='header-secondary'>
        <h1>UPLOAD A FILE</h1>
    </header>
    <div class="main">
        <div class="inputsec"> 
            <form action="uploadpage.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="size" value="100000">
                <div class="fileupload">
                <label class="inputfile" >
                Browse...
                    <input type="file"  name="document">
                </label>
                    <input type="submit" class="submitbuttons" name="upload" value="UPLOAD FILE">
                </div>
            </form>
            <form action="../UploadPreview/fileconversion.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="filename" value="<?php echo $_FILES['document']['name']?>">
                <input type="submit" class="submitbuttons" id="continue" name="continue" value="PREVIEW DOCUMENT">
            </form>
        </div>
    </div>
</body>
</html>