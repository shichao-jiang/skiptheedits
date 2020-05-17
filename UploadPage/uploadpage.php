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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
</head>
<body>
<div>
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