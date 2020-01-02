<?php
/**
 * The template part for displaying content
 */
?>
<article class="post">
	<div class="post-image">
		<a href="<?php the_permalink(); ?>" > <?php if(has_post_thumbnail()){the_post_thumbnail('main_blog_img');} ?></a>
	</div><!-- /.post-image -->
	<div class="post-content">
		<h2 class="blog_main_title"><a href="<?php the_permalink(); ?>" ><?php the_title();?></a></h2>
		<div class="post-meta">
			<span><?php esc_html_e('By :','portfolio');?> <?php the_author(); ?></span>
			<span>&nbsp;I&nbsp;  <?php esc_html_e('On : ','portfolio');?><?php echo esc_html(get_the_time('F j.Y')); ?> </span>
			<span>&nbsp;I&nbsp;  <?php esc_html_e('Tagged :','portfolio');?> <?php the_tags(' '); ?></span>
		</div>
		<p><?php if( ! has_excerpt() ) {
			echo esc_html(wp_trim_words( get_the_content(), 60, '...' )); } 
			else {echo the_excerpt(); }
		?></p>
		<?php
			wp_link_pages(array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('page','portfolio') . '</span>',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'pagelink' => '<span class="screen-reader-text">' . esc_html__('page', 'portfolio') . '</span>%',
				'separator' => '<span class="screen-reader-text">,</span>',
			));
		?>
		<a href="<?php the_permalink(); ?>" class="btn btn-success pfolio-btn"><?php esc_html_e('Read More','portfolio');?></a>
	</div><!-- /.post-content -->
	<hr>
</article><!-- /.post -->