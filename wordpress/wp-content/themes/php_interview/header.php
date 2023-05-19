<!doctype html>
<html lang="en">
<head>

    <!--  Connect meta attributes to WP  -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= wp_get_document_title(); ?></title>

	<?php
	// Connect scripts, styles, and other functions to WP
	wp_head();
	?>
</head>
<body>
<header>
    <div class="container">
        <div class="right-login">
			<?php
			// Check if the user is logged in and display the appropriate content
			if (is_user_logged_in()) {
				$current_user = wp_get_current_user();
				?>
                <div class="card mb-3 border-0 login-style">
                    <div class="row g-0 ">
                        <div class="col-md-4 ">
                            <div class="img-user d-flex align-items-center">
								<?= get_avatar($current_user->user_email, 65); ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title">Greetings <?= $current_user->display_name; ?></h6>
                                <a href="<?= admin_url('index.php'); ?>">
                                    <small class="text-body-secondary">Console</small>
                                </a>
                                <a href="<?= wp_logout_url(home_url()); ?>">
                                    <small class="text-body-secondary">Log-out</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
			} else {
				// Link to open the sign-in modal window
				echo "<a href=\"\" class=\"login\" data-bs-toggle=\"modal\" data-bs-target=\"#signIn\">Sign in</a>";
			}
			?>
        </div>
        <!-- Output custom slogan -->
        <h1><?= get_option('ph_option_field_topic'); ?></h1>

        <nav class="navbar navbar-expand-lg nav-user">
            <div class="container-fluid">
                <a class="navbar-brand .logo">
					<?php
					// Get the logo link
					$custom_logo__url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
					?>
                    <img src="<?= $custom_logo__url[0]; ?>" alt="logo" class="d-inline-block align-text-top img-user">
                </a>

				<?php
				// Form the menu with added classes
				$locations = get_nav_menu_locations();
				$menu_id = $locations['menu-header'];
				$menu_items = wp_get_nav_menu_items($menu_id, [
					'order' => 'ASC',
					'orderby' => 'menu_order'
				]);
				?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler1" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler1">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			            <?php
			            // Iterate through the menu items
			            foreach ($menu_items as $item):
				            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $item->url; ?>"><?= $item->title; ?></a>
                            </li>
			            <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>