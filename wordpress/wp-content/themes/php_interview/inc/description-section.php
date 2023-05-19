<?php
class Ph_Description_Section extends WP_Widget {
	/**
	 * Class constructor
	 */
	public function __construct() {
		// Call the parent class constructor
		parent::__construct(
			'ph_description_section',
			__('Page theme', 'page_description'),
			[
				'name' => 'Description section page',
				'description' => __('Description section page', 'page_description'),
			]
		);
	}

	/**
	 * Displays the widget on the frontend
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance data.
	 */
	public function widget($args, $instance) {
		// Get data from the widget parameters
		$page_theme = wp_kses_post($instance['page_theme']);
		$page_description = wp_kses_post($instance['page_description']);

		// If page theme is provided
		if (!empty($page_theme)) {
			// Generate HTML code for page theme and description
			$html = "<h2 class=\"fw-light\">$page_theme</h2><p class=\"lead text-muted\">$page_description</p>";
			// Output the generated HTML code
			echo $html;
		}
	}

	/**
	 * Displays the widget editing form in the admin area
	 *
	 * @param array $instance Widget instance data.
	 */
	public function form($instance) {
		// Get data from the widget parameters and check for emptiness
		$page_theme = isset($instance['page_theme']) ? wp_kses_post($instance['page_theme']) : '';
		$page_description = isset($instance['page_description']) ? wp_kses_post($instance['page_description']) : '';

		?>
        <!-- Create input field for entering page theme -->
        <p>
            <label for="<?php echo $this->get_field_id('page_theme'); ?>"><?php esc_attr_e('Page Theme:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('page_theme'); ?>" name="<?php echo $this->get_field_name('page_theme'); ?>" type="text" value="<?php echo esc_attr($page_theme); ?>">
        </p>
        <p>
            <!-- Create input field for entering page description, include WP editor -->
            <label for="<?php echo $this->get_field_id('page_description'); ?>"><?php esc_attr_e('Page Description:'); ?></label>
			<?php
			$editor_content = $page_description;
			$editor_id = $this->get_field_id('page_description');
			$editor_name = $this->get_field_name('page_description');
			$settings = [
				'textarea_name' => $editor_name,
				'textarea_rows' => 5
			];
			// Output TinyMCE editor for the "Page Description" field
			wp_editor($editor_content, $editor_id, $settings);
			?>
        </p>
		<?php
	}

	/**
	 * Updates the widget data upon saving
	 *
	 * @param array $new_instance New widget data.
	 * @param array $old_instance Old widget data.
	 * @return array Updated widget data.
	 */
	public function update($new_instance, $old_instance) {
		// Sanitize and save data from the widget editing form
		$instance = [];
		$instance['page_theme'] = isset($new_instance['page_theme']) ? wp_kses_post($new_instance['page_theme']) : '';
		$instance['page_description'] = isset($new_instance['page_description']) ? wp_kses_post($new_instance['page_description']) : '';
		return $instance;
	}
}