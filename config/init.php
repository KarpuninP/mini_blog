<?php
// Фаил конфигурации, для разработки

// Режим отладки 1=отладка(показать ошибки true), 0=продакшон(скрыть ошибки false)
define("DEBUG", 1);
// Показывает корне нашего проэкта
define("ROOT", dirname(__DIR__));
// Указывает на публичную папку
define("WWW", ROOT . '/public');
// Ведет к папке нашем виде
define("VIEW", ROOT . '/view');
// Ведет к папке нашего приложение
define("APP", ROOT . '/app');
// Ведет к ядру нашего приложение
define("CORE", ROOT . 'App\Utils');
// Ведет к кешу
define("CACHE", ROOT . '/tmp/cache');
// Ведет в конфигурационные файлы
define("CONF", ROOT . '/config');
// Хранится шаблон нашего сайта по умолчанию
define("LAYOUT", 'light_blog');

// Узнать наш адрес url. Для проверки подставляем в начало echo и получаем http://localhost /index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// Заменяем и вырезаем все симболы (вообшем отрезать index.php) получаем http://localhost /
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// Записываем наш url в константу
define("PATH", $app_path);



