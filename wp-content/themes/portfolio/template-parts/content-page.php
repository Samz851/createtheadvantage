<?php
/**
 * The template part for displaying single page 
 **/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?> class="post">
	<div class="post-content">		
		<h2 class="blog_main_title"><?php the_title();?></h2>
		<div class="post-meta">
			<span><?php esc_html_e('By: ','portfolio');?> <?php the_author(); ?></span>
			<span>&nbsp;I&nbsp;  <?php esc_html_e('On : ','portfolio');?> <?php echo esc_html(get_the_time('F j.Y')); ?> </span>
			<span>&nbsp;I&nbsp;  <?php esc_html_e('Tagged :','portfolio');?> <?php the_tags(' '); ?>  </span>
		</div>
		<p><?php the_content();?></p>
		<?php
			wp_link_pages(array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('pages:','portfolio') . '</span>',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'pagelink' => '<span>' . esc_html__('page', 'portfolio') . '</span>%',
				'separator' => '<span>,</span>',
			));
			?>
	</div><!-- /.post-content -->							
</article><!-- /.post -->

