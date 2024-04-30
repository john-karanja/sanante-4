(function ( $ ) {
	'use strict';

	var instagramListElementor = {};
	instagramListElementor.qodefElementorinstagramList = qodefElementorinstagramList;

	qodefCore.shortcodes.pharmacare_core_instagram_list = {};

	$( document ).ready(
		function () {
			qodefInstagram.init();
		}
	);

	$(window).on('load', function () {
		qodefElementorinstagramList();
	});

	var qodefInstagram = {
		init: function () {
			this.holder = $( '.sbi.qodef-instagram-swiper-container' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {

						var $thisHolder     = $( this ),
							sliderOptions   = $thisHolder.parent().attr( 'data-options' ),
							$instagramImage = $thisHolder.find( '.sbi_item.sbi_type_image' ),
							$imageHolder    = $thisHolder.find( '#sbi_images' );

						$thisHolder.attr( 'data-options', sliderOptions );

						$imageHolder.addClass( 'swiper-wrapper' );

						if ( $instagramImage.length ) {
							$instagramImage.each(
								function () {
									$( this ).addClass( 'qodef-e qodef-image-wrapper swiper-slide' );
								}
							);
						}

						if ( typeof qodef.qodefSwiper === 'object' ) {
							qodef.qodefSwiper.init( $thisHolder );
						}
					}
				);
			}
		},
	};

	qodefCore.shortcodes.pharmacare_core_instagram_list.qodefInstagram = qodefInstagram;
	qodefCore.shortcodes.pharmacare_core_instagram_list.qodefSwiper    = qodef.qodefSwiper;

	/**
	 * Elementor
	 */
	function qodefElementorinstagramList() {
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction('frontend/element_ready/wp-widget-pharmacare_core_instagram_list.default', function () {
				qodefInstagram.init();
			});
		});
	}

})( jQuery );
