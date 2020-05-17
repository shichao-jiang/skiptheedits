<?php foreach ($essay as $essays): ?>
    <div class="content tile">
        <p class="essayname"><?php echo $essays['title'] ?></p>
        <div class="preview">
            <?php echo $essays['body'] ?>
        </div>
        <div class="desc">
            <p class="essaytitle"><?php echo $essays['title'] ?></p>
            <p class=""><?php echo $essays['descrip'] ?></p>
            <div class="buttonbar">
                <a href="../view/view.php?id=<?php echo $essays['id'] ?>">View</a>
                <a href="../edit/edit.php?id=<?php echo $essays['id'] ?>">Edit</a>
            </div>
        </div>
    </div>
<?php endforeach ?>