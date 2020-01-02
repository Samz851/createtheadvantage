<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<!-- post-top start-->
<section id="blog-top">
	<?php
	// banner
	if(cs_get_option('blog_top_img')) { ?>
	<div class="pfolio-blog-top-content" style="background: url(<?php 
			echo esc_url(cs_get_option('blog_top_img'));
		?>)no-repeat center / cover"> <?php } else{?>
		<div class="pfolio-blog-top-content" >
		<?php } ?>	
		<div class="container">
		<?php if(!empty(cs_get_option('top_title'))){?>
		   <h1><?php echo esc_html(cs_get_option('top_title'));?></h1>
			<?php  }else{ ?> <h1><?php esc_html_e('OUR PAGES','portfolio');?></h1> <?php } ?>		  
			 <?php if (function_exists('portfolio_breadcrumb')) portfolio_breadcrumb(); ?>		  
		</div>      
		<div class="overlay"></div>
	</div>
</section>
<!-- post-top end-->
<!-- post-section start -->		
<div id="post-section" >
	<div class="container">
		<div class="col-md-8 col-sm-8">
			<div class="row">
				<div class="pfolio-blog-posts singlepage">
					<?php 
					// Start the loop.
						while(have_posts()): the_post();
							// Include the page content template.
							get_template_part( 'template-parts/content', 'page' );
							// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
						endwhile; 														
					 ?>
				</div>
			</div><!-- row -->
		</div><!-- col -->
	</div><!-- containenr -->
</div><!-- Blog_single_p_page_blog -->
<?php get_footer(); ?>