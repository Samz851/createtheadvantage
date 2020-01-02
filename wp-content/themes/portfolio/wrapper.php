<?php 
/**
Template Name: Landing Page
@package WordPress
* @subpackage Portfolio
 * @since Portfolio Theme 1.0
**/
get_header(); 
?>	
	<!-- Start section-edit -->
	<div id="post-section">
		<div class="">
			<?php while ( have_posts() ) : the_post();  ?>					
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div><!-- /.section-edt -->
	</div><!-- /#section-edit -->	
	
<?php get_footer();?>