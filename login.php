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
            <div id="login">
                <div class="dog-nail"></div>
                <div class="item">
                    <form action="parts/login_backend.php" method="post">
                        <input type="email" class="email" name="email"  placeholder="Write an email" required>
                        <input type="password" class="password" name="password"  placeholder="Enter password" required>
                        <input type="submit" class="button" name="send" value="login">
                    </form>
                </div>
                <div class="dog-nail"></div>
            </div>
        </div>
        <!-- connection footer -->
        <?php require 'parts/footer.php'; ?>
        </body>
</html>