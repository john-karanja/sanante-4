(function ($) {
    'use strict';

	qodefCore.shortcodes.pharmacare_core_testimonials_list = {};

	$(document).ready(function () {
		qodefInitTestimonialsCarouselVertical.init();
	});

    /**
     * Init testimonials shortcode carousle vertical type
     *
     */
    var qodefInitTestimonialsCarouselVertical = {
	    init: function () {

		    var testimonials = $('.qodef-layout--carousel-vertical');
		
		    if (testimonials.length) {
			    testimonials.each(function () {
				    var swiper = $(this);
				    var swiperSlide = swiper.find('.swiper-slide');
				    var swiperSlideText = swiper.find('.qodef-e-inner');
				    var swiperSlidespacing = 42; // spacing between slides
				    var swiperMaxHeight = 220;
				    var maxHeight = -1; // used to calculate tallest slide
				
				    var qodefInitSwiperHeights = function () {
					    swiperSlideText.each(function () {
						    // find highest element
						    if ($(this).innerHeight() > swiperMaxHeight) {
							    swiperMaxHeight = $(this).height();
						    }

							maxHeight = maxHeight > $(this).innerHeight() ? maxHeight : $(this).innerHeight();

						    var swiperSlideHeightWithSpacing = maxHeight + swiperSlidespacing

						    // adding 2x height to container since showing group of 2 items
							if ( qodefCore.windowWidth > 680 ) {
								swiper.css("height", swiperSlideHeightWithSpacing * 2);
							} else {
								swiper.css("height", swiperSlideHeightWithSpacing / 2);
							}
					    });
				    }

				    qodefInitSwiperHeights();

					$( window ).on( 'resize orientationchange',function () {
							qodefInitSwiperHeights();
							swiperSlider.update();
						}
					);

				
				    /* swiper init vars */
					var sliderOptions     = typeof swiper.data( 'options' ) !== 'undefined' ? swiper.data( 'options' ) : {},
						spaceBetween      = 0,
						slidesPerView     = 2,
						slidesPerGroup    = 2,
						loop              = sliderOptions.loop !== undefined && sliderOptions.loop !== '' ? sliderOptions.loop : true,
						autoplay          = sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== '' ? sliderOptions.autoplay : true,
						speed             = sliderOptions.speed !== undefined && sliderOptions.speed !== '' ? parseInt( sliderOptions.speed, 10 ) : 5000,
						speedAnimation    = sliderOptions.speedAnimation !== undefined && sliderOptions.speedAnimation !== '' ? parseInt( sliderOptions.speedAnimation, 10 ) : 800,
						outsideNavigation = sliderOptions.outsideNavigation !== undefined && sliderOptions.outsideNavigation === 'yes',
						nextNavigation    = outsideNavigation ? '.swiper-button-next-' + sliderOptions.unique : swiper.find( '.swiper-button-next' ),
						prevNavigation    = outsideNavigation ? '.swiper-button-prev-' + sliderOptions.unique : swiper.find( '.swiper-button-prev' ),
						pagination        = swiper.find( '.swiper-pagination' );

					if ( autoplay !== false && speed !== 5000 ) {
						autoplay = {
							delay: speed
						};
					}
				
				    var swiperSlider = new Swiper(swiper, {
						autoplay: autoplay,
						loop: loop,
					    parallax: false,
					    slidesPerView: slidesPerView,
						calculateHeight:false,
					    slidesPerGroup: slidesPerGroup,
					    autoHeight: false,
					    autoResize: false,
						spaceBetween: spaceBetween,
					    speed: speedAnimation,
					    effect: 'slide',
					    allowTouchMove: false,
					    direction: 'vertical',
					    navigation: {
						    nextEl: nextNavigation,
						    prevEl: prevNavigation,
					    },
					    pagination: {
						    el: pagination,
						    type: 'bullets',
						    clickable: true,
					    },
					    breakpoints: {
							// when window width is < 481px
							0: {
								slidesPerView: 1,
								slidesPerGroup: 1
							},
							// when window width is >= 481px
							481: {
								slidesPerView: 1,
								slidesPerGroup: 1
							},
							// when window width is >= 681px
							681: {
								slidesPerView: 2,
								slidesPerGroup: 2
							}
					    }
				    });
			    });
		    }
	    },
    }

	qodefCore.shortcodes.pharmacare_core_testimonials_list.qodefInitTestimonialsCarouselVertical = qodefInitTestimonialsCarouselVertical;

})(jQuery);
