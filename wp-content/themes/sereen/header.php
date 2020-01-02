<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- META DATA -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    if (is_home() && !is_front_page()) {
      echo "<style>
      .pfolio-blog-top-content .overlay{
        background-color: transparent !important;
      }
    </style>";
    } else if (!is_front_page()) {
      echo"<style>
        div.collapse.navbar-collapse.navbar-ex1-collapse {
          // background-color:#ffffffd5 !important;
        }
      </style>"; } ?>
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
<nav class="navbar navbar-default" role="navigation"> 
<!-- Brand and toggle get grouped for better mobile display --> 
  <div class="navbar-header"> 
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
      <span class="sr-only">Toggle navigation</span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
    </button> 
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
						<?php
						if(cs_get_option('portfolio_logo')){?>
							<img src="<?php echo esc_url(wp_get_attachment_image_src( cs_get_option('portfolio_logo'), 'full') [0]);?>" alt="<?php esc_html_e('Portfolio','portfolio');?>" />
            <?php  }else{ ?> <h2 class="logo_title"><?php echo esc_attr( get_bloginfo( 'name', 'display' )); ?></h2> <?php } ?>
            CREATE THE ADVANTAGE
    </a>
  </div> 
  <!-- Collect the nav links, forms, and other content for toggling --> 
  <div class="collapse navbar-collapse navbar-ex1-collapse">
  <?php
								if(has_nav_menu('header_menu')){
								wp_nav_menu( array(
									'menu'              => 'header_menu',
									'theme_location'    => 'header_menu',
									'depth'             => 10,
									'container'         => 'nav',
									//'container_class'   => 'drop-menu',
									//'container_id'      => 'navbar-ex1-collapse',
									'menu_class'        => 'nav navbar-nav',
									'fallback_cb'       => 'portfolio_WP_Bootstrap_Navwalker::fallback',
									'walker'            => new portfolio_WP_Bootstrap_Navwalker()
								));
								} else { ?>
										<ul class="drop-menu">
											<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php esc_html_e('Set Up Your Menu','portfolio');?></a></li>
										</ul>
								<?php }
							?>
    <!-- <ul class="nav navbar-nav"> 
      <li class="active"><a href="#">Link</a></li> 
      <li><a href="#">Link</a></li> 
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> 
        <ul class="dropdown-menu"> 
          <li><a href="#">Action</a></li> 
          <li><a href="#">Another action</a></li> 
          <li><a href="#">Something else here</a></li> 
          <li><a href="#">Separated link</a></li> 
          <li><a href="#">One more separated link</a></li> 
        </ul> 
      </li> 
    </ul> -->
  </div>
</nav>
      <!-- main menu end -->