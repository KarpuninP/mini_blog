<?php

/*
Plugin Name: Cookie Notify by Pasha
Description: Выводит уведомление для пользователей сайта о том что используется его куки.
License:     GPL2

Cookie Notify is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Cookie Notify is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Cookie Notify. If not, see https://locolhost/.

------------ тут будут заметки ----
Название папки - это название плагина в WP комьюнити. Он ишет плагин по названиею папки на сайте с плагином.
Название папки недолжно совпадать с другими плагинами в интернете...

*/
// срабатывает при активации плагина
register_activation_hook(__FILE__, 'cnl_activation');
// срабатывает при деактивации плагина
register_deactivation_hook(__FILE__, 'cnl_deactivation');

// Созадаем масив с настройками
function cnl_options() {
    // Цвет заднего фона(чорный)/ Цвет текста(белый)/ Сам текст/ Где будет распологатся
    return [
      'cnl_bg' => '#000',
      'cnl_color' => '#fff',
      'cnl_text' => 'We use cookie',
      'cnl_position' => 'bottom',
    ];
}

// В случии активации плагина
function cnl_activation() {
    // В переменную добовляем наши масив с настройками
    $options = cnl_options();
    // проходимся циклом по нем и добовляем в бд наши настройки
    foreach ($options as $key => $value) {
        // Обновляет значение опции (настройки) в базе данных.  https://wp-kama.ru/function/update_option
	    update_option($key, $value);
    }


}
// В случаи деактивации плагина
function cnl_deactivation() {
    // В переменную добовляем наши масив с настройками
    $options = cnl_options();
    // проходимся циклом по нем и удалим настройки из бд по ключу
    foreach ($options as $key => $value) {
        delete_option($key);
    }
}

// Для проверки добовляется и выводится ли наш плагин из бд все выводится в футер
//add_action('wp_footer', function (){
//    // В переменную добовляем наши масив с настройками
//    $options = cnl_options();
//    // проходимся циклом по нем и выводим в футер все значение
//    foreach ($options as $key => $value) {
//        echo $key . '=> ' . get_option($key) . '<br>';
//    }
//
//});

// Перед загрузкой админки срабатывает этот хук
// Срабатывает перед загрузкой меню администрирования в admin.  https://wp-kama.ru/hook/admin_menu
add_action('admin_menu', 'cnl_register_menu');

//Эта функция добовляет новый пунктик в меню
function cnl_register_menu() {
   // Добавляет пункт (страницу) верхнего уровня в меню админ-панели (в один ряд с постами, страницами, пользователями и т.д.)
    // https://wp-kama.ru/function/add_menu_page/comment-page-1#comments-section
    // Берет в себя: Название / то что увидем в меню(боковая панель)/ Права доступа / ярлык/ имя функции который отвечает за верстку меню
    // иконка // приоритетность( по дефолту в конце списка
    // базовые права доступа можно посмотреть тут https://wp-kama.ru/function/current_user_can#bazovyj-spisok-prav
    add_menu_page(
        'Cookie уведомление',
        'Cookie уведомление',
        'manage_options',
        'cnl-settings',
        'cnl_admin_page_view',
        'dashicons-buddicons-pm'
    );

}

// Вывод фронтента в админке (верска)
function cnl_admin_page_view() {
    // Для проверки выводим надпись в админке, плагина
   // echo '<h1>Hello, world</h1>';
// После того как мы отправели данные которые внизу описаны, мы получим эти данные постом, сюда обратно. так как мы неуказывали action=""
// и эта функция будет работать колбек, сюда же прийдут эти данные для обработки. Что бы их обработать надо в начале написать условия для запуска
// Если у нас что то в посте есть (он не пустой) значит мы обновляем значение нашей настройки, а затем берем эти значение из настройки и подставляем их в поля.
	if(!empty($_POST)) {
		update_option('cnl_bg', $_POST['cnl_bg']);
		update_option('cnl_color', $_POST['cnl_color']);
		update_option('cnl_text', $_POST['cnl_text']);
		update_option('cnl_position', $_POST['cnl_position']);
	}
	// получаем опции
	//фон
	$bg = get_option('cnl_bg');
	//цвет
	$color = get_option('cnl_color');
	// текст
	$text = get_option('cnl_text');
	// позиция
	$position = get_option('cnl_position');

	// Делаем форму для админки
?>
	<h2>Настройки уведомления:</h2>
	<!--Мы можем неуказывать action="", так как по умолчанию он перекидывает на эту же страницу -->
	<form method="POST">
		<p>
			<label>
				Введите значение для цвета фона:
				<input type="text" name="cnl_bg" value="<?= $bg; ?>">
			</label>
		</p>
		<p>
			<label>
				Введите значение для цвета текста:
				<input type="text" name="cnl_color" value="<?= $color; ?>">
			</label>
		</p>
		<p>
			<label>
				Введите текст уведомление:
				<input type="text" name="cnl_text" value="<?= $text; ?>">
			</label>
		</p>
		<!--<fieldset> используется для группировки нескольки лементов управления  https://developer.mozilla.org/ru/docs/Web/HTML/Element/fieldset -->
		<fieldset>
			<!-- <legend> представляет собой заголовок содержания родительского элемента  https://developer.mozilla.org/ru/docs/Web/HTML/Element/legend-->
			<legend>
				Выберите положение для уведомление:
			</legend>
			<label>
				Сверху
				<input
					type="radio"
					name="cnl_position"
					value="top"
				<?php
				// Если 2 значение совпадают, то атрибут будет checked   https://wp-kama.ru/function/checked
				checked('top', $position, true);
				?>>
			</label>
			<label>
				Снизу
				<input
					type="radio"
					name="cnl_position"
					value="bottom"
				<?php
				// Если 2 значение совпадают, то атрибут будет checked   https://wp-kama.ru/function/checked
				checked('bottom', $position, true);
				?>>
			</label>
		</fieldset>
		<br>
		<button type="submit">Сохранить настройки</button>
	</form>
<?php

}

// Хук для вывода на фронтенд
add_action('wp_footer', 'cnl_front_page_view');

// Сама функция для вывода на фронтент
function cnl_front_page_view() {
	// Проверка есть ли куки вывода плагина, если есть, то невыводим верстку
	if ($_COOKIE['cnl_cookie_argeement'] !== 'agreed'):
		// получаем опции
		//фон
		$bg = get_option('cnl_bg');
		//цвет
		$color = get_option('cnl_color');
		// текст
		$text = get_option('cnl_text');
		// позиция
		$position = get_option('cnl_position');
		// вывод сверху или снизу
		$css = $position . ': 0;';  // получится либо top: 0; либо bottom: 0
	// Теперь сделаем форму для вывода. Так как маленький код напишем html и css тут, что бы не создовать новый файл.
		?>
			<div class="alert">
				<div class="wrapper">
					<?= $text; ?>
					<br>
					<button class="alert_btn">Я согласен</button>
				</div>
				<style>
					.alert{
						color: <?= $color;?>;
						background-color:  <?= $bg;?>;
						position: fixed;
						<?= $css;?>
						left: 0;
						z-index: 99999999;
						text-align: center;
						font-size: 30px;
						padding: 20px 10px;
						width: 100%;
					}
					.alert button{
	                    border: 1px solid  <?= $color;?>;
	                    background-color: transparent;
	                    font: inherit;
	                    font-size: 14px;
	                    color:  <?= $color;?>;
	                    padding: 10px 20px;
	                    cursor: pointer;
					}
	                .alert button:hover,
	                .alert button:active,
	                .alert button:focus {
	                    background-color:  <?= $color;?>;
	                    color:  <?= $bg;?>;
	                    transition: 0.3s;
	                }
				</style>
	            <script>
	               // Получим нашу сылку на ajax смотреть уроки с аяксом. Мы подключаме этот файл для обработки
	               const url = "<?= esc_url(admin_url('admin-ajax.php'));?>"
	               // получим нашу кнопку (клас нашей кнопки)
	               const btn = document.querySelector('.alert_btn');
	               // оброботчик событий при нажатие и повесим на него функцию
	               btn.addEventListener('click', function(e){
	                   // создаем новую дату
	                   const data = new FormData();
	                   // к этой дате повесим хук
	                   data.append('action', 'cnl_cookie_ajax');
	                   // переходим к реквесту  XMLHttp
	                   const xhr = new XMLHttpRequest();
	                   // передаем данные через пост
	                   xhr.open('POST', url);
	                   // отправляем их на сервер
	                   xhr.send(data);
	                   // подписываемся на событие, который вуступает на изменение и запускается функция
	                   xhr.addEventListener('readystatechange', function (){
	                       // мы делаем проверку что аякс запрос не дошол до конца и мы выходим с этой функций
	                       if(xhr.readyState !== 4) return;
	                       // а если мы получили статус 200 значит запрос прошол и мы делаем
	                       if(xhr.status === 200){
	                           // Мы возмем нашу кнопку обратимся к классу wrapper затем к классу alert (вернемся на 2 класса на верх) и вызовим метот remove (удалим этот скрипт)
	                           btn.parentElement.parentElement.remove();
	                       }
	                   })
	               })
	            </script>
			</div>
		<?php
	endif;
};
// подписываемся на 2 хука которые даст контроль то что мы получили от запроса аякс
add_action('wp_ajax_nopriv_cnl_cookie_ajax' , 'cnl_ajax_handler');
add_action('wp_ajax_cnl_cookie_ajax' , 'cnl_ajax_handler');
// реализуем эту функцию
function cnl_ajax_handler() {
	// установка куки
	// название куки, значение, время для жизни этой куки (месяц)текушая время+месяц, путь к дериктории которая доступна
	setcookie('cnl_cookie_argeement', 'agreed', time()+60*60*24*30, '/');
	// Вывод ответ (негде не выыводит
	echo 'OK';
	// для завершение скрипта
	wp_die();
}





