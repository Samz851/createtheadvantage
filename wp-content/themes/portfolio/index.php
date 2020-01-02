<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage portfolio
 * @since portfolio Theme 1.0
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
			<?php  }else{ ?> <h1><?php esc_html_e('OUR BLOG','portfolio');?></h1> <?php } ?>		  
			 <?php if (function_exists('portfolio_breadcrumb')) portfolio_breadcrumb(); ?>		  
		</div>      
		<div class="overlay"></div>
	</div>
</section>
<!-- post-top end-->
<!-- post-section start-->
<div id="post-section" >
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="pfolio-blog-posts">
				<?php
					$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$portfolio_blog_post = new WP_Query(array(
						'post_type'=>'post',
						'paged'=>$current_page
					));
					if($portfolio_blog_post-> have_posts()) : while($portfolio_blog_post-> have_posts()) : $portfolio_blog_post-> the_post();
					
					
					get_template_part( 'template-parts/content', get_post_format() );
				?>
				<?php endwhile; ?>
					<nav aria-label="..." class="text-center">
					  <ul class="pfolio-pagination pagination">							
						<?php
							// Previous/next page navigation.
							echo paginate_links( array(
								'prev_text'     => esc_html__( '<', 'portfolio' ),
								'next_text'    => esc_html__( '>', 'portfolio' ),
								'total' => $portfolio_blog_post->max_num_pages
							) );
						?>
					  </ul><!-- /.portfolio-pagination pagination -->
					</nav>
				<?php
					//$args If no content, include the "No posts found" template.
					else :
					get_template_part( 'template-parts/content', 'none' );
					endif; 			
				?>
				</div><!-- /.blog-posts -->
			</div><!-- /.col-md-8 -->
			<?php get_sidebar(); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>
<!-- post-section end -->
<!-- subscribe start -->
<?php if(cs_get_option('newsletter_title')){ ?>
<section id="subscribe">
	<div class="pfolio-subscribe">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>
					<?php
					//Newsletter title
					if(cs_get_option('newsletter_title')){
						echo esc_html(cs_get_option('newsletter_title'));
					}else{							
						echo esc_html__('SUBSCRIBE TO OUR NEWSLETTER','portfolio');
					}
					?>
					</h2>
				</div>
				<div class="col-md-offset-1 col-md-5">
					<div class="sub-form">								
					<?php
						//Newsletter shortcode goes here....
						$code = cs_get_option('newslatter_shortcode');
						echo do_shortcode($code);
					?>														
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!-- subscribe end -->
<?php get_footer();?>