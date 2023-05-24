<?php
get_header();
// Check if it's the home page
if ( is_home() ):

	// Get theory categories
	$theoryCategory = get_terms( [
		'taxonomy' => 'theory_category',
		'order'    => 'ASC',
		'orderby'  => 'slug'
	] );

    // Get the current page number
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;

	// Get the selected theory category from the query parameters
	$theoryCategoryUrl = ( isset( $_GET['category'] ) ) ? $_GET['category'] : '';

	// Set the query arguments
	$args = [
		'numberposts'     => - 1,
		'post_type'       => 'theory',
		'theory_category' => $theoryCategoryUrl,
		'orderby'         => 'meta_value_num',
		'order'           => 'ASC',
		'posts_per_page'  => 10,
		'paged'           => $paged
	];

    // Execute the query
	$theoryQuery = new WP_Query( $args );

	?>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
					<?php
					// Check if the 'ph-description-section-theory' sidebar is active
                        if ( is_active_sidebar( 'ph-description-section-theory' ) ) {
	                        // Output the widgets in the sidebar
                            dynamic_sidebar( 'ph-description-section-theory' );
                        }
					?>
                </div>
            </div>
        </section>

        <div class="container center">
            <div class="carousel-container ">
                <div class="carousel-track">
					<?php

                        $arr = [];
                        foreach ( $theoryCategory as $cat ):
	                        // Store the category slug and name in the $arr array
                            $arr[ $cat->slug ] = $cat->name;
					?>
                        <a class="carousel-block" href="?category=<?= $cat->slug; ?>"> <?= $cat->name; ?> </a>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- This code block generates the dropdown navigation menu. -->
		<?php if ( $theoryQuery->have_posts() ) : ?>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                            <p class="navbar-brand">
								<?php echo $theoryCategoryUrl == '' ? 'All themes' : $arr[ $theoryCategoryUrl ]; ?>
                            </p>
                            <ul class="nav nav-pills">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                       aria-expanded="false">Dropdown</a>
                                    <ul class="dropdown-menu">
										<?php
                                            $i = 1;
                                            while ( $theoryQuery->have_posts() ) : $theoryQuery->the_post();
                                        ?>
                                            <li><a class="dropdown-item"
                                                   href="#scrollspyHeading<?= $i ?>"><?php the_title(); ?></a></li>
										<?php
											    $i ++;
										    endwhile;
										?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#scrollspyHeadingDown">Drop to down</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                             data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
	                        <?php
                                $i = 1;
                                while ( $theoryQuery->have_posts() ) : $theoryQuery->the_post();
                            ?>
                                    <h4 id="scrollspyHeading<?= $i ?>"><?php the_title(); ?></h4>
                                    <p><?php the_content(); ?></p>

                            <?php
                                    $i ++;
                                endwhile;
	                        ?>
                            <h4 id="scrollspyHeadingDown"></h4>
                        </div>
                    </div>
                </div>
            </div>
		<?php
		endif;
		// Generate pagination links
		$pagination = paginate_links( [
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
			'type'      => 'array',
			'format'    => '?&page=%#%',
			'current'   => max( 1, get_query_var( 'page' ) ),
			'total'     => $theoryQuery->max_num_pages,
			'end_size'  => 1,
			'mid_size'  => 3
		] );

		if ( ! empty( $pagination ) ) {
			// Output the pagination container and list
			echo '<div class="pagination-container"><ul class="pagination">';
			foreach ( $pagination as $link ) {
				$selected = isset( $_GET['selected'] ) && $_GET['selected'] == $i + 1;
				// Output each pagination link
				echo '<li class="page-item' . ( $selected ? ' aria-current="page"' : '' ) . '">' . str_replace( 'page-numbers', 'page-link', $link ) . '</li>';
			}
			echo '</ul></div>';
		}
		// Reset the post data
		wp_reset_postdata();
		?>

        <div class="position-relative text-user">
            <p class="position-absolute bottom-0 end-0">
                <a href="#">Up</a>
            </p>
        </div>
    </main>
<?php
else:
// Everything is the same here, only we have replaced theory with practice

	$practiceCategory = get_terms( [
		'taxonomy' => 'practice_category',
		'order'    => 'ASC',
		'orderby'  => 'slug'
	] );

	$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	$practiceCategoryUrl = ( isset( $_GET['category'] ) ) ? $_GET['category'] : '';

	$args = [
		'numberposts'       => - 1,
		'post_type'         => 'practice',
		'practice_category' => $practiceCategoryUrl,
		'orderby'           => 'meta_value_num',
		'order'             => 'ASC',
		'posts_per_page'    => 10,
		'paged'             => $page
	];

	$practiceQuery = new WP_Query( $args );
	?>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
					<?php
                        if ( is_active_sidebar( 'ph-description-section-practice' ) ) {
                            dynamic_sidebar( 'ph-description-section-practice' );
                        }
					?>
                </div>
            </div>
        </section>

        <div class="container center">
            <div class="carousel-container ">
                <div class="carousel-track">
					<?php $arr = [];
                        foreach ( $practiceCategory as $cat ):
                            $arr[ $cat->slug ] = $cat->name;
					?>
                        <a class="carousel-block" href="?category=<?= $cat->slug; ?>"> <?= $cat->name; ?> </a>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
		<?php
		    if ( $practiceQuery->have_posts() ) :

		?>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                            <p class="navbar-brand">
								<?php echo $practiceCategoryUrl == '' ? 'All themes' : $arr[ $practiceCategoryUrl ]; ?>
                            </p>
                            <ul class="nav nav-pills">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                       aria-expanded="false">Dropdown</a>
                                    <ul class="dropdown-menu">
										<?php
										$i = 1;
										while ( $practiceQuery->have_posts() ) : $practiceQuery->the_post();
										?>
                                            <li><a class="dropdown-item"
                                                   href="#scrollspyHeading<?= $i ?>"><?php the_title(); ?></a></li>
										<?php
											$i ++;
										endwhile;
										?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#scrollspyHeadingDown">Drop to down</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                             data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
							<?php
							$i = 1;
							while ( $practiceQuery->have_posts() ) : $practiceQuery->the_post();
								?>
                                <h4 id="scrollspyHeading<?= $i ?>"><?php the_title(); ?></h4>
                                <p><?php the_content(); ?></p>
							<?php
								$i ++;
							endwhile;
							?>
                            <h4 id="scrollspyHeadingDown"></h4>
                        </div>
                    </div>
                </div>
            </div>
		<?php
		endif;

		$pagination = paginate_links( [
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
			'type'      => 'array',
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $practiceQuery->max_num_pages,
			'end_size'  => 1,
			'mid_size'  => 1
		] );

		if ( ! empty( $pagination ) ) {
			echo '<div class="pagination-container"><ul class="pagination">';
			foreach ( $pagination as $link ) {
				echo '<li class="page-item' . '">' . str_replace( 'page-numbers', 'page-link', $link ) . '</li>';
			}
			echo '</ul></div>';
		}

		wp_reset_postdata();
		?>

        <div class="position-relative text-user">
            <p class="position-absolute bottom-0 end-0">
                <a href="#">Up</a>
            </p>
        </div>
    </main>

<?php
    endif;
    get_footer();
?>
