<?php
/**
 * Template for displaying search forms in Portfolio
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since 1.0
 * @version 1.0
 */

?>
<div class="pfolio-sidebar-widget search">
	<form class="search"action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	   <input type="text" placeholder="search" name="s" value="<?php echo the_search_query(); ?>">
	   <button type="submit" class="monty-blog-search-btn btn btn-primary">
	   <i class="fa fa-search"></i>
	   </button>
	</form>
</div>



	
