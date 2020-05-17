<?php 
function custom_echo($x, $length)
{
    if(strlen($x)<=$length) {
        echo $x;
    }
    else {
        $y=substr($x,0,$length) . '...';
        echo $y;
    }
}
?>

<?php foreach ($essay as $essays): ?>
    <div class="content tile">
        <p class="essayname"><?php echo $essays['title'] ?></p>
        <div class="preview">
            <?php custom_echo($essays['body'], 900);  ?>
        </div>
        <div class="desc">
            <p class="essaytitle"><?php echo $essays['title'] ?></p>
            <p class=""><?php echo $essays['descrip'] ?></p>
            <div class="buttonbar">
                <a href="../view?id=<?php echo $essays['id'] ?>">View</a>
                <a href="../edit?id=<?php echo $essays['id'] ?>">Edit</a>
            </div>
        </div>
    </div>
<?php endforeach ?>