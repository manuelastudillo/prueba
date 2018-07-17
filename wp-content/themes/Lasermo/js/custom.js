jQuery(document).ready(function() {

	/*==== RESPONSIVE PRIMARY MENU SETUP ====*/
	if ( typeof primary_on !== "undefined" ) {	
		var nav = responsiveNav("#menu-primary-items", { 
			animate: true, 
			transition: 300, 
			insert: "before", 
			customToggle: "#toggle-primary-menu", 
			closeOnNavClick: false, 
			openPos: "relative", 
			navClass: "nav-collapse", 
			navActiveClass: "js-nav-active", 
			jsClass: "js" 
		}); 
	}
 
	/*==== RESPONSIVE SECONDARY MENU SETUP ====*/
	if ( typeof secondary_on !== "undefined" ) {		
		var nav = responsiveNav("#menu-secondary-items", { 
			animate: true, 
			transition: 300,
			insert: "before", 
			customToggle: "#toggle-secondary-menu", 
			closeOnNavClick: false, 
			openPos: "relative", 
			navClass: "nav-collapse", 
			navActiveClass: "js-nav-active", 
			jsClass: "js" 
		}); 
	}

 
	/* ===== FITVIDS ===== */
	jQuery("#content").fitVids({ customSelector: "iframe[src*='wordpress.tv'], iframe[src*='www.dailymotion.com'], iframe[src*='blip.tv'], iframe[src*='www.viddler.com']"});	

 
	/* ===== CONTENT SLIDER ===== */	
	if ( typeof ParamsSlider !== "undefined" ) {
		jQuery('.shortcode-slider').bxSlider({
			mode: 'horizontal',
			auto: ParamsSlider.auto,
			pause: ParamsSlider.pause,
			autoHover: true,
			slideWidth: 0,
			adaptiveHeight: false,
			pager: false,
			prevText: '<i class="fa fa-caret-left"></i>',
			nextText: '<i class="fa fa-caret-right"></i>'
		});									
	}

	/* ===== TABBER SHORTCODE ===== */	
	if ( typeof ParamsTabber !== "undefined" ) {
		jQuery('.tab-shortcode').bxSlider({
			mode: 'vertical',
			auto: ParamsTabber.auto,
			pause: ParamsTabber.pause,
			autoHover: true,
		  	pagerCustom: '.tab-pager',
		  	useCSS: false,
		  	controls: false
		});									
	}	
 
	/* ===== CAROUSEL SHORTCODE ===== */	
	if ( typeof ParamsCarousel !== "undefined" ) { 
		jQuery('.gallery-slider').bxSlider({
			minSlides: 2,
			maxSlides: 4,
			moveSlides: 1,
			slideWidth: 285,
			slideMargin: 0,
			pager: false,
			auto: ParamsCarousel.auto,
			pause: ParamsCarousel.pause,
			nextSelector: '#gallery-next',
			prevSelector: '#gallery-prev',		
			prevText: '<i class="fa fa-caret-left"></i>',
			nextText: '<i class="fa fa-caret-right"></i>'
		});		
	}
	
	/* ===== TESTEMONIAL SHORTCODE ===== */	
	if ( typeof ParamsTestemonials !== "undefined" ) {
		jQuery('.testemonial-slider').bxSlider({
			mode: 'fade',
			auto: ParamsTestemonials.auto,
			pause: ParamsTestemonials.pause,
			autoHover: true,
			slideWidth: 0,
			adaptiveHeight: true,
			pager: false,
			nextSelector: '#testemonial-next',
			prevSelector: '#testemonial-prev',		
			prevText: '<i class="fa fa-caret-left"></i>',
			nextText: '<i class="fa fa-caret-right"></i>'
		});									
	}

	/* ===== LATEST POSTS SHORTCODE ===== */	
	if ( typeof ParamsLatestPosts !== "undefined" ) {
		jQuery('.post-slider').bxSlider({
			mode: 'fade',
			auto: ParamsLatestPosts.auto,
			pause: ParamsLatestPosts.pause,
			autoHover: true,
			slideWidth: 0,
			adaptiveHeight: true,
			pager: false,
			nextSelector: '#lp-next',
			prevSelector: '#lp-prev',		
			prevText: '<i class="fa fa-caret-left"></i>',
			nextText: '<i class="fa fa-caret-right"></i>'
		});									
	}		

	/*==== SEARCH IN SECONDARY MENU ====*/
	if ( jQuery( '#menu-secondary .search' ).length ) {
		jQuery( '#menu-secondary .search .search-text' ).attr( 'id', 'top-search' );
		jQuery( '#menu-secondary .search .search-button' ).attr( 'id', 'top-button' );
		jQuery( '.search-button' ).click( function(){
			jQuery(this).parent().addClass( 'expand' );
		});
		jQuery( 'html' ).click( function(e) {
			var id = e.target.id;
			if ( id !== 'top-search' && id !== 'top-button' )
				jQuery( '#menu-secondary .search-wrap' ).removeClass( 'expand' );
		});
		
		jQuery( document ).keyup( function(e) {
			if ( e.keyCode == 27 )
				jQuery( '#menu-secondary .search-wrap' ).removeClass( 'expand' );
		})
	}

});