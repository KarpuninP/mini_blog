<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="меняем тут">
    <meta name="author" content="меняем тут">
    <meta name="generator" content="меняем тут">
    <title>меняем тут</title>
    <!--bootstrap-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <!--style-->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Подключение гуголсктх шрифтов -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>

<!-- верхушка сайта, оглавление, менюшка -->
<header>
    <div class="container">
        <div class="right-login">
            <a href="#" class="login" >login</a>
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
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">Тут название раздела типа теория</h2>
                <p class="lead text-muted">Описание этого раздела</p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light" >
        <div class="container">
            <!-- начало-->
            <form>
                <!-- выбр категории-->
                <label for="exampleKatList" class="form-label">Выбор категории</label>
                <select id="exampleKatList" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>-----</option>
                    <option value="1">Теория</option>
                    <option value="2">Практика</option>
                </select>
                <!-- выбр тем-->
                <!-- использовать js для выдачи списка как делалось в интернет магазин курс-->
                <label for="exampleDataList" class="form-label">Выбор тем</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Нажмите для поиска..." disabled>
                <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                </datalist>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Пишем тут свой пост" rows="7"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- второй кнопки для вкладке редактировать -->
                    <button type="submit" class="btn btn-outline-danger btn-sm me-md-2">Удалить</button>
                    <button type="submit" class="btn btn-dark btn-sm">отправить</button>
                </div>
            </form>
            <!-- конец-->
        </div>
    </div>


</main>

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

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>

