<?php
    include_once '../server.php';
    include_once '../logincheck.php';

    if (!isset($_GET['sort'])) {
        header('location: ../home/?sort=newest');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta enctype="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit an Essay</title>
    <link href="../default.css" rel="stylesheet"/>
    <link href="../header/header.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet"/>
    <link href="../modal.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../favicon.jpg">
</head>
<body>
    <?php include_once "../header/header.html" ?>
    <header id="header-secondary">
        <h1>Edit an Essay</h1>
        <h2><?php echo $count . " Essays found" ?></h2>
    </header>
    <div class="rows">
        <div class="col-5">
            <div class="content" id="search-box">
                <p class="boxtitle">Search Essays</p>
                <span id="searchbar">
                    <input type="text" id="searchinput" placeholder="Search...">
                    <span id="searchbutton" onclick=""><img src="../img/search-icon.png"></span>
                </span>
                <a class="button" onclick="">Filter</a>
            </div>
        </div>
        <div class="col-15" style="padding:0">
            <div id="menubar">
                <h3>All Essays</h3>
                <span><a href="../home/?sort=newest" id="newest">Newest</a></span>
            </div>
            <div id="essays">
                <?php require_once 'loadessays.php' ?>
                <a class="tile empty"></a>
                <a class="tile empty"></a>
            </div>
        </div>
    </div>
</body>
<script src="home.js"></script>
<?php
echo '
    <script>
        var target = "' . $_GET['sort'] . '";' . '
        document.getElementById(target).classList.add("active");
    </script>';
?>
</html>