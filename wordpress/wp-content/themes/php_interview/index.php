<!-- подключаем хедер  -->
<?php
get_header();
// Делаем проверку на главную страницу, если не главная страница то запускаем все остальное
if(is_home()):
//  Получаем теги категорий
    $theoryCategory = get_terms([
        'taxonomy' => 'theory_category',
        'order' => 'ASC',
        'orderby' => 'slug'
    ]);
//var_dump($theoryCategory);
// Получаем из бд какая сейчас страница
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
//var_dump($paged);
// Получаем из гет параметров наименование категории
$theoryCategoryUrl = (isset($_GET['category'])) ? $_GET['category'] : '';
//var_dump($theoryCategoryUrl);
// Формируем запрос в бд
    $args = [
        'numberposts' => -1,  //  Указываем что выводить все записи
        'post_type' => 'theory',   //  тип записи у нас будет карты (он кастумный, находится в боковой панели, это таксономия)
        'theory_category' => $theoryCategoryUrl,   // Наименование категории
        'orderby' => 'meta_value_num',  // сортируем по этому полю, что бы сортировался по числу
        'order' => 'ASC' , // способ сортировки по возрастанию
        'posts_per_page' => 10, // Сколько посто будет выведено на страницу
        'paged' => $paged  // какая страница выьрана
    ];
    // Запрос в бд
    $theoryQuery = new WP_Query($args);
//    var_dump( $theoryQuery->get_posts());

?>

    <!-- середина, она и будет менятся-->
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <?php
                    // вывод темы страници и описание через виджет
                        if ( is_active_sidebar( 'ph-description-section-theory' ) ) { // Проверяем, есть ли виджеты в текущем столбце
                        dynamic_sidebar( 'ph-description-section-theory' ); // Выводим виджеты из текущего столбца
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- карусель -->
        <div class="container center">
            <div class="carousel-container ">
                <div class="carousel-track">
<!--  Тут карусель из категорий(тем). Проходимся циклом и подставляем, а дальше через js делаем безконечное движение  -->
                    <?php $arr = []; foreach ($theoryCategory as $cat):
                        $arr[$cat->slug] = $cat->name;
                        ?>
                    <a class="carousel-block" href="?category=<?= $cat->slug;?>"> <?= $cat->name;?> </a>
                     <?php endforeach;?>
                </div>
            </div>
        </div>


<!--   проверяем есть ли пост, если есть Запуск стандартного цикла wp-->
        <?php if ($theoryQuery->have_posts()) :?>
        <div class="album py-5 bg-light" >
            <div class="container">
                <!-- начало-->
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- огловление-->
                    <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                        <p class="navbar-brand">
<!--  Вставляем выбраную категорию, сперва проверяем что она есть, если ее нет то выводим  'All themes'  -->
                           <?php echo $theoryCategoryUrl == '' ? 'All themes' : $arr[$theoryCategoryUrl]; ?>
                        </p>
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <!-- меню-->
                                    <?php
                                    // Задаем стандартный цикл и задаем данные, где $i=1 это для id что бы он мог найти
                                    $i=1;
                                    while ($theoryQuery->have_posts()) : $theoryQuery->the_post();
                                    ?>
                                    <li><a class="dropdown-item" href="#scrollspyHeading<?= $i ?>"><?php the_title(); ?></a></li>
                                    <?php
                                        $i++;
                                        endwhile;
                                    ?>
                                    <!-- пролист в низ-->
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#scrollspyHeadingDown">Перейти в низ</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- тело сообшение-->
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                        <?php
                        $i=1;
                        while ($theoryQuery->have_posts()) : $theoryQuery->the_post();
                        ?>
                            <h4 id="scrollspyHeading<?= $i ?>"><?php   the_title(); ?></h4>
                            <p><?php the_content(); ?></p>

                        <?php
                            $i++;
                            endwhile;
                        ?>
                        <h4 id="scrollspyHeadingDown"></h4>
                    </div>
                </div>
                <!-- конец-->
            </div>
        </div>

            <?php

        endif;

        // Выводим пагинацию
        $pagination = paginate_links([
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
        'type' => 'array',
        'format' => '?&page=%#%',  // указываем как будет выводится get параметр, это параметр зарезервирован wp
        'current' => max(1, get_query_var('page')),
        'total' => $theoryQuery->max_num_pages, // сколько всего страниц
        'end_size'     => 1, // крайнии по одной выводить
        'mid_size'     => 3 // середину 3 выводить, это если много страниц
        ]);


//var_dump($pagination);
        // подставляем пагинацию и проходимся по циклу
        if (!empty($pagination)) {
        echo '<div class="pagination-container"><ul class="pagination">';
                foreach ($pagination as $link) {
                    $selected = isset($_GET['selected']) && $_GET['selected'] == $i + 1; // Проверяем, выбрана ли кнопка
                    echo '<li class="page-item' . ($selected ? ' aria-current="page"' : '') . '">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                }
                echo '</ul></div>';
        }



        // Восстанавливаем оригинальный запрос, чтобы не нарушать работу других циклов на странице
        wp_reset_postdata();
        ?>

        <!-- Поднятся в верх -->
        <div class="position-relative text-user">
            <p class="position-absolute bottom-0 end-0">
                <a  href="#">Up</a>
            </p>
        </div>
    </main>
<?php
// Эта страница будет практика. Все тоже самое только меняем ярлык на practice
else:
//  Получаем теги категорий
    $practiceCategory = get_terms([
    'taxonomy' => 'practice_category',
    'order' => 'ASC',
    'orderby' => 'slug'
    ]);
    //var_dump($practiceCategory);
// Получаем из бд какая сейчас страница
    $page =  get_query_var('paged') ? get_query_var('paged') : 1;
    //var_dump($page);
// Получаем из гет параметров наименование категории
    $practiceCategoryUrl = (isset($_GET['category'])) ? $_GET['category'] : '';
    //var_dump($practiceCategoryUrl);
    $args = [
    'numberposts' => -1,  //  Указываем что выводить все записи
    'post_type' => 'practice',   //  тип записи у нас будет карты (он кастумный, находится в боковой панели, это таксономия)
    'practice_category' => $practiceCategoryUrl,
    'orderby' => 'meta_value_num',  // сортируем по этому полю, что бы сортировался по числу
    'order' => 'ASC' , // способ сортировки по возрастанию
    'posts_per_page' => 10,
    'paged' => $page
    ];

    $practiceQuery = new WP_Query($args);
    //    var_dump( $practiceQuery->get_posts());
    ?>

    <!-- середина, она и будет менятся-->
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <?php
                    if ( is_active_sidebar( 'ph-description-section-practice' ) ) { // Проверяем, есть ли виджеты в текущем столбце
                        dynamic_sidebar( 'ph-description-section-practice' ); // Выводим виджеты из текущего столбца
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- карусель -->
        <div class="container center">
            <div class="carousel-container ">
                <div class="carousel-track">
                    <?php $arr = []; foreach ($practiceCategory as $cat):
                        $arr[$cat->slug] = $cat->name;
                        ?>
                        <a class="carousel-block" href="?category=<?= $cat->slug;?>"> <?= $cat->name;?> </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php
        if ($practiceQuery->have_posts()) :

            ?>
            <div class="album py-5 bg-light" >
                <div class="container">
                    <!-- начало-->
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <!-- огловление-->
                        <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                            <p class="navbar-brand">
                                <?php echo $practiceCategoryUrl == '' ? 'All themes' : $arr[$practiceCategoryUrl]; ?>
                            </p>
                            <ul class="nav nav-pills">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                                    <ul class="dropdown-menu">
                                        <!-- меню-->
                                        <?php
                                        $i=1;

                                        while ($practiceQuery->have_posts()) : $practiceQuery->the_post();
                                            ?>
                                            <li><a class="dropdown-item" href="#scrollspyHeading<?= $i ?>"><?php the_title(); ?></a></li>
                                            <?php
                                            $i++;
                                        endwhile;
                                        ?>
                                        <!-- пролист в низ-->
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#scrollspyHeadingDown">Перейти в низ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- тело сообшение-->
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                            <?php
                            $i=1;
                            while ($practiceQuery->have_posts()) : $practiceQuery->the_post();
                                ?>
                                <h4 id="scrollspyHeading<?= $i ?>"><?php   the_title(); ?></h4>
                                <p><?php the_content(); ?></p>

                                <?php
                                $i++;
                            endwhile;
                            ?>
                            <h4 id="scrollspyHeadingDown"></h4>
                        </div>
                    </div>
                    <!-- конец-->
                </div>
            </div>
        <?php
        endif;
        // Выводим пагинацию
        $pagination = paginate_links([
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'type' => 'array',
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $practiceQuery->max_num_pages,
            'end_size'     => 1,
            'mid_size'     => 1
        ]);

        if (!empty($pagination)) {
            echo '<div class="pagination-container"><ul class="pagination">';
            foreach ($pagination as  $link) {
                echo '<li class="page-item'  . '">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
            }
            echo '</ul></div>';
        }

        // Восстанавливаем оригинальный запрос, чтобы не нарушать работу других циклов на странице
        wp_reset_postdata();
        ?>

        <!-- Поднятся в верх -->
        <div class="position-relative text-user">
            <p class="position-absolute bottom-0 end-0">
                <a  href="#">Up</a>
            </p>
        </div>
    </main>

<!-- подключаем футер  -->
<?php
    // закрывается тег if
    endif;
    get_footer();
?>