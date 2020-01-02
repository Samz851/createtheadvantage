<?php
function portfolio_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? (!($args['has_children']=='depth-1') ? 'new-depth' : '') : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
		<div class="content_blog_a fix">
			<div class="e_blog_A">
				<div class="comment-author vcard" id="avater_img">
					<?php
					//avater img
					if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?> 
				</div>
			</div>
			<div class="blog_a_text">
				<h5 class="cmnt_title"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
				//Name
				printf( __( '<cite class="auther-link">%s</cite>','portfolio' ), get_comment_author_link() ); ?></a>
				<?php //Reply
				echo '<div class="reply">';
				comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 				
				echo '</div>'; ?>
				
				</h5>
				<p><?php
				//Comment Body
				comment_text();?></p>
				<h4 class="cmnt_list_date"><?php
				//time
				printf( __('%1$s at %2$s','portfolio'), get_comment_date(),  get_comment_time() ); ?></h4>
			</div>		
		</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					 <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','portfolio' ); ?></em>
					  <br />
				<?php endif; ?>
			<?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}    