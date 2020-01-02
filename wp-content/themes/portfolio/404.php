<?php
/**
 * The template for displaying 404 pages (not found)
 *
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
		   <?php if(!empty(cs_get_option('eror_top_title'))){?>
		   <h1><?php echo esc_html(cs_get_option('eror_top_title'));?> </h1>
			<?php  }else{ ?> <h1><?php esc_html_e('Nothing Found','portfolio');?></h1> <?php } ?>			
			<?php if (function_exists('portfolio_breadcrumb')) portfolio_breadcrumb(); ?>
		</div>       
		<div class="overlay"></div>
	</div>
</section>
<!-- post-top end-->
<!-- Start blog -->		
<div id="post-section" >
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="pfolio-blog-posts">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'portfolio' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'portfolio' ); ?></p>
							<?php get_search_form(); ?>
							<!-- .page-back -->
							<div class="go-back">
								<p><a href="<?php echo esc_url(site_url()); ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
									<?php esc_html_e(' GO BACK HOME', 'portfolio' ); ?>
								</a></p>	
							</div>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
			</div>
		</div><!-- /.container -->
	</div><!-- /.container -->
</div><!-- /.blogg -->
<?php get_footer(); ?>