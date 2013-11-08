var mobileMenu = function(){
    "use strict";
	jQuery('#navigation').prepend('<div class="mobile-menu-controller">Menu</div>');
	var hammertime = jQuery(".header").hammer();
	if(jQuery('html').hasClass('touch')) {
		hammertime.on('touch', '.mobile-menu-controller', function(){
			jQuery(this).siblings('#menu').toggleClass('show'); //slideToggle();
		});
	} else {
		jQuery(document).on('click', '.mobile-menu-controller', function(){
			jQuery(this).siblings('#menu').toggleClass('show'); //slideToggle();
		}); 
	}
};
jQuery.fn.slideFadeToggle  = function(speed, easing, callback) {
    "use strict";
	return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};


/********************************
		Document Load Event
********************************/
jQuery(document).ready(function() {
    "use strict";
	var ajax_url = jQuery('#ajax_url').val();
	var swf_payer_url = jQuery('#template_url').val()+'/js';

	jQuery('.slider.parallax').each(function(){
		jQuery(this).css({
			opacity:0,
			display:'block'
		});
		var optionHeight = jQuery(this).find('.content-area').height();
		jQuery(this).css({
			opacity:1,
			display:'none'
		});
		jQuery(this).find('.content-area').css('margin-top',-(optionHeight/2));
	});

	/********************************
			Sticky Header
	********************************/

	if(jQuery('.header').hasClass('sticky') && jQuery(window).width() > 767 ){

		var header = jQuery('.header'),
			header_next = header.next('.section'),
			next_padding =  parseInt(header_next.css('padding-top'));
		if(header_next.hasClass('full-screen-slider')) {
			header_next.css('padding-top', ( header.height() )+'px');
		} else {
			header_next.css('padding-top', (header.height() + next_padding)+'px');
		}	
		

	}

	/********************************
			Navigation Menu
	********************************/
	jQuery('#menu').menu();
	jQuery('#menu').find('a').click(function(e){
		if(jQuery(window).width() < 767) {
			jQuery('#menu').toggleClass('show');
		}
		var $go_to = jQuery(this).attr('href');
		var param = $go_to.split('#')[1];
		var $go_to_url = $go_to.split('#')[0];
		var $current_url = window.location.href.split('#')[0];		
		var scroll_distance = jQuery('#'+param).offset().top;
		function cleanURL(url) {
			    if(url.match(/http:\/\//))
			    {
			        url = url.substring(7);
			    }
			    if(url.match(/^www\./))
			    {
			        url = url.substring(4);
			    }

			    return url;
		}
		$go_to = cleanURL($go_to_url);
		$current_url = cleanURL($current_url);
		if(jQuery(this).closest('#menu').hasClass('render')) {
			if(param) {
				e.preventDefault();

				if(jQuery('#'+param).length > 0) {
					
					if(jQuery(window).width() > 767){
						if(jQuery('.header').hasClass('sticky')){
							scroll_distance = scroll_distance - jQuery('.header').outerHeight(); 
						} else {
							scroll_distance = scroll_distance; 
						}
					}
					
					if($go_to == $current_url) { 
						
						jQuery('html, body, document').stop().animate({scrollTop: scroll_distance }, 1000, 'easeOutQuart', function(){
							window.location.hash = param;
							jQuery('html, body, document').stop().animate({scrollTop: scroll_distance }, 0);
						});
					}
					else {
						window.location = $go_to_url+'#'+param;
					}
				} else {
					window.location = $go_to_url+'#'+param;
				}
			} else {
				window.location = $go_to_url;
			}
		}
	});
	if(jQuery('#menu').hasClass('render')){
		jQuery('body').find('section.section').each(function(i){
			i++;
			jQuery(this).attr('id','section-'+i);
		});
	}
	mobileMenu();
	jQuery(window).smartresize(function() {
		if(jQuery('.header').hasClass('sticky') && jQuery(window).width() > 767 ){

			var header = jQuery('.header'),
				header_next = header.next('.section');
				//next_padding =  parseInt(header_next.css('padding-top'));
			if(header_next.hasClass('full-screen-slider')) {
				header_next.css('padding-top', ( header.height() )+'px');
			} else {
				header_next.css('padding-top', (header.height() + 100)+'px');
			}	
			

		}
		if(jQuery(window).width() > 960 || jQuery(window).width() < 768 ) {
			jQuery('.header').find('.content-area').css({'padding-top':'0px', 'padding-bottom': '0px'});
		}		
	});
	
	/********************************
			Parallax
	********************************/
	jQuery('section.section').each(function() {
      if(!jQuery('html').hasClass('touch') && !jQuery(this).hasClass('no-parallax')) {
        jQuery(this).parallax("50%", 0.1);
      }
	});
	
	/********************************
			TextBox Placeholder
	********************************/
	jQuery('input[placeholder], textarea[placeholder]').placeholder();
	
	/***** SEARCH WIDGET *****/
	jQuery('#s').attr('placeholder','Type keyword and hit Enter...');
	jQuery('#s').placeholder();
	/********************************
			Responsive Iframe
	********************************/
	jQuery("body").fitVids();
	/********************************
			Tabs
	********************************/
	var $tabs=jQuery('.tabs');
	if($tabs.length > 0) {
		$tabs.each(function() {
			jQuery(this).tabs({ fx: { opacity:'toggle', duration: 'medium' } });
		});
	}
	/********************************
			Accordian
	********************************/
	var $accordion=jQuery('.accordion');
	if($accordion.length > 0) {
		$accordion.each(function() {
			jQuery(this).accordion({
				collapsible: true,
				heightStyle: "content"
			});
			jQuery(this).find('h3:not(:first-child)').addClass('top-space');
		});
	}
	/********************************
			Notifications
	********************************/

var iOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false );	
	if(iOS === false) {
		jQuery('video,audio').mediaelementplayer({
			videoWidth: '100%',
			videoHeight: '100%',
			audioWidth: '100%',
			alwaysShowControls:true
		});
	}
	jQuery('.notification').find('.close').on('click',function(){
		jQuery(this).closest('.notification').fadeOut(function(){
			jQuery(this).remove();
		});
	});

	/********************************
			BUTTON 
	********************************/
	var button = jQuery('.button');
	if(button.length > 0) {
		button.hover(function(){
			var hover_color=jQuery(this).attr("data-hover-color");
			jQuery(this).stop().animate({backgroundColor: hover_color}, 700);
		},function(){
			var default_color=jQuery(this).attr("data-default-color");
			jQuery(this).stop().animate({backgroundColor: default_color}, 700);
		});
	}
	
	var icon = jQuery('.font-icon');
	if(icon.length > 0) {
		icon.hover(function(){
			var hover_bg_color=jQuery(this).attr("data-bg-hover-color");
			var hover_color=jQuery(this).attr("data-hover-color");
			jQuery(this).stop().animate({backgroundColor: hover_bg_color,color: hover_color}, 700);
		},function(){
			var default__bg_color=jQuery(this).attr("data-bg-color");
			var default_color=jQuery(this).attr("data-color");
			jQuery(this).stop().animate({backgroundColor: default__bg_color,color: default_color}, 700);
		});
	}

	var $blog = jQuery('.blog-posts');
	$blog.imagesLoaded( function(){
		$blog.isotope({
			itemSelector : '.blog-post',
			masonry : {
				gutterWidth: 29
			}
		});
	});
	jQuery(document).on('mouseenter','.blog-post.format-image',function(){
		var image_post = jQuery(this).find('.blog-post-content-area-wrap');
		image_post.css({'visibility':'hidden','display':'block'});
		var image_post_height = jQuery(this).height();  //.fadeIn(500);
		var image_content_height = image_post.find('.blog-post-content-area').height(); 
		image_post.find('.blog-post-content-area').css('margin-top', (image_post_height/2 - image_content_height/2)+'px');
		image_post.css({'visibility':'visible','display':'none'}).fadeIn(500);
		//.find('.blog-post-content-area').css('margin-top', (image_post_format.height()/2 - jQuery(this).height/2)+'px');
	});
	jQuery(document).on('mouseleave','.blog-post.format-image',function(){
		//var image_post_format = jQuery('.format-image');
		//image_post_format.find('.blog-post-content-area').css('margin-top', (image_post_format.height()/2 - jQuery(this).height/2)+'px');		
		jQuery(this).find('.blog-post-content-area-wrap').fadeOut(500);
	});
	var $rpl_ttl=jQuery(".trigger_infinite_scroll");
	$rpl_ttl.on('click',function() {
		var $this=jQuery(this);
		var paged = $this.attr("data-paged");
		if($this.data("posts-count") === 0){
			return false;
		}
		$this.next('.blog-overlay').fadeIn();
		$this.find('.icon-cog.icon-spin').show();
		jQuery.ajax({
			type: "POST",
			url: ajax_url,
			data: "action=get_blog&blog_paged="+paged
		}).done(function(data) {
			if(data === 0) {
				$this.next('.blog-overlay').fadeOut();
				$this.find('.icon-cog.icon-spin').hide();
				$this.next('.blog-overlay').next('.blog-notify').slideDown();
			}
			if(data) {
				var $newItems = jQuery(data);
				$newItems.imagesLoaded(function(){
					$this.prev('.blog-posts').append( $newItems ).isotope( 'appended', $newItems, function(){
						$newItems.find('.blog-flexslider').each(function() {
							jQuery(this).flexslider({
								animation: "fade",
								controlNav: true,
								smoothHeight: true,
								slideshow: false,
								directionNav: false,
								start: function(slider){
									slider.closest('.blog-posts').isotope( 'reLayout' );
								},
								after: function(slider){
									slider.closest('.blog-posts').isotope( 'reLayout' );
								}
							});
						});
						
						$newItems.find('.audio,.custom-video').each(function() {
							jQuery(this).mediaelementplayer();
						});
						$newItems.fitVids();
						$this.attr('data-paged',parseInt($this.attr('data-paged'),10)+1);
						$this.attr('data-posts-count',parseInt($this.attr('data-posts-count'),10)-$newItems.length);
						$this.find('.post-page-number').html($this.attr('data-posts-count')+" Posts Remaining");
						//$this.find('.post-page-count').html($this.attr('data-posts-count')+" Posts left");
						$blog.isotope( 'reLayout', function() {
							$this.next('.blog-overlay').fadeOut();
							$this.find('.icon-cog.icon-spin').hide();
						});
					});
				});
			}
		});
	});
	/********************************
			Portfolio
	********************************/
	var $full_screen_portfolio = jQuery('.full-screen-portfolio').find('.portfolio-container');
	var $centered_screen_portfolio = jQuery('.centered-screen-portfolio').find('.portfolio-container');
	$full_screen_portfolio.imagesLoaded( function(){
		$full_screen_portfolio.isotope({
			itemSelector : '.element'
		});
	});
	
	$centered_screen_portfolio.imagesLoaded( function(){
		$centered_screen_portfolio.isotope({
			itemSelector : '.element',
			masonry: {
				gutterWidth: 38
			}
		});
	});

	jQuery(window).smartresize(function(){
		$full_screen_portfolio.imagesLoaded( function(){
			$full_screen_portfolio.isotope( 'reLayout' );
		});
		$centered_screen_portfolio.imagesLoaded( function(){
			$centered_screen_portfolio.isotope( 'reLayout' );
		});
		$blog.imagesLoaded( function(){
			$blog.isotope( 'reLayout' );
		});
	}).smartresize();	
	
	
	jQuery(".filter").on("click",function(e){
		e.preventDefault();
		var $this=jQuery(this);
		$this.closest(".portfolio-filter").find(".filter").removeClass("current");
		$this.addClass("current");
		var myClass = $this.attr("data-id");
		$this.closest('.portfolio-wrapper').find('.portfolio-container').isotope({ filter: '.'+myClass });
	});
	
	jQuery(document).on('click','.filter-overlay',function(e) {
		e.preventDefault();
	});
	/********************************
			Contact
	********************************/
	if(jQuery(".contact_form").length > 0) {
		jQuery(".contact_submit").on('click',function() {
			var $this=jQuery(this);
			var $contact_status=$this.closest('.contact_form').find(".contact_status");
			var $contact_notify=$this.closest('.contact_form').find(".notification");
			var $contact_loader=$this.closest('.contact_form').find(".contact_loader");
			$contact_loader.fadeIn();
			jQuery.ajax({
				type: "POST",
				url: ajax_url,
				dataType: 'json',
				data: "action=contact_authentication&"+jQuery(this).closest(".contact").serialize(),
				success	: function(msg) {
					$contact_loader.fadeOut();
					if(msg.status === "error") {
						$contact_notify.removeClass("green").addClass("red");
					}
					else {
						$contact_notify.addClass("green").removeClass("red");
					}
					$contact_status.html(msg.data);
					$contact_notify.slideDown();
				},
				error: function() {
					$contact_status.html("Please Try Again Later").slideDown();
				}
			});
			return false;
		});
	}

		jQuery('.popup-gallery').magnificPopup({
	          delegate: 'a',
	          type: 'image',
	          tLoading: 'Loading image #%curr%...',
	          mainClass: 'mfp-img-mobile',
	          gallery: {
	            enabled: true,
	            navigateByImgClick: true,
	            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	          },
	          image: {
	            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
	          }
	    });
     
        jQuery('.lightbox').on('click' , function(e){
        	e.preventDefault();
	        jQuery(this).next('.popup-gallery').magnificPopup('open');
        });	


	/********************************
		Bottom Widgets
	********************************/
	jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() !== 0) {
			jQuery('.bottom-widget-controller').fadeIn();	
		} else {
			jQuery('.bottom-widget-controller').fadeOut();
		}
	});
	jQuery('.bottom-widget-controller').click(function(e) {
		e.preventDefault();
		jQuery("html, body").animate({ scrollTop: 0 }, 1000, 'easeOutQuart',function(){
			window.location.hash='';
		});
	});
	if(jQuery('.section.bottom-widget').find('.content-area .widgets:nth-child(3n) + div.clear').length <= 0) {
		jQuery('.section.bottom-widget').find('.content-area .widgets:nth-child(3n)').addClass('last').after('<div class="clear"></div>');
	}
	jQuery(window).smartresize(function(){
		sidebar_widget();
	});
	sidebar_widget();
	function sidebar_widget() {
      var $sidebar=jQuery('.sidebar');
      if((jQuery(window).width()>959)||(jQuery(window).width()< 768)){
        $sidebar.find('div.clear').remove();
        var sidebar_widgets = jQuery('.widgets .sidebar-widget');
        if(sidebar_widgets.next('.separator').length <= 0){
          sidebar_widgets.after('<div class="separator"></div>');
          jQuery('.widgets .separator:last-child').remove();
        }
      }
      if(jQuery(window).width() > 767 && jQuery(window).width() < 959  ) {
        $sidebar.find('div.separator').remove();
		$sidebar.find('div.clear').remove();
        $sidebar.find('div.widget').removeClass('last');
        if(jQuery('.sidebar .sidebar-widget:nth-child(3n) + div.clear').length <= 0){
          jQuery('.sidebar .sidebar-widget:nth-child(3n)').addClass('last').after('<div class="clear"></div>');
        }
      }
	}

	jQuery('.thumb-overlay').each(function(){
		jQuery(this).css({'visibility': 'hidden','display':'block'});
		jQuery(this).find('.thumb-title').css('margin-top',-jQuery(this).find('h6').height()/2 +'px');
		jQuery(this).css({'visibility': 'visible', 'display':'hidden','opacity':0});
	});
	jQuery('.thumb-wrap').hover(function() { 
    jQuery(this).find('.thumb-overlay').stop().delay(60).fadeIn(300).animate({ opacity: 1 },300);
	jQuery(this).find('.thumb-overlay').stop().delay(60).fadeIn(300).animate({ opacity: 1 },300);
    },function() { 
	jQuery(this).find('.thumb-overlay').stop().delay(60).animate({ opacity: 0 },300);
	jQuery(this).find('.thumb-overlay').stop().delay(60).fadeIn(300).animate({ opacity: 0 },300);
    });

	/********************************
		Music Player
	********************************/
	
	if(jQuery('#music-player').length > 0) {
		jQuery.ajax({
			type: "POST",
			url: ajax_url,
			dataType: 'json',
			data: "action=get_musiclist",
			success	: function(msg) {
				jQuery('#music-player').ttwMusicPlayer(msg, {
					autoPlay:false,
					auto_advance:true,
					jPlayer:{
						swfPath: swf_payer_url,
						solution:"flash,html"	
					}
				});
			}
		});
	}

});


jQuery(window).load(function(){
    "use strict";
	jQuery('.full-width-slider').orbit({
		animation: 'fade',
		timer: true,
		advanceSpeed: 10000
	});

  jQuery('.jPlayer-container').find('img').remove();	
  if(!jQuery('html').hasClass('touch')){
		jQuery('.full-width-slider .slider .background-animate').parallax_alt({ "coeff":-0.50 });
  }
	
	jQuery('.full-width-slider').swipe({
		swipeLeft : function(e) {
			jQuery('.slider-nav .left').trigger('click');
			e.stopImmediatePropagation();
			return false;
		},
		swipeRight : function(e) {
			jQuery('.slider-nav .right').trigger('click');
			e.stopImmediatePropagation();
			return false;
		}    
    });

    jQuery('.slidecontent').find('a.button').parent('p').css('display','block');

	/********************************
			Blog
	********************************/
	jQuery('.blog-flexslider').each(function() {
		jQuery(this).flexslider({
			animation: "fade",
			controlNav: true,
			smoothHeight: true,
			slideshow: false,
			directionNav: false,
			start: function(slider){
				slider.closest(".home-slider").removeClass('flex-loading').find('.icon-cog').remove();
				slider.closest('.blog-posts').isotope( 'reLayout' );
			},
			after: function(slider){
				slider.closest('.blog-posts').isotope( 'reLayout' );
			}
		});
	});

	/********************************
		FlexSlider
	********************************/
	jQuery('.content-flexslider').each(function() {
		var $animation_type = jQuery(this).attr('data-animation');
		var $auto_slide = parseInt(jQuery(this).attr('data-auto-slide'),10);
		var $slide_interval = parseInt(jQuery(this).attr('data-slide-interval'),10);
		jQuery(this).flexslider({
			animation: $animation_type,
			slideshow: $auto_slide,
			slideshowSpeed: $slide_interval,
			controlNav: false,
			smoothHeight: true,
			directionNav: true,
			start: function(slider){
				slider.closest(".home-slider").removeClass('flex-loading').find('.icon-cog').remove();
			}
		});
	});	
	if(window.location.hash !== "") {
		jQuery("html, body").animate({ scrollTop: jQuery(window.location.hash).offset().top }, 1000, 'easeOutQuart');
	}
});


jQuery(window).scroll(function(){
	var header = jQuery('.header');
	if(header.hasClass('sticky')) {
		 if(!header.hasClass('wide') || (jQuery(window).width() > 767 && jQuery(window).width() < 960 )){
			if(jQuery(window).scrollTop() > header.height()){
				jQuery('.logo').slideUp(500);
				header.find('.content-area').css({'padding-top':'20px', 'padding-bottom': '20px'});

				header.addClass('stuck');
			}
			else{
				// header.find('.content-area').css({'padding-top':'125px', 'padding-bottom': '100px'});	
				header.removeClass('stuck');
				jQuery('.logo').slideDown(500);
				
				
			}
		}	
	}
});	