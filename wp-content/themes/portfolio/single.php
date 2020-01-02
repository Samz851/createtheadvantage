<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since Portfolio Theme 1.0
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
			<header>
				<h1><?php single_post_title(); ?></h1>
			</header>		  
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
			<?php
				while(have_posts()) : the_post();	
			?>
			<div class="col-md-8 col-sm-8">
				<div class="pfolio-blog-posts singlepage">
				<?php $sticky = !is_sticky() ? "non-sticky" : 'sticky'; ?>
					<article  id="post-<?php the_ID(); ?>"  <?php post_class($sticky); ?>>
						<?php
						$format = array( 'image', 'video', 'gallery', 'aside', 'link', 'audio', 'quote', 'status', 'chat' ); 
						if ( has_post_format( $format) || has_post_thumbnail() ) { ?>
							<div class="post-image">
								  <?php get_template_part( 'template-parts/front', 'postformate');?>
							</div>
							<?php } ?>
						<div class="post-content">
							<h2 class="blog_main_title"><a><?php the_title();?></a></h2>
							<div class="post-meta">
								<span><?php esc_html_e('By :','portfolio');?> <?php the_author(); ?></span>
								<span>&nbsp;I&nbsp; <?php esc_html_e('On : ','portfolio');?><?php echo esc_html(get_the_time('F j.Y')); ?> </span>
								<span>&nbsp;I&nbsp;  <?php esc_html_e('Tagged :','portfolio');?> <?php the_tags(' '); ?></span>
							</div>
							<p><?php the_content(); ?></p>
							<?php
								wp_link_pages(array(
										'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('page','portfolio') . '</span>',
										'after' => '</div>',
										'link_before' => '<span>',
										'link_after' => '</span>',
										'pagelink' => '<span>' . esc_html__('page', 'portfolio') . '</span>%',
										'separator' => '<span>,</span>',
									));
								?>
						</div><!-- /.post-content -->							
					</article><!-- /.post -->
					<?php 
					global $user_ID;
					if ( get_the_author_meta('description', $user_ID) ) { ?>
					<div class="pfolio-blog-author">
						<div class="row">
							<div class="col-md-2">
								<div class="thumb">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
								</div>
							</div>
							<div class="col-md-10">
								<div class="info">
									<h4><?php esc_html_e('About The Author','portfolio');?></h4>
									<h5><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author();?></a>
									</h5>
									<p><?php the_author_meta( 'description') ?></p>
								</div>
							</div>
						</div>
					</div>				
					<div class="pfolio-blog-author-profiles text-center">
						 <a href="<?php the_author_meta( 'facebook' ); ?>"><i class="fa fa-facebook"></i></a>
						 <a href="<?php the_author_meta( 'gplus' ); ?>"><i class="fa fa-google-plus"></i></a>
						 <a href="<?php the_author_meta( 'twitter' ); ?>"><i class="fa fa-twitter"></i></a>
						 <a href="<?php the_author_meta( 'linkedin' ); ?>"><i class="fa fa-linkedin"></i></a>
						 <a href="<?php the_author_meta( 'pinterest' ); ?>"><i class="fa fa-pinterest-p"></i></a>
							<hr>
					</div>
					<?php  } 					
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					?>
				</div><!-- /.blog-posts -->
			</div><!-- /.col-md-8 -->
			<?php endwhile;		
			get_sidebar(); ?>
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