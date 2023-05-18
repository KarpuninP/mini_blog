<?php
// Подом подключаем widget
 require_once (__DIR__ . '/inc/widget-info-links.php');
 require_once (__DIR__ . '/inc/description-section.php');

// Подписываемся на хук для подключение js и css
add_action('wp_enqueue_scripts', 'ph_scripts');
// добовление акшона, после установке темы, запускаем следуюшию функцию
add_action('after_setup_theme', 'ph_setup');
// добовляем заголовка (добовляем строку в меню)
add_action('admin_init', 'ph_register_topic');
// активация виджетов
add_action('widgets_init', 'ph_register');
// включить Gutenberg и регистрация таксономии
add_action('init', 'ph_register_types');
// Добавление колонку в вкладке theory
add_action('manage_theory_posts_custom_column', 'show_theory_category_column', 10, 2);
// Добавление колонку в вкладке practice
add_action('manage_practice_posts_custom_column', 'show_practice_category_column', 10, 2);

// Добавить или убрать полосу на сайте админ false - убрать
add_filter('show_admin_bar', '__return_false');
// Порядок отображение колонок в админ панели в theory
add_filter('manage_theory_posts_columns', 'add_theory_category_column');
// Порядок отображение колонок в админ панели в theory
add_filter('manage_practice_posts_columns', 'add_practice_category_column');


// Функция для подключение js и css
function ph_scripts() {
    // функция которая подключает js. Название скрипта, Где находится он, Массив названий скриптов от которых зависит этот скрипт, Версия, Подключить скрипт в подвале.
    // https://wp-kama.ru/function/wp_enqueue_script
    wp_enqueue_script(
        'bootstrap.bundle.min',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        [],
        'v5.2.0',
        true
    );
    wp_enqueue_script(
        'jquery-1.11.0.min',
        get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js',
        [],
        '1.11.0',
        true
    );
    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/assets/js/mainq.js',
        ['jquery-1.11.0.min'],
        '1.0',
        true
    );

    // Подключаем стили css. Задаем id, Где находится он, Массив идентификаторов других стилей от которых зависит подключаемый файл стилей, Версия, Атрибута media
    // https://wp-kama.ru/function/wp_enqueue_style
    wp_enqueue_style(
        'bootstrap.min',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        [],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'ph-style',
        get_template_directory_uri() . '/assets/css/styleq.css',
        [],
        '1.0',
        'all'
    );
    // добовление гуглский шрифт
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter&display=swap',
        [],
        null,
        'all'
    );
}
// Функция запускается после установки WP
function ph_setup() {
    // добовлениие лого и миниатюры
    add_theme_support('custom-logo');
    // включение тайтал
    add_theme_support('title-tag');
    // Поддержка миниатюр
    add_theme_support('post-thumbnails');
    // добовление меню в админку
     add_theme_support('menu');
    // регестрируем меню
    register_nav_menu('menu-header', 'Меню в шапке');

}

// Добовляем поле в настройках админки, для заголовка сайта
function ph_register_topic() {
    // Регистрация поля, отвечает за отображение inputa
    // id, дискрипшон, ну это кол бек функция, ярлык ст настроек(типа обшие настройки или новое)(ярлык смотреть в url, без option),
    // секции в настройках, параметры-доп (который входит в функцию html кода нашего 3 пункта колбекфункции)
    // Подробности тут  https://wp-kama.ru/function/add_settings_field
    add_settings_field(
        'ph_option_field_topic',
        'Заголовок вашего сайта:',
        'ph_option_topic_cb',
        'general',
        'default',
        ['label_for' => 'ph_option_field_topic']
    );
    // Потом регистрация самой настройки, что бы сохранить это параметр
    // ярлык страницы настроек, id нашего поля, какой тип данных у нас хранится либо масивом либо колбекфункцией санитайз,
    // strval-- пытается привратить его строку   https://www.php.net/manual/ru/function.strval.php
    // инфа тут   https://wp-kama.ru/function/register_setting
    register_setting(
        'general',
        'ph_option_field_topic',
        'strval'
    );
}

// Вывод html кода
function ph_option_topic_cb($args) {
// То что мы получили от функции add_settings_field это приходит автоматом масив, мы тут его и вказываем
    $slug = $args['label_for'];
    ?>
    <!--
    type="text" ---- ну тут все ясно это тип инпута
    id="..."   --- вывод id который мы указали как масив верху
    value="..." --- вывод значение которо было записано в бд
    name="..." ---  имя для отправки по нашему id
     class="regular-text code" --- так как инпут получился маленький, мы заходим в админку и смотрим что за класс в других инпутов по длинее, копируем его и добовляем к нам
    -->
    <input
        type="text"
        id="<?= $slug; ?>"
        value="<?= get_option($slug); ?>"
        name="<?= $slug; ?>"
        class="regular-text code"
    >
    <?php
}

//Записываем в функцию этот класс
   function ph_register() {
       register_sidebar([
           'name' => 'Сайдбар в футоре - Колонка 1',
           'id' => 'ph-footer-column-1',
           'before_widget' => null,
           'after_widget' => null
       ]);
       register_sidebar([
           'name' => 'Сайдбар в футоре - Колонка 2',
           'id' => 'ph-footer-column-2',
           'before_widget' => null,
           'after_widget' => null
       ]);
       register_sidebar([
           'name' => 'Сайдбар в футоре - Колонка 3',
           'id' => 'ph-footer-column-3',
           'before_widget' => null,
           'after_widget' => null
       ]);
       register_sidebar([
           'name' => 'Сайдбар в футоре - Колонка 4',
           'id' => 'ph-footer-column-4',
           'before_widget' => null,
           'after_widget' => null
       ]);
       register_sidebar([
           'name' => 'Сайдбар описание - раздел Теория',
           'id' => 'ph-description-section-theory',
           'before_widget' => null,
           'after_widget' => null
       ]);
       register_sidebar([
           'name' => 'Сайдбар описание - раздел Практике',
           'id' => 'ph-description-section-practice',
           'before_widget' => null,
           'after_widget' => null
       ]);

       register_widget('Ph_Widget_Info_Links');
       register_widget('Ph_Description_Section');
   }

   // включаем Gutenberg для типа записей "страница".
function ph_register_types() {
    // включить Gutenberg для страниц about
    add_post_type_support('page', 'editor');

    // таксономия
    // текст который будет отображатся в админке (ярлык будет участвовать в url)
    register_post_type( 'theory', [
        'labels' => [
            'name'               => 'Теория', // основное название для типа записи
            'singular_name'      => 'Теория', // название для одной записи этого типа
            'add_new'            => 'Добавить новую тему', // для добавления новой записи
            'add_new_item'       => 'Добавить новую тему', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать тему', // для редактирования типа записи
            'new_item'           => 'Новая Тема', // текст новой записи
            'view_item'          => 'Смотреть Теорию', // для просмотра записи этого типа.
            'search_items'       => 'Искать тему', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Теория', // название меню
        ],
        'public'              => true,  // отображение в интерфейсе админки
        'menu_position'       => 20,  // чем больше число тем ниже путь
        'menu_icon'           =>  'dashicons-editor-paste-text',  // можно либо указать из списка иконок https://developer.wordpress.org/resource/dashicons/#id        или       _si_assets_path('img/icons/arrow_black.png')   // это путь до иконки который у нас есть
        'hierarchical'        => false,  //  если тип записи можно вкладывать в друг друга именно тип записей
        'supports'            => ['title', 'editor'],  // массив с ярлыками, для записей с заголовок, текст и картинка .....['title', 'editor', 'thumbnail'] title --- должен быть всегда !!!
        'has_archive' => true  // под этот тип запись нужно зарегестрировать отдельный тип записей
    ]);

    // Регистрация пользовательскую таксономию WP. (ярлык, масив ярлыки тех видов запесей которые можно привезать, список)
    register_taxonomy('theory_category', ['theory'], [
        'labels'                => [
            'name'              => 'Категория темы',
            'singular_name'     => 'Название категории',
            'search_items'      => 'Найти категорию',
            'all_items'         => 'Все категории',
            'view_item '        => 'Посмотреть категорию',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить категорию темы',
            'new_item_name'     => 'Добавить категорию темы',
            'menu_name'         => 'Все категории темы',
        ],
        'description'           => '',
        'public'                => true,   // вывод в админку
        'hierarchical'          => true   // true -- рублики, false  -- метки. рекомендуется всегда true, для легчей работы
    ]);

    register_post_type( 'practice', [
        'labels' => [
            'name'               => 'Практика', // основное название для типа записи
            'singular_name'      => 'Практика', // название для одной записи этого типа
            'add_new'            => 'Добавить новую тему', // для добавления новой записи
            'add_new_item'       => 'Добавить новую тему', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать тему', // для редактирования типа записи
            'new_item'           => 'Новая Тема', // текст новой записи
            'view_item'          => 'Смотреть Практика', // для просмотра записи этого типа.
            'search_items'       => 'Искать тему', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Практика', // название меню
        ],
        'public'              => true,  // отображение в интерфейсе админки
        'menu_position'       => 20,  // чем больше число тем ниже путь
        'menu_icon'           =>  'dashicons-book-alt',  // можно либо указать из списка иконок https://developer.wordpress.org/resource/dashicons/#id        или       _si_assets_path('img/icons/arrow_black.png')   // это путь до иконки который у нас есть
        'hierarchical'        => false,  //  если тип записи можно вкладывать в друг друга именно тип записей
        'supports'            => ['title', 'editor'],  // массив с ярлыками, для записей с заголовок, текст и картинка .....['title', 'editor', 'thumbnail'] title --- должен быть всегда !!!
        'has_archive' => true  // под этот тип запись нужно зарегестрировать отдельный тип записей
    ]);

    register_taxonomy('practice_category', ['practice'], [
        'labels'                => [
            'name'              => 'Категория практики',
            'singular_name'     => 'Название категории',
            'search_items'      => 'Найти категорию',
            'all_items'         => 'Все категории',
            'view_item '        => 'Посмотреть категорию',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить категорию практики',
            'new_item_name'     => 'Добавить категорию практики',
            'menu_name'         => 'Все категории практики',
        ],
        'description'           => '',
        'public'                => true,   // вывод в админку
        'hierarchical'          => true   // true -- рублики, false  -- метки. рекомендуется всегда true, для легчей работы
    ]);
}


// Порядок отображение колонок в кладке theory
function add_theory_category_column($columns) {
    // удаляем колонку "Дата" из списка колонок
    unset($columns['date']);
    // добавляем колонку "Категории" после колонки "Заголовок"
    $columns['theory_category'] = 'Категории';
    // добавляем колонку "Дата" в конец списка колонок
    $columns['date'] = 'Дата';
    // возврашаем обратно
    return $columns;
}


// Добавления пользовательского столбца в административной таблице для постов типа "theory"
function show_theory_category_column($column, $post_id) {
    if ($column === 'theory_category') {
        // получаем все термины рубрики "theory_category" текущей записи
        $terms = get_the_terms($post_id, 'theory_category');

        // Проверяет если есть категория, если нет то выводит тире
        if (!empty($terms)) {
            $output = array();

            // выводим название каждого термина в виде ссылки на страницу со списком записей этой рубрики
            foreach ($terms as $term) {
                $output[] = '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a>';
            }
            // Если в одной категории несколько то их разделить зяпятой
            echo implode(', ', $output);
        } else {
            echo '—';
        }
    }
}

// Порядок отображение колонок в кладке practice
function add_practice_category_column($columns) {
    // удаляем колонку "Дата" из списка колонок
    unset($columns['date']);
    // добавляем колонку "Категории" после колонки "Заголовок"
    $columns['practice_category'] = 'Категории';
    // добавляем колонку "Дата" в конец списка колонок
    $columns['date'] = 'Дата';
    // возврашаем обратно
    return $columns;
}

// Добавления пользовательского столбца в административной таблице для постов типа practice
function show_practice_category_column($column, $post_id) {
    if ($column === 'practice_category') {
        // получаем все термины рубрики "theory_category" текущей записи
        $terms = get_the_terms($post_id, 'practice_category');

        // Проверяет если есть категория, если нет то выводит тире
        if (!empty($terms)) {
            $output = array();

            // выводим название каждого термина в виде ссылки на страницу со списком записей этой рубрики
            foreach ($terms as $term) {
                $output[] = '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a>';
            }
            // Если в одной категории несколько то их разделить зяпятой
            echo implode(', ', $output);
        } else {
            echo '—';
        }
    }
}


