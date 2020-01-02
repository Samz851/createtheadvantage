<?php 							
	if(get_post_format() == "aside") {
		$aside =  get_post_meta( get_the_ID(), '_aside_posts', true );
		if( !empty( $aside )){
		echo '<div class="block-quote" style="background: '. $aside['aside_background'] .';">';
		echo '<p style="color:'. $aside['aside_font_clr'] .'">'. $aside['aside_textarea'] .'</p>';
		
		echo '</div>';
		}
	}
	elseif(get_post_format() == "image") {			
		$image =  get_post_meta( get_the_ID(), '_image_posts', true );
		if( !empty( $image )){
			if( is_single() ){
				echo '<img src="'. $image['image'] .'" alt="';?><?php esc_html_e('Portfolio','portfolio');?><?php echo '"/>';
			}else{			
			echo '<a href="'; ?><?php the_permalink();?><?php echo '"><img src="'. $image['image'] .'" alt="';?><?php esc_html_e('Portfolio','portfolio');?><?php echo '"/></a>';		
			}		
		}
	}
	elseif( get_post_format() == "quote" ) {
		$quote =  get_post_meta( get_the_ID(), '_quote_posts', true );
		if( !empty( $quote )){
		echo '<div class="block-quote" style="background: '. $quote['quote_background'] .';">';
		echo '<p style="color:'. $quote['quote_font_clr'] .'">'. $quote['quote_textarea'] .'</p>';
		echo '<a style="color:'. $quote['quote_font_clr'] .'" class="block-quote-a" href="'. $quote['quote_text'] .'">'. $quote['quote'] .'</a>';
		echo '</div>';
		}
	}
	elseif( get_post_format() == "link" ) {
		$link =  get_post_meta( get_the_ID(), '_link_posts', true );
		if( !empty( $link )){
		echo '<div style="background:'. $link['link_background'] .'" class="link-post"><a style="color:'. $link['link_font_clr'] .'" class="link-posst-a" href="'. $link['link'] .'">'. $link['link_text'] .'</a></div>';
		}
	}
	elseif(get_post_format() == "gallery") {
		$gallery =  get_post_meta( get_the_ID(), '_gallery_posts', true );		
		if( ! empty( $gallery['gallery'] ) ) {
		  $ids = explode( ',', $gallery['gallery'] );?>
		  <div class="gallary-div">
			<div class="b11-img">
				<div id="carouselexamplegeneric" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php 
							$i = 0;
								foreach($ids as $id){
									$attachment = wp_get_attachment_image_src( $id, 'full' );
									?>
									<div class="item 
										<?php if (!$i){
											echo esc_attr( 'active', 'portfolio' );
										}else{
											echo esc_html__( ' ', 'portfolio' );
										}?>">
										<img src="<?php echo $attachment[0]?>" alt="<?php esc_html_e('Portfolio','portfolio');?>" >
									</div>
								<?php $i=1; }
							?>
					</div>
					<div class="car">
					<a class="left carousel-control" href="#carouselexamplegeneric" data-slide="prev">
						<span class="fa fa-angle-left"></span>
						<span class="sr-only"><?php echo esc_html__( 'Previous', 'portfolio' );?></span>
					</a>
					<a class="right carousel-control" href="#carouselexamplegeneric" data-slide="next">
						<span class="fa fa-angle-right"></span>
						<span class="sr-only"><?php echo esc_html__( 'Next', 'portfolio' );?></span>
					</a>
					</div>
				</div>
			</div>
		  </div>
		<?php }
	}
	elseif( get_post_format() == "audio" ) {
		$audio =  get_post_meta( get_the_ID(), '_audio_posts', true );
		if( !empty($audio)){
		$allowed_html_array = array(
			'iframe' => array(
				'src' 				=> array()
			));
		echo wp_kses( $audio['audio_id'], $allowed_html_array );	
		}
	}
	elseif(get_post_format() == "video") {
				$video = get_post_meta( get_the_ID(), '_video_posts', true );
				if( !empty( $video )){
					if( $video['video_id'] ) {
						$allowed_html_array = array(
							'iframe' => array(
								'src' => array(),
								'allowfullscreen' => array()
							)
						); 
					}
					?><div id="myvideos"><?php
				   echo wp_kses( $video['video_id'], $allowed_html_array );	
				   ?></div><?php
					}
				}
	else { 
		if( !is_single() ){
			echo '<a href="'.get_permalink().'">';
			 if ( has_post_thumbnail() ) the_post_thumbnail(); 
			echo '</a>';
		}else{
			if ( has_post_thumbnail() ) the_post_thumbnail();
			}
		}
?>