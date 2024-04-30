(function ( $ ) {
	'use strict';
	
	qodefCore.shortcodes.pharmacare_core_image_carousel = {};
	
	$( document ).ready(
		function () {
			qodefImageCarousel.init();
		}
	);
	
	
	var qodefImageCarousel = {
		init: function () {
			var sliders = $('.qodef-owl-slider');
			
			if (sliders.length) {
				sliders.each(function () {
					var slider = $(this),
						slideItemsNumber = slider.children().length,
						numberOfItems = 1,
						loop = true,
						autoplay = true,
						autoplayHoverPause = true,
						sliderSpeed = 5000,
						sliderSpeedAnimation = 600,
						margin = 0,
						responsiveMargin = 0,
						responsiveMargin1 = 0,
						stagePadding = 0,
						stagePaddingEnabled = false,
						center = false,
						autoWidth = false,
						animateInClass = false, // keyframe css animation
						animateOut = false, // keyframe css animation
						navigation = true,
						pagination = false,
						sliderDataHolder = slider;
					
					if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false) {
						numberOfItems = slider.data('number-of-items');
					}
					//if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
					//   numberOfItems = sliderDataHolder.data('number-of-columns');
					//}
					if (sliderDataHolder.data('enable-loop') === 'no') {
						loop = false;
					}
					if (sliderDataHolder.data('enable-autoplay') === 'no') {
						autoplay = false;
					}
					if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
						autoplayHoverPause = false;
					}
					if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
						sliderSpeed = sliderDataHolder.data('slider-speed');
					}
					if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
						sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
					}
					if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
						if (sliderDataHolder.data('slider-margin') === 'no') {
							margin = 0;
						} else {
							margin = sliderDataHolder.data('slider-margin');
						}
					} else {
						if (slider.parent().hasClass('qodef-huge-space')) {
							margin = 60;
						} else if (slider.parent().hasClass('qodef-large-space')) {
							margin = 50;
						} else if (slider.parent().hasClass('qodef-normal-space')) {
							margin = 30;
						} else if (slider.parent().hasClass('qodef-small-space')) {
							margin = 20;
						} else if (slider.parent().hasClass('qodef-tiny-space')) {
							margin = 10;
						}
					}
					if (sliderDataHolder.data('slider-padding') === 'yes') {
						stagePaddingEnabled = true;
						stagePadding = parseInt(slider.outerWidth() * 0.28);
						margin = 50;
					}
					if (sliderDataHolder.data('enable-center') === 'yes') {
						center = true;
					}
					if (sliderDataHolder.data('enable-auto-width') === 'yes') {
						autoWidth = true;
					}
					if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
						animateInClass = sliderDataHolder.data('slider-animate-in');
					}
					if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
						animateOut = sliderDataHolder.data('slider-animate-out');
					}
					if (sliderDataHolder.data('enable-navigation') === 'no') {
						navigation = false;
					}
					if (sliderDataHolder.data('enable-pagination') === 'yes') {
						pagination = true;
					}
					
					if (navigation && pagination) {
						slider.addClass('qodef-slider-has-both-nav');
					}
					
					if (slideItemsNumber <= 1) {
						loop = false;
						autoplay = false;
						navigation = false;
						pagination = false;
					}
					
					var responsiveNumberOfItems1 = 1,
						responsiveNumberOfItems2 = 2,
						responsiveNumberOfItems3 = 3,
						responsiveNumberOfItems4 = numberOfItems;
					
					if (numberOfItems < 3) {
						responsiveNumberOfItems2 = numberOfItems;
						responsiveNumberOfItems3 = numberOfItems;
					}
					
					if (numberOfItems > 4) {
						responsiveNumberOfItems4 = 4;
					}
					
					if (slider.hasClass('qodef-image-carousel') && numberOfItems === 8) {
						responsiveNumberOfItems4 = 8;
						responsiveNumberOfItems3 = 6;
						responsiveNumberOfItems2 = 4;
						responsiveNumberOfItems1 = 2;
					}
					
					if (slider.hasClass('qodef-clients-carousel')) {
						responsiveNumberOfItems4 = 5;
						responsiveNumberOfItems3 = 4;
						responsiveNumberOfItems2 = 3;
						responsiveNumberOfItems1 = 2;
					}
					
					if (stagePaddingEnabled || margin > 30) {
						responsiveMargin = 20;
						responsiveMargin1 = 30;
					}
					
					if (margin > 0 && margin <= 30) {
						responsiveMargin = margin;
						responsiveMargin1 = margin;
					}
					
					slider.owlCarousel({
						items: numberOfItems,
						loop: loop,
						autoplay: autoplay,
						autoplayHoverPause: autoplayHoverPause,
						autoplayTimeout: sliderSpeed,
						smartSpeed: sliderSpeedAnimation,
						margin: margin,
						stagePadding: stagePadding,
						center: center,
						autoWidth: autoWidth,
						animateInClass: animateInClass,
						animateOut: animateOut,
						dots: pagination,
						nav: navigation,
						navText: [
							'<span class="qodef-icon-fontkiko kiko-triangular-arrow-left qodef-icon qodef-e" style=""></span>',
							'<span class="qodef-icon-fontkiko kiko-triangular-arrow-right qodef-icon qodef-e" style=""></span>'
						],
						responsive: {
							0: {
								items: responsiveNumberOfItems1,
								margin: responsiveMargin,
								stagePadding: 0,
								center: false,
								autoWidth: false
							},
							681: {
								items: responsiveNumberOfItems2,
								margin: responsiveMargin1
							},
							769: {
								items: responsiveNumberOfItems3,
								margin: responsiveMargin1
							},
							1025: {
								items: responsiveNumberOfItems4
							},
							1281: {
								items: numberOfItems
							}
						},
						onInitialize: function () {
							slider.css('visibility', 'visible');
							//qodefInitParallax();
						},
						onTranslate: function () {
							//qodefInitVDCountdown();
						},
						onDrag: function (e) {
							if (qodef.body.hasClass('qodef-smooth-page-transitions-fadeout')) {
								var sliderIsMoving = e.isTrigger > 0;
								
								if (sliderIsMoving) {
									slider.addClass('qodef-slider-is-moving');
								}
							}
						},
						onDragged: function () {
							if (qodef.body.hasClass('qodef-smooth-page-transitions-fadeout') && slider.hasClass('qodef-slider-is-moving')) {
								
								setTimeout(function () {
									slider.removeClass('qodef-slider-is-moving');
								}, 500);
							}
						}
					});
				});
			}
		}
	}
	
	qodefCore.shortcodes.pharmacare_core_image_carousel.qodefImageCarousel = qodefImageCarousel;
	
})( jQuery );
