<?php
/**
 * The template for displaying comments
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area ">
	<?php if ( have_comments() ) : ?>
	<!--Comment TItle-->
		<a href="#" class="_comments1">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'portfolio' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s COMMENT',
							'%1$s COMMENTS',
							$comments_number,
							'comments title',
							'portfolio'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</a>
		<!-- comment-Body -->
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'callback'       => 'portfolio_comment',
					'style'       => '<div class="form-group">',
					'short_ping'  => true,
					'avatar_size' => 100,
				) );
			?>
		</ol><!-- .comment-list -->
		<?php the_comments_pagination(array(
				'prev_text'     => esc_html__( '<', 'portfolio' ),
				'next_text'    => esc_html__( '>', 'portfolio' ),
			)); ?>
		
	<?php endif; // Check for have_comments(). ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'portfolio' ); ?></p>
	<?php endif; ?>
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<div class="comments">
	<div class="comment-form">
		<div class="row">
			<div class="col-md-12">	
				<div class="msg_form">	
					<?php $comments_args = array(
						// change the title of send button 
						'label_submit'=>' ',
						// change the title of the repln
						'title_reply'=> esc_html__('Leave a Comment','portfolio') ,
						// remove "Text or HTML to be displayed after the set of comment fields"
						'comment_form_top' => 'ds',
						'comment_notes_before' => '',
						//comment notes after for complete field text.
						'comment_notes_after' => '<p class="req_field">' .
								esc_html__( '*PLEASE COMPLETE ALL FIELDS CORRECTLY','portfolio' ) .
								'</p>',
						// redefine your own textarea (the comment body)
					  //message field
						'comment_field' => 
							'<div class="form-group">
								<textarea id="comment" name="comment" class="message form-control" rows="4" aria-required="true" placeholder="'. esc_html__('Your Message','portfolio') .'"></textarea>
							</div>',
						'fields' => apply_filters( 'comment_form_default_fields', array(	
						//author field
						'author' =>
							'<div class="form-group">
								<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .
									'" placeholder="'. esc_html__('* Your Name','portfolio') .'">
							</div>',
						//email field
						'email' =>'
							<div class="form-group">
								<input id="email" class="form-control" class="blog-form-input" name="email" type="email" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
									'"  placeholder="'. esc_html__('* Your Email','portfolio') .'">
							</div>',
					)),					
						//submit field
						'submit_button'        => 
						'<input name="submit" class="pfolio-btn submit" type="submit" id="submit" value="'. esc_html__('Send Message','portfolio') .'">',
				);
//comment_form($comments_args);
		// This function will work for the comment box move to bottom 		
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
comment_form($comments_args); 
?>													
					</div>															
				</div>															
			</div>															
		</div>															
	</div>															
</div><!-- .comments-area -->