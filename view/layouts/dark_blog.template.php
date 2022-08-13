<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Ф.И.О., E-Mail создателя сайта-->
    <meta name="author" content="<?=$params['meta_author'];?>">
    <!--авторских прав, информация о Вашей фирме и тд-->
    <meta name="copyright" Content="<?=$params['meta_copyright'];?>">
    <!--- описывается средство, с помощью которого была создана данная страница.-->
    <meta name="generator" content="<?=$params['meta_generator'];?>">
    <!--вставляем title/description/keywords-->

    <!--bootstrap-->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <!--style-->
     <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
     <!-- Подключение гуголсктх шрифтов -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body style="background-color: #808080">

<!-- верхушка сайта, оглавление, менюшка -->
<header>
    <div class="container">
        <div class="right-login">
            <!-- откроется модальное окно / использовать js -->
            <a href="#" class="login" >Sign in/up</a>
        </div>

        <h1>Подготовка к собеседованию на PHP разработчика</h1>


        <nav class="navbar navbar-expand-lg nav-user">
            <div class="container-fluid">
                <a class="navbar-brand .logo">
                    <img src="/pic/php-brands.png" alt="logo"  class="d-inline-block align-text-top img-user">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Теория</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Практика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Добавить</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- середина, она и будет менятся-->
<?=$content;?>

<!-- Подвал -->
<footer>
    <div class="navbar-fixed-bottom row-fluid bg-dark p">
        <div class="navbar-inner">
            <div class="container-fluid ">
                <div class="container d-flex justify-content-evenly" >
                    <a href="#" >Об авторе</a>
                    <a href="#" >Резюме</a>
                    <a href="#" >Git</a>
                    <a href="#" >Контакты</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>


