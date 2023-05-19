<?php

/*
Plugin Name: Cookie Notify by Pasha
Description: Displays a notification to site users that their cookies are being used.
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

*/
// fires when the plugin is activated
register_activation_hook(__FILE__, 'cnl_activation');
// fires when the plugin is deactivated
register_deactivation_hook(__FILE__, 'cnl_deactivation');

// Create an array with settings
function cnl_options() {
    return [
      'cnl_bg' => '#000',
      'cnl_color' => '#fff',
      'cnl_text' => 'We use cookie',
      'cnl_position' => 'bottom',
    ];
}

// In case of plugin activation
function cnl_activation() {
    $options = cnl_options();
    foreach ($options as $key => $value) {
	    update_option($key, $value);
    }


}

// In case of plugin deactivation
function cnl_deactivation() {
    $options = cnl_options();
    foreach ($options as $key => $value) {
        delete_option($key);
    }
}

// Fires before loading the admin menu in admin.
add_action('admin_menu', 'cnl_register_menu');

//This function adds a new item to the menu
function cnl_register_menu() {

    add_menu_page(
        'Cookie уведомление',
        'Cookie уведомление',
        'manage_options',
        'cnl-settings',
        'cnl_admin_page_view',
        'dashicons-buddicons-pm'
    );
}

// Frontend output in the admin panel (layout)
function cnl_admin_page_view() {
	if(!empty($_POST)) {
		update_option('cnl_bg', $_POST['cnl_bg']);
		update_option('cnl_color', $_POST['cnl_color']);
		update_option('cnl_text', $_POST['cnl_text']);
		update_option('cnl_position', $_POST['cnl_position']);
	}

	$bg = get_option('cnl_bg');
    $color = get_option('cnl_color');
	$text = get_option('cnl_text');
	$position = get_option('cnl_position');

	// Making the admin form
?>
	<h2>Notification settings:</h2>
	<form method="POST">
		<p>
			<label>
                Enter a value for the background color:
				<input type="text" name="cnl_bg" value="<?= $bg; ?>">
			</label>
		</p>
		<p>
			<label>
                Enter a value for text color:
				<input type="text" name="cnl_color" value="<?= $color; ?>">
			</label>
		</p>
		<p>
			<label>
                Enter notification text:
				<input type="text" name="cnl_text" value="<?= $text; ?>">
			</label>
		</p>
		<fieldset>
			<legend>
                Select position for notification:
			</legend>
			<label>
                Above
				<input
					type="radio"
					name="cnl_position"
					value="top"
				<?php
				checked('top', $position, true);
				?>>
			</label>
			<label>
                Bottom
				<input
					type="radio"
					name="cnl_position"
					value="bottom"
				<?php
				checked('bottom', $position, true);
				?>>
			</label>
		</fieldset>
		<br>
		<button type="submit">Save settings</button>
	</form>
<?php

}

// Hook for frontend output
add_action('wp_footer', 'cnl_front_page_view');

// The function itself for output to the frontend
function cnl_front_page_view() {
	if ($_COOKIE['cnl_cookie_argeement'] !== 'agreed'):
		$bg = get_option('cnl_bg');
		$color = get_option('cnl_color');
		$text = get_option('cnl_text');
		$position = get_option('cnl_position');
		$css = $position . ': 0;';
?>
			<div class="alert">
				<div class="wrapper">
					<?= $text; ?>
					<br>
					<button class="alert_btn">I agree</button>
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
	               const url = "<?= esc_url(admin_url('admin-ajax.php'));?>"
	               const btn = document.querySelector('.alert_btn');
	               btn.addEventListener('click', function(e){
	                   const data = new FormData();
	                   data.append('action', 'cnl_cookie_ajax');
	                   const xhr = new XMLHttpRequest();
	                   xhr.open('POST', url);
	                   xhr.send(data);
	                   xhr.addEventListener('readystatechange', function (){
	                       if(xhr.readyState !== 4) return;
	                       if(xhr.status === 200){
	                           btn.parentElement.parentElement.remove();
	                       }
	                   })
	               })
	            </script>
			</div>
		<?php
	endif;
};
// subscribe to 2 hooks that gives control to what we received from the ajax request
add_action('wp_ajax_nopriv_cnl_cookie_ajax' , 'cnl_ajax_handler');
add_action('wp_ajax_cnl_cookie_ajax' , 'cnl_ajax_handler');
// implement this function
function cnl_ajax_handler() {
	setcookie('cnl_cookie_argeement', 'agreed', time()+60*60*24*30, '/');
	echo 'OK';
	wp_die();
}





