<!-- Footer -->
<footer>
    <div class="navbar-fixed-bottom row-fluid bg-dark p">
        <div class="navbar-inner">
            <div class="container-fluid ">
                <div class="container d-flex justify-content-evenly">
					<?php
					$dynamic_sidebar = [ 'ph-footer-column-1', 'ph-footer-column-2', 'ph-footer-column-3', 'ph-footer-column-4' ];

					foreach ( $dynamic_sidebar as $sidebar ) {
						if ( is_active_sidebar( $sidebar ) ) { // Check if there are widgets in the current column
							dynamic_sidebar( $sidebar ); // Output widgets from the current column
						}
					}
					?>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Modal Window -->
<div class="modal fade" id="signIn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Window Content -->
            <div class="modal-header">
                <h4 class="modal-title" id="signIn">Sign In</h4>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Output login form -->
				<?php wp_login_form(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Include scripts, CSS, JS, and other functions required by WordPress -->
<?php wp_footer(); ?>

</body>
</html>
