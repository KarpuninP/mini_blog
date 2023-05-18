<!doctype html>
<html lang="en">
<head>
    <!-- подключение meta атрибуты к WP -->
    <meta charset="<?php bloginfo('charset');  ?>">
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <meta name="description" content="меняем тут">-->
<!--    <meta name="author" content="меняем тут">-->
<!--    <meta name="generator" content="меняем тут">-->
    <title><?= wp_get_document_title(); ?></title>


    <!-- подключение скриптов, css, js и прочие функции  к WP -->
    <?php wp_head();?>
</head>
<body>

<!-- верхушка сайта, оглавление, менюшка -->
<header>
    <div class="container">
        <div class="right-login">
            <?php
            // Проверяет пользователь залогирован, если нет то выводит кнопку залогинится
                if (is_user_logged_in()) {
                // Получаем все про текушего пользователя
                    $current_user = wp_get_current_user();

                    ?>
                    <div class="card mb-3 border-0 login-style">
                        <div class="row g-0 ">
                            <div class="col-md-4 ">
<!--  Получаем фотку пользователя -->
                                <div class="img-user d-flex  align-items-center">
                               <?= get_avatar($current_user->user_email, 65);?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <!--  Получаем имя пользователя  -->
                                    <h6 class="card-title">Greetings <?= $current_user->display_name; ?></h6>
                                    <!--  Сылка в админ панель (консоль WP) -->
                                    <a href="<?= admin_url('index.php'); ?>">
                                        <small class="text-body-secondary">Console</small>
                                    </a>
                                    <!--  Выйти из акаунта (редирект на главную страницу) -->
                                    <a href="<?= wp_logout_url(home_url()); ?>" >
                                        <small class="text-body-secondary">Log-out</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    // сылка на логирование открытие модального окна
                    echo "<a href=\"\" class=\"login\" data-bs-toggle=\"modal\" data-bs-target=\"#signIn\">Sign in</a>";
                }
            ?>

        </div>
        <!-- Вывод кастумного слогана-->
        <h1><?= get_option('ph_option_field_topic'); ?></h1>


        <nav class="navbar navbar-expand-lg nav-user">
            <div class="container-fluid">
                <a class="navbar-brand .logo">
                    <?php
                    // получаем ссылку на логотип
                    $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
                    ?>
                    <!-- вставляем этот логотип для отображение -->
                    <img src="<?= $custom_logo__url[0]; ?>" alt="logo"  class="d-inline-block align-text-top img-user">
                </a>


                <?php
                // формируем меню что бы добавить классы
                $locations = get_nav_menu_locations();
                // тут 2 id с масивами названием меню что у нас указано в админке (menu-footer и menu-header)
//                var_dump($locations);
                $menu_id = $locations['menu-header'];
                // Получает элементы меню навигации в виде массива. И сортируем его по возрастанию
                // 'orderby' => 'menu_order' -- сортировка по позиции которые указаны в админке. Подробно тут
                //  https://wp-kama.ru/function/wp_get_nav_menu_items
                $menu_items = wp_get_nav_menu_items($menu_id, [
                    'order'=> 'ASC',
                    'orderby' => 'menu_order'
                ]);
                // Выдаст обьекты с параметрами сылки. Самое главное это url и "title"
//                var_dump($menu_items);
                ?>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        // проходимся циклом
                            foreach ($menu_items as $item):
                        ?>
                            <!-- подставляем  -->
                            <li class="nav-item">
                                <!-- подставляем даные которые получили из масива -->
                                <a class="nav-link" href="<?= $item->url; ?>"><?= $item->title; ?></a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>