<?php
// connection helper function
require 'parts/function.php';
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preparing for a PHP Developer Interview</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- connection navigation -->
        <?php require 'parts/header.php'; ?>
        <!-- body -->
        <div class="wrap">
            <div class="list">
                <?php foreach ($dataTheory as $key => $value) { ?>
                <div class="item">
                    <div class="index">
                        <h2><?= $value['index']; ?></h2>
                    </div>
                    <div class="post">
                        <span>
                            <?= $value['comment']; ?>
                        </span>
                    </div>
                    <div class="edit">
                        <a href="edit.php?number=<?= $value['id']; ?>&theme=theory " ><?= "$edit" ;?></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- connection footer -->
        <?php require 'parts/footer.php'; ?>
    </body>
</html>

