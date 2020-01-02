
<!-- /.travel-dynamic-sidebar -->

<?php if ( is_active_sidebar( 'blog_sidebar' ) ) { ?>
<div class="col-md-4 col-sm-4">
	<aside class="pfolio-sidebar ">
		
		<?php dynamic_sidebar( 'blog_sidebar' ); ?>

	</aside><!-- /.sidebar -->
</div><!-- /.col-md-4 -->
<?php } ?>