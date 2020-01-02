<!-- footer start -->       
<footer id="footer">
         <div class="portfolio-footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-4">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer one") ) : ?>
                        <?php endif;?>
                    </div>
                    <div class="col-md-4">
                        <div class="social-footer">
                            <a href="https://in.linkedin.com/in/serene-khalil-10172026"><img src="/wp-content/uploads/2018/08/linked.png" alt="cta linkedin" /></a>
                        </div>
                        <div class="social-footer">
                            <a href="https://www.instagram.com/cr8theadvantage"><img src="/wp-content/uploads/2018/08/100px-Instagram_logo_2016.svg_.png" alt="cta instagram" /></a>
                        </div>
                        <div class="social-footer">
                            <a href="https://www.facebook.com/sereen.ziadeh"><img src="/wp-content/uploads/2018/08/File_Logo_facebook.png" alt="cta facebook" /></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer two") ) : ?>
                        <?php endif;?>
                    </div>
                  </div>
               </div>
               <div class="row">
                    <div class="portfolio-copyright-txt text-center">
                        <ul>
							<li><?php esc_html_e('@Sam.ota 2018,','travel')?></a></li>
							<li><?php esc_html_e('All Rights Reserved','travel')?></li>
                        </ul>
                    </div>
               </div>
            </div>
            <a class="ScrollUp" id="portfolioScrollUp" href="#">
            	<i class="fa fa-angle-double-up"></i>
            </a>
         </div>
      </footer>
      <!-- footer end -->
	  <?php wp_footer();?>
   </body>
</html>