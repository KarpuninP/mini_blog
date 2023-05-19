<?php
// Include widget
require_once(__DIR__ . '/inc/widget-info-links.php');
require_once(__DIR__ . '/inc/description-section.php');

// Hook to enqueue scripts and styles
add_action('wp_enqueue_scripts', 'ph_scripts');
// Run the following function after the theme is set up
add_action('after_setup_theme', 'ph_setup');
// Add a title (add a row to the menu)
add_action('admin_init', 'ph_register_topic');
// Activate widgets
add_action('widgets_init', 'ph_register');
// Enable Gutenberg and register taxonomy
add_action('init', 'ph_register_types');
// Add a column to the theory tab
add_action('manage_theory_posts_custom_column', 'show_theory_category_column', 10, 2);
// Add a column to the practice tab
add_action('manage_practice_posts_custom_column', 'show_practice_category_column', 10, 2);

// Add or remove the admin bar on the site. False - remove
add_filter('show_admin_bar', '__return_false');
// Order of displayed columns in the admin panel in theory
add_filter('manage_theory_posts_columns', 'add_theory_category_column');
// Order of displayed columns in the admin panel in practice
add_filter('manage_practice_posts_columns', 'add_practice_category_column');

// Function to enqueue scripts and styles
function ph_scripts()
{
	// Enqueue scripts
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

	// Enqueue styles
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

	// Add Google Fonts
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter&display=swap',
		[],
		null,
		'all'
	);
}

// Function to run after WordPress is set up
function ph_setup()
{
	// Add custom logo and thumbnails support
	add_theme_support('custom-logo');
	// Enable title tag
	add_theme_support('title-tag');
	// Add support for post thumbnails
	add_theme_support('post-thumbnails');
	// Add menu to admin
	add_theme_support('menu');
	// Register menu
	register_nav_menu('menu-header', 'Header Menu');
}

// Register the field for displaying the input
function ph_register_topic()
{
	add_settings_field(
		'ph_option_field_topic',
		'Your Site Title:',
		'ph_option_topic_cb',
		'general',
		'default',
		['label_for' => 'ph_option_field_topic']
	);

	// Register the setting to save this parameter
	register_setting(
		'general',
		'ph_option_field_topic',
		'strval'
	);
}

// Display HTML code
function ph_option_topic_cb($args)
{
	$slug = $args['label_for'];
	?>
    <input
            type="text"
            id="<?= $slug; ?>"
            value="<?= get_option($slug); ?>"
            name="<?= $slug; ?>"
            class="regular-text code"
    >
	<?php
}

// Register widgets
function ph_register()
{
	register_sidebar([
		'name' => 'Footer Sidebar - Column 1',
		'id' => 'ph-footer-column-1',
		'before_widget' => null,
		'after_widget' => null
	]);
	register_sidebar([
		'name' => 'Footer Sidebar - Column 2',
		'id' => 'ph-footer-column-2',
		'before_widget' => null,
		'after_widget' => null
	]);
	register_sidebar([
		'name' => 'Footer Sidebar - Column 3',
		'id' => 'ph-footer-column-3',
		'before_widget' => null,
		'after_widget' => null
	]);
	register_sidebar([
		'name' => 'Footer Sidebar - Column 4',
		'id' => 'ph-footer-column-4',
		'before_widget' => null,
		'after_widget' => null
	]);
	register_sidebar([
		'name' => 'Description Sidebar - Theory Section',
		'id' => 'ph-description-section-theory',
		'before_widget' => null,
		'after_widget' => null
	]);
	register_sidebar([
		'name' => 'Description Sidebar - Practice Section',
		'id' => 'ph-description-section-practice',
		'before_widget' => null,
		'after_widget' => null
	]);

	register_widget('Ph_Widget_Info_Links');
	register_widget('Ph_Description_Section');
}

   // включаем Gutenberg для типа записей "страница".
function ph_register_types() {
	// Enable Gutenberg for "about" pages
	add_post_type_support('page', 'editor');

	// Register "theory" post type
	register_post_type('theory', [
		'labels' => [
			'name'               => 'Theory',
			'singular_name'      => 'Theory',
			'add_new'            => 'Add New Topic',
			'add_new_item'       => 'Add New Topic',
			'edit_item'          => 'Edit Topic',
			'new_item'           => 'New Topic',
			'view_item'          => 'View Theory',
			'search_items'       => 'Search Topics',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Theory',
		],
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-editor-paste-text',
		'hierarchical'  => false,
		'supports'      => ['title', 'editor'],
		'has_archive'   => true,
	]);

	// Register "theory_category" taxonomy
	register_taxonomy('theory_category', ['theory'], [
		'labels'      => [
			'name'                       => 'Topic Category',
			'singular_name'              => 'Category',
			'search_items'               => 'Search Categories',
			'all_items'                  => 'All Categories',
			'view_item'                  => 'View Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update',
			'add_new_item'               => 'Add New Category',
			'new_item_name'              => 'Add New Category',
			'menu_name'                  => 'All Topic Categories',
		],
		'description' => '',
		'public'      => true,
		'hierarchical' => true,
	]);

	// Register "practice" post type
	register_post_type('practice', [
		'labels' => [
			'name'               => 'Practice',
			'singular_name'      => 'Practice',
			'add_new'            => 'Add New Topic',
			'add_new_item'       => 'Add New Topic',
			'edit_item'          => 'Edit Topic',
			'new_item'           => 'New Topic',
			'view_item'          => 'View Practice',
			'search_items'       => 'Search Topics',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Practice',
		],
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-book-alt',
		'hierarchical'  => false,
		'supports'      => ['title', 'editor'],
		'has_archive'   => true,
	]);

    // Register "practice_category" taxonomy
	register_taxonomy('practice_category', ['practice'], [
		'labels'      => [
			'name'                       => 'Practice Category',
			'singular_name'              => 'Category',
			'search_items'               => 'Search Categories',
			'all_items'                  => 'All Categories',
			'view_item'                  => 'View Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update',
			'add_new_item'               => 'Add New Practice Category',
			'new_item_name'              => 'Add New Practice Category',
			'menu_name'                  => 'All Practice Categories',
		],
		'description' => '',
		'public'      => true,
		'hierarchical' => true,
	]);
}


// Modify column order in the "Theory" tab
function add_theory_category_column($columns) {
	// Remove the "Date" column from the column list
	unset($columns['date']);
	// Add the "Categories" column after the "Title" column
	$columns['theory_category'] = 'Categories';
	// Add the "Date" column at the end of the column list
	$columns['date'] = 'Date';
	// Return the modified columns
	return $columns;
}

// Add a custom column to the admin table for "theory" post type
function show_theory_category_column($column, $post_id) {
	if ($column === 'theory_category') {
		// Get all terms of the "theory_category" taxonomy for the current post
		$terms = get_the_terms($post_id, 'theory_category');

		// Check if there are categories, if not, display a dash "-"
		if (!empty($terms)) {
			$output = array();

			// Display the name of each term as a link to the term archive page
			foreach ($terms as $term) {
				$output[] = '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a>';
			}
			// If there are multiple categories, separate them with commas
			echo implode(', ', $output);
		} else {
			echo '---';
		}
	}
}

// Modify column order in the "Practice" tab
function add_practice_category_column($columns) {
	// Remove the "Date" column from the column list
	unset($columns['date']);
	// Add the "Categories" column after the "Title" column
	$columns['practice_category'] = 'Categories';
	// Add the "Date" column at the end of the column list
	$columns['date'] = 'Date';
	// Return the modified columns
	return $columns;
}

// Add a custom column to the admin table for "practice" post type
function show_practice_category_column($column, $post_id) {
	if ($column === 'practice_category') {
		// Get all terms of the "practice_category" taxonomy for the current post
		$terms = get_the_terms($post_id, 'practice_category');

		// Check if there are categories, if not, display a dash "-"
		if (!empty($terms)) {
			$output = array();

			// Display the name of each term as a link to the term archive page
			foreach ($terms as $term) {
				$output[] = '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a>';
			}
			// If there are multiple categories, separate them with commas
			echo implode(', ', $output);
		} else {
			echo '---';
		}
	}
}

