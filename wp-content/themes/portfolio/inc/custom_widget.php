<?php
// register aside sidebar
add_action( 'widgets_init', 'portfolio_custom_blog_widget' );
function portfolio_custom_blog_widget() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'portfolio' ),
        'id' => 'blog_sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'portfolio' ),
        'before_widget' => '<div class="pfolio-sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '<h3><hr></div>',
    ));
}
// ===== Portfolio Blog Recent post Widget =======
function portfolio_recent_register_widgets() {
	register_widget( 'blog_recent_post' );
}
add_action( 'widgets_init', 'portfolio_recent_register_widgets' );

class blog_recent_post extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'port_blog_widget', // Base ID
			esc_html__( 'Blog Recent Widget', 'portfolio' ), // Name
			array( 'description' => esc_html__( 'A Footer Portfolio Area Social Widget', 'portfolio' ), ) // Args
		);
	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		if (( ! empty( $instance['title'] )) && ( ! empty( $instance['post_no'] )))  {	
		?>
		<div class="pfolio-sidebar-widget recent-post">
			<div class="title">
				<h3><?php echo (apply_filters( 'title', $instance['title'] ));?></h3>
				<hr>
			</div>	
			<?php
				$portfolio_recent_post = new WP_Query(array(
					'post_type'=>'post',
					'posts_per_page'=>$instance['post_no'],
				));				
				if($portfolio_recent_post->have_posts()) : while($portfolio_recent_post->have_posts())	: $portfolio_recent_post->the_post();
			?>							
				<ul>				
					<li>
						<a href="<?php the_permalink();?>">
							<p><?php the_title();?></p> 
							<span><?php echo get_the_time('l - M j,Y'); ?></span>
						</a>
					</li>	
				</ul>
			<?php endwhile; endif;?>
		</div>
		<?php	
		}
		echo $args['after_widget'];
	}
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_no'] = ( ! empty( $new_instance['post_no'] ) ) ? strip_tags( $new_instance['post_no'] ) : '';
		
		return $instance;
	}
	function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'portfolio' );
		$post_no = ! empty( $instance['post_no'] ) ? $instance['post_no'] : esc_html__( '', 'portfolio' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'portfolio' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>"><?php esc_attr_e( 'Post No:', 'portfolio' ); ?></label> 
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $post_no ); ?>" size="3">
		</p>
		<?php 
	}
}