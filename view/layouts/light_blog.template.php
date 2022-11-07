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
    <body>

    <!-- верхушка сайта, оглавление, менюшка -->
        <header>
            <div class="container">
                <div class="right-login">
                    <!-- откроется модальное окно / использовать js -->

                    <?php if (!isset($_SESSION['isLogin'])) { ?>
                        <a href="" class="login" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sign in/up</a>
                    <?php } else { ?>

                        <a href="/sign/logOut" class="login" ><span style="color: #dc3545"><?= $_SESSION['isLogin'];?> </span>Выйти</a>
                    <?php } ?>
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
                                    <a class="nav-link" href="/">Теория</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=PATH;?>practice">Практика</a>
                                </li>
                                <?php if (isset($_SESSION['isLogin'])) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=PATH;?>add">Добавить</a>
                                    </li>
                                <?php } ?>
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
                            <a href="https://www.linkedin.com/in/pasha-karpunin-php-developer/" >Linked In</a>
                            <a href="https://drive.google.com/file/d/1kFFqk3jLNddWAl8uNWE3x1n01AZZ581-/view?usp=sharing" >Резюме</a>
                            <a href="https://github.com/KarpuninP" >Git</a>
                            <a href="https://t.me/Amedomaro" >Telegram</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- модальное окно старт-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" ></h5>
                        <button type="button"  class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-text"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close"  data-bs-dismiss="modal" >Close</button>
                            <div class="button-modal"</div>

                        </div>
                </div>
            </div>
        </div>
        <!-- модальное окно конец-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>


