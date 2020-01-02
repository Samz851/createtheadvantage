<?php
/**
 * The template for displaying search results pages
 *
@package WordPress
* @subpackage Portfolio
 * @since Portfolio Theme 1.0
**/
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
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'portfolio' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header --> 		  
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
				<div class="pfolio-blog-posts singlepage">
					<?php if ( have_posts() ) : ?>
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
						// End the loop.
						endwhile;
						// Previous/next page navigation.
						?>
						<nav aria-label="..." class="text-center">
						  <ul class="pfolio-pagination pagination">							
							<?php
								// Previous/next page navigation.
								echo paginate_links( array(
									'prev_text'     => esc_html__( '<', 'portfolio' ),
									'next_text'    => esc_html__( '>', 'portfolio' ),
								) );
							?>
						  </ul><!-- /.portfolio-pagination pagination -->
						</nav>
					  <?php
					// If no content, include the "No posts found" template.
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