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
            <div id="add">
                <div class="item">
                    <form action="parts/add_backend.php" method="post">
                        <select class="type" name="type">
                            <option value="" selected>--------</option>
                            <option value="theory">Theory</option>
                            <option value="practice">Practice</option>
                        </select>
                        <input type="text" class="index" name="index"  placeholder="Keep the table of contents" >
                        <textarea  class="comment" name="comment" autofocus required >Write your post here</textarea>
                        <input type="submit" class="button" name="send" value="Send">
                    </form>
                </div>
            </div>
        </div>
        <!-- connection footer -->
        <?php require 'parts/footer.php'; ?>
    </body>
</html>