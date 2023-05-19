<?php
/*
Template Name: about
*/
// Include the header
get_header();
?>

    <main>
		<?php
		// Check if there are posts
		if (have_posts()) :
			while (have_posts()) :
				// Display the post content from the database
				the_post();
				?>
                <div class="container mtb-10">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Insert the post thumbnail with specified classes -->
							<?php the_post_thumbnail('medium', ['class' => 'mg-fluid rounded-circle mb-3 img-thumbnail']); ?>
                        </div>
                        <div class="col-md-8">
                            <!-- Display the post title -->
                            <h1><?php the_title(); ?></h1>
                            <!-- Display the post content -->
							<?php the_content(); ?>
                        </div>
                    </div>
                </div>
			<?php
			endwhile;
		endif;
		?>
    </main>

<?php
// Include the footer
get_footer();
?>