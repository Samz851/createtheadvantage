<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- META DATA -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- favicon -->
		<?php if(!(function_exists('has_site_icon') & has_site_icon())){ ?>
			<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(cs_get_option('portfolio_fav_icon'));?>" >
		<?php   } ?>
		<?php wp_head();?>
		<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/cebc04bd7be0701c2002b5d53/21e050d37964b89b36b19a5b5.js");</script>
   </head>
   <body <?php body_class('portfolio-template'); ?>>
      <!-- Pre-loader Start -->
      <div id="spinningSquaresG1">
         <div id="spinningSquaresG2">
            <div id="cssload-loader">
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
               <div class="cssload-dot"></div>
            </div>
         </div>
      </div>
      <!-- Pre-loader End -->
      <!-- main menu -->
      <div id="main-navigation" class="main-menu-are" >
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-3 col-sm-3 col-xs-3">
                  <div class="portfolio logo">
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
						if(cs_get_option('portfolio_logo')){?>
							<img src="<?php echo esc_url(wp_get_attachment_image_src( cs_get_option('portfolio_logo'), 'full') [0]);?>" alt="<?php esc_html_e('Portfolio','portfolio');?>" />
						<?php  }else{ ?> <h2 class="logo_title"><?php echo esc_attr( get_bloginfo( 'name', 'display' )); ?></h2> <?php } ?>
                     </a>
                  </div>
               </div>
               <!-- end logo -->
               <div class="col-md-9 col-sm-9 col-xs-9">			   			  
                  <div class="main-menu portfolio">
                     <div class="menu-bar">
                        <div class="menu-icon">						
                           <!-- <i class="fa fa-list"></i> -->
						   <p id="image_link" ><?php echo get_template_directory_uri();?></p>
                           <img src="<?php echo get_template_directory_uri();?>/assets/images/pfolio/menu-icon.png" id="icon-toggle" class="icon-toggle" alt="<?php esc_html_e('Portfolio','portfolio');?>">
                        </div>
                     </div>
                     <!-- end icon -->
                     <div class="menu-box">
                        <nav class="main-nav">
                           <!-- Menu -->
							<?php
								if(has_nav_menu('header_menu')){
								wp_nav_menu( array(
									'menu'              => 'header_menu',
									'theme_location'    => 'header_menu',
									'depth'             => 10,
									'container'         => 'nav',
									//'container_class'   => 'drop-menu',
									//'container_id'      => 'navbar-ex1-collapse',
									'menu_class'        => 'drop-menu',
									'fallback_cb'       => 'portfolio_WP_Bootstrap_Navwalker::fallback',
									'walker'            => new portfolio_WP_Bootstrap_Navwalker()
								));
								} else { ?>
										<ul class="drop-menu">
											<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php esc_html_e('Set Up Your Menu','portfolio');?></a></li>
										</ul>
								<?php }
							?>
                        </nav>
                     </div>
                  </div>
                  <!-- end main menu -->
               </div>
            </div>
         </div>
      </div>
      <!-- main menu end -->