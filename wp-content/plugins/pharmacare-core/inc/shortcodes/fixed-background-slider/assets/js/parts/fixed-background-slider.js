(function ($) {
	'use strict';

	qodefCore.shortcodes.pharmacare_core_frame_slider = {};

	$(document).ready(function () {
		qodefFrameSlider.init();
	});

	var qodefFrameSlider = {
		init: function () {
			this.holder = $('.qodef-fixed-background-slider');

			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);

					qodefFrameSlider.createSlider($thisHolder);
				});
			}
		},

		createSlider: function ($holder) {
			var $swiperHolder = $holder.find('.qodef-m-swiper'),
				$sliderHolder = $holder.find('.qodef-m-items'),
				$pagination = $holder.find('.swiper-pagination');

			var $swiper = new Swiper($swiperHolder, {
				slidesPerView: 'auto',
				centeredSlides: true,
				spaceBetween: 0,
				autoplay: {
					disableOnInteraction: false
				},
				loop: true,
				speed: 800,
				effect: 'fade',
				pagination: {
					el: $pagination,
					type: 'bullets',
					clickable: true
				},
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				on: {
					init: function () {
						setTimeout(function () {
							$sliderHolder.addClass('qodef-swiper--initialized');
						}, 1500);
					}
				}
			});
		}
	};

	qodefCore.shortcodes.pharmacare_core_frame_slider.qodefFrameSlider = qodefFrameSlider;

})(jQuery);