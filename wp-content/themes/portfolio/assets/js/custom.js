jQuery(document).ready(function () {
	"use strict";
	
	/*----------------------------
		1. Preloader
	-------------------------------*/
	jQuery(window).on('load', function () {
		jQuery("#spinningSquaresG1").delay(1000).fadeOut(500);
		jQuery(".inTurnBlurringTextG").on('click', function () {
			jQuery("#spinningSquaresG1").fadeOut(500);
		});
	});
	/*----------------------------
		2. Side Menu  portfolio 
	-------------------------------*/
	// jQuery(".main-menu.portfolio .menu-bar .menu-icon").on("click", function () {
	// 	jQuery(".menu-box").toggleClass("show");
	// });
	// //var icon3 = document.getElementById("image_link").innerHTML;
	// var icon1 = document.getElementById("image_link").innerHTML+'/assets/images/pfolio/menu-icon.png';
	// var icon2 = document.getElementById("image_link").innerHTML+'/assets/images/pfolio/menu-icon-close.png';
	// jQuery('.main-menu.portfolio .menu-icon').on("click", function () {
	// 	if (jQuery('.icon-toggle').attr('src') === icon1) {
	// 		jQuery('.icon-toggle').attr('src', icon2);
	// 	} else {
	// 		jQuery('.icon-toggle').attr('src', icon1)
	// 	}
	// });
	/*-------------------------------
		3. progress-bar and tooltip 
	--------------------------------- */
	var dataToggleTooTip = jQuery('[data-toggle="tooltip"]');
	var progressBar = jQuery(".progress-bar");
	if (progressBar.length) {
		progressBar.appear(function () {
			dataToggleTooTip.tooltip({
				trigger: 'manual'
			}).tooltip('show');
			progressBar.each(function () {
				var each_bar_width = jQuery(this).attr('aria-valuenow');
				jQuery(this).width(each_bar_width + '%');
			});
		});
	}
	/*---------------------
		4. one page scrolling 
	-------------------------*/
	jQuery('a.page-scroll').on('click', function (event) {
		var jQueryanchor = jQuery(this);
		jQuery('html, body').stop().animate({
			scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
		}, 1000, 'easeInSine');
		event.preventDefault();
	});
	/*----------------------
		5. Scroll To Top    
	-----------------------*/
	jQuery(window).on('scroll', function () {
		if (jQuery(this).scrollTop() > 600) {
			jQuery('.ScrollUp').fadeIn();
		} else {
			jQuery('.ScrollUp').fadeOut();
		}
	});
	jQuery('.ScrollUp').on('click', function () {
		jQuery('html, body').animate({
			scrollTop: 0
		}, 1500);
		return false;
	});
	/*---------------------
		6. wow js active  
	----------------------- */
	new WOW().init();
	/* --------------------
		7. counter up active  
	---------------------- */
	jQuery('.counter').counterUp({
		delay: 10,
		time: 2000
	});
	/*---------------------
	 8. magnificPopup active 
	--------------------- */
	// jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	jQuery('.portfolio-item').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery: {
			enabled: true
		}
	});
	// jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	jQuery('.image').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery: {
			enabled: true
		}
	});
	/* --------------------
	 10-2. masonry portfolio   
	------------------------ */
	jQuery(window).on('load', function () {
		// Activate isotope in container         
		jQuery(".gallery_items.portfolio").isotope({
			itemSelector: '.single_item',
			masonry: {
				columnWidth: '.single_item_sizer_portfolio'
			}
		});
		// Add isotope click function
		jQuery('.gallery_filter.portfolio li').on('click', function () {
			jQuery(".gallery_filter.portfolio li").removeClass("active");
			jQuery(this).addClass("active");
			var selector = jQuery(this).attr('data-filter');
			jQuery(".gallery_items.portfolio").isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'easing',
					queue: false,
				}
			});
			return false;
		});
	});
	/* -----------------------------------
	 10-5. masonry default  
	---------------------------------------- */
	jQuery(window).on('load', function () {
		var jQuerycontainer = jQuery('.default_portfolioContainer');
		jQuerycontainer.isotope({
			filter: '*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
			}
		});
		// Add isotope click function
		jQuery('.default_portfolioFilter a').on('click', function () {
			jQuery(".default_portfolioFilter a").removeClass("current");
			jQuery(this).addClass("current");
			var selector = jQuery(this).attr('data-filter');
			jQuery(".default_portfolioContainer").isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'easing',
					queue: false,
				}
			});
			return false;
		});
	});
	jQuery(window).on('load', function () {
		// Activate isotope in container         
		jQuery(".medical_tab_items").isotope({
			itemSelector: '.single_item',
			masonry: {
				columnWidth: '.single_item_sizer33'
			}
		});
	});
	/* ---------------------
		11-2. owlCarousel portfolio 
		------------------------ */
	jQuery("#portfolio-owl").owlCarousel({
		items: 1,
		autoplay: true,
		loop: true,
		mouseDrag: false,
		nav: false,
		navText: ["<i class='fa fa-angle-up'></i>", "<i class='fa fa-angle-down'></i>"],
		dots: true,
		dotsEach: true,
		animateOut: 'fadeInDown',
		smartSpeed: 1500,
		autoplayHoverPause: true,
	});
	/* -------------------------
		 11-5. owlCarousel default 
		----------------------------- */
	jQuery("#default-owl-carousel").owlCarousel({
		items: 1,
		autoplay: true,
		loop: true,
		mouseDrag: true,
		nav: true,
		navText: ["<i class='fa fa-angle-up'></i>", "<i class='fa fa-angle-down'></i>"],
		dots: false,
		dotsEach: false,
		animateOut: 'fadeOutUp',
		smartSpeed: 1500,
	});
	/* ------------------------------------
		 11-6. owlCarousel default-client-carousel 
		-------------------------------------- */
	jQuery("#default-client-carousel").owlCarousel({
		items: 4,
		autoplay: true,
		loop: true,
		mouseDrag: true,
		nav: false,
		navText: false,
		dots: false,
		dotsEach: false,
		smartSpeed: 800,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 4
			}
		}
	});
	/*----------------------------
	 Datetimepicker 
	---------------------------*/
	jQuery('#datetimepicker1').datetimepicker();
	jQuery('.datepicker').datepicker({
		startDate: '-3d'
	});
	/* ------------------------------------------  the end ---------------------------------------------*/
});