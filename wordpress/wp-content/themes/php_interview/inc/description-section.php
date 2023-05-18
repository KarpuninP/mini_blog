<?php

class Ph_Description_Section extends WP_Widget {
	/**
	 * Конструктор класса
	 */
	public function __construct() {
		// Вызываем конструктор родительского класса
		parent::__construct(
			'ph_description_section',
			__('Page theme', 'page_description'),
			[
				'name' => 'Description section page - Описание страницы',
				'description' => __('Тема и описание страницы', 'page_description'),
			]
		);
	}

	/**
	 * Выводит виджет на фронтенд
	 *
	 * @param array $args     Аргументы виджета.
	 * @param array $instance Данные виджета.
	 */
	public function widget($args, $instance) {
		// Получаем данные из параметров виджета
		$page_theme = wp_kses_post($instance['page_theme']);
		$page_description = wp_kses_post($instance['page_description']);

		// Если задана тема страницы
		if (!empty($page_theme)) {
			// Генерируем HTML-код темы и описания страницы
			$html = "<h2 class=\"fw-light\">$page_theme</h2><p class=\"lead text-muted\">$page_description</p>";
			// Выводим сгенерированный HTML-код на экран
			echo $html;
		}
	}

	/**
	 * Выводит форму редактирования виджета в админке
	 *
	 * @param array $instance Данные виджета.
	 */
	public function form($instance) {
		// Получаем данные из параметров виджета и проверяет на пустоту
		$page_theme = isset($instance['page_theme']) ? wp_kses_post($instance['page_theme']) : '';
		$page_description = isset($instance['page_description']) ? wp_kses_post($instance['page_description']) : '';

		?>
<!-- Формируем инпут для вода темы -->
		<p>
			<label for="<?php echo $this->get_field_id('page_theme'); ?>"><?php esc_attr_e('Название темы страницы:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('page_theme'); ?>" name="<?php echo $this->get_field_name('page_theme'); ?>" type="text" value="<?php echo esc_attr($page_theme); ?>">
		</p>
		<p>
			<!-- Формируем инпут для вода текста, подключаем WP редактор -->
			<label for="<?php echo $this->get_field_id('page_description'); ?>"><?php esc_attr_e('Описание страницы:'); ?></label>
			<?php
			$editor_content = $page_description;
			$editor_id = $this->get_field_id('page_description');
			$editor_name = $this->get_field_name('page_description');
			$settings = [
				'textarea_name' => $editor_name,
				'textarea_rows' => 5
			];
			// Выводим редактор TinyMCE для поля "Описание страницы"
			wp_editor($editor_content, $editor_id, $settings);
			?>
		</p>
		<?php
	}

	/**
	 * Обновляет данные виджета при сохранении
	 *
	 * @param array $new_instance Новые данные виджета.
	 * @param array $old_instance Предыдущие данные виджета.
	 * @return array Обновленные данные виджета.
	 */
	public function update( $new_instance, $old_instance ) {
		// Санитизация и сохранение данных из формы редактирования виджета
		$instance = [];
		$instance['page_theme'] = isset($new_instance['page_theme']) ? wp_kses_post($new_instance['page_theme']) : '';
		$instance['page_description'] = isset($new_instance['page_description']) ? wp_kses_post($new_instance['page_description']) : '';
		return $instance;
	}
}
