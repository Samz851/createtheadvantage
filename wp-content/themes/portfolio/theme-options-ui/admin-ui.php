<?php
/** Step 2 (from text above). */
add_action( 'admin_menu', 'sam_theme_options_menu' );

/** Step 1. */
function sam_theme_options_menu() {
	add_options_page( 'Sam Themes', 'Theme Options', 'edit_theme_options', 'sam-theme-options', 'sam_theme_options' );
}

/** Step 3. */
function sam_theme_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}