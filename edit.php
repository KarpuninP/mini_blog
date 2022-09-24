<?php
// connection helper function
require 'parts/function.php';
require 'parts/getUrlEdit.php';
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
            <div id="add">
                <div class="item">
                    <form action="parts/edit_backend.php" method="post">
                        <select class="type" name="type">
                            <option value="<?= "$editArray[type]" ;?>" selected><?= "$nameType" ;?></option>
                        </select>
                        <!-- hide number id -->
                        <input type="hidden" name="postId" value="<?= "$number" ;?>">
                        <textarea  class="index" name="index"  ><?= "$editArray[index]" ;?></textarea>
                        <textarea  class="comment" name="comment" autofocus required ><?= "$editArray[comment]" ;?></textarea>
                        <div class="button-block">
                            <input type="submit" class="button" name="send" value="Send">
                            <input type="submit" class="button" name="delete" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- connection footer -->
        <?php require 'parts/footer.php'; ?>
    </body>
</html>