<?php
class Ph_Widget_Info_Links extends WP_Widget {
	// Override the constructor
	public function __construct() {
		// Call the parent class constructor
		parent::__construct(
			'ph_widget_info_link',
			__('External Link Widget', 'text_domain'),
			[
				'name' => 'External Link Widget - виджет перехода',
				'description' => __('Переход на другой сайт', 'text_domain'),
			]
		);
	}

	// Display the widget on the frontend
	public function widget($args, $instance) {
		// Get data from the widget parameters
		$external_link = isset($instance['external_link']) ? $instance['external_link'] : '';
		$link_text = isset($instance['link_text']) ? $instance['link_text'] : '';

		// If external link is provided
		if (!empty($external_link)) {
			// Generate HTML code for the link
			$html = '<a href="' . esc_url($external_link) . '">' . esc_html($link_text) . '</a>';
			// Output the generated HTML code
			echo $html;
		}
	}

	// Display the widget editing form in the admin area
	public function form($instance) {
		// Get data from the widget parameters
		$external_link = isset($instance['external_link']) ? $instance['external_link'] : '';
		$link_text = isset($instance['link_text']) ? $instance['link_text'] : '';

		// Generate HTML code for the widget editing form
		?>
        <p>
            <label for="<?php echo $this->get_field_id('external_link'); ?>"><?php esc_attr_e('External Link:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('external_link'); ?>" name="<?php echo $this->get_field_name('external_link'); ?>" type="text" value="<?php echo esc_attr($external_link); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link_text'); ?>"><?php esc_attr_e('Link Text:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" type="text" value="<?php echo esc_attr($link_text); ?>">
        </p>
		<?php
	}

	// Update the widget data upon saving
	public function update($new_instance, $old_instance) {
		// Sanitize and save data from the widget editing form
		$instance = [];
		$instance['external_link'] = isset($new_instance['external_link']) ? sanitize_text_field($new_instance['external_link']) : '';
		$instance['link_text'] = isset($new_instance['link_text']) ? sanitize_text_field($new_instance['link_text']) : '';
		return $instance;
	}
}
