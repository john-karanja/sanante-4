(function ($) {
	
	"use strict";

	var shortcode = 'pharmacare_core_masonry_elements_gallery';

	qodefCore.shortcodes[shortcode] = {};

	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}

	$(document).on( 'ready', function() {
		qodefMasonryElements.init();
	});

	var qodefMasonryElements = {
		init: function () {
			this.galleries = $('.qodef-masonry-elements');

			if ( this.galleries.length ) {
				this.galleries.each( function () {
					var $thisGallery = $( this );

					if ( $thisGallery.hasClass('qodef-appear-animation--enabled') && !$thisGallery.hasClass('qodef-wait-for-spinner--enabled') ) {
						qodefMasonryElements.appearAnimation( $thisGallery );
					}

					if ( $thisGallery.hasClass('qodef-wait-for-spinner--enabled') ) {
						qodefMasonryElements.appearAnimationWithSpinner( $thisGallery );
					}
				});
			}
		},
		appearAnimation: function ( $gallery ) {
			var $elements = $gallery.find('.qodef-e');

			function getRandomArbitrary(min, max) {
				return Math.floor(Math.random() * (max - min) + min);
			}

			if ( $elements.length ) {
				$elements.each( function () {
					var $thisElement = $( this ),
						randomNum 	 = getRandomArbitrary(100, 1000);

					$gallery.appear( function () {
						setTimeout( function () {
							$thisElement.addClass('qodef--appeared');
						}, randomNum);
					}, { accX: 0, accY: -150 });
				});
			}
		},
		appearAnimationWithSpinner: function ( $gallery ) {
			var $elements = $gallery.find('.qodef-e');

			function getRandomArbitrary(min, max) {
				return Math.floor(Math.random() * (max - min) + min);
			}

			if ( $elements.length ) {
				$elements.each( function () {
					var $thisElement = $( this ),
						randomNum 	 = getRandomArbitrary(100, 1000);

					var $interval = setInterval( function () {
						if ( qodef.body.hasClass('qodef-spinner--finished') ) {
							clearInterval($interval);
							setTimeout( function () {
								$thisElement.addClass('qodef--appeared');
							}, randomNum);
						}
					}, 100);
				});
			}
		}
	};

	qodefCore.shortcodes.pharmacare_core_masonry_elements_gallery = {};
	qodefCore.shortcodes.pharmacare_core_masonry_elements_gallery.qodefMasonryLayout = qodef.qodefMasonryLayout;

})(jQuery);
