<?php
require 'parts/function.php';
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">     <!-- язык контента -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">            <!-- Что бы работал для броузера IE  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- для мобильной версии размер -->
        <title>Подготовка к собеседованиею на php разрабочика</title>      <!-- Титульная страница -->
        <link href="css/style.css" rel="stylesheet">   <!-- Подключение Свои стили -->
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">     <!-- Подключение гуголсктх шрифтов -->
    </head>
    <body>
        <!-- подключаем навигацию -->
        <?php require 'parts/header.php'; ?>

        <!-- тело -->
        <div class="wrap">
            <div id="login">
                <div class="dog-nail"></div>
                <div class="item">
                    <form action="parts/login_backend.php" method="post">
                        <input type="email" class="email" name="email"  placeholder="Ведите имел" required>
                        <input type="password" class="password" name="password"  placeholder="Ведите пароль" required>
                        <input type="submit" class="button" name="send" value="логин">
                    </form>
                </div>
                <div class="dog-nail"></div>
            </div>
        </div>

        <!-- подвал -->
        <?php require 'parts/footer.php'; ?>
        </body>
</html>