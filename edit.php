<?php
// Подключаем файлы
require 'parts/function.php';
require 'parts/getUrlEdit.php';
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
            <div id="add">
                <div class="item">
                    <form action="parts/edit_backend.php" method="post">
                        <select class="type" name="type">
                            <option value="<?= "$editArray[type]" ;?>" selected><?= "$nameType" ;?></option>
                        </select>
                        <input type="hidden" name="postId" value="<?= "$number" ;?>">         <!-- скрытая отправка от пользователя, какой номер поста -->
                        <textarea  class="index" name="index"  ><?= "$editArray[index]" ;?></textarea>
                        <textarea  class="comment" name="comment" autofocus required ><?= "$editArray[comment]" ;?></textarea>
                        <div class="button-block">
                            <input type="submit" class="button" name="send" value="Отправить">
                            <input type="submit" class="button" name="delete" value="Удалить">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- подвал -->
        <?php require 'parts/footer.php'; ?>
    </body>
</html>