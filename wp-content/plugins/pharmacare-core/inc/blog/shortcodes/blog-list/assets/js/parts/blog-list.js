(function ($) {
	"use strict";

	var shortcode = 'pharmacare_core_blog_list';

	qodefCore.shortcodes[shortcode] = {};

	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}

	$(document).on( 'ready', function() {
		qodefBlogList.init();
	});

	var qodefBlogList = {
		init: function () {
			this.blog = $('.qodef-blog');

			if ( this.blog.length ) {
				qodefBlogList.linkHover( this.blog );
			}
		},
		linkHover: function ( $holder ) {
			var $items = $holder.find('.qodef-blog-item');

			$items.each( function() {
				var $thisItem = $(this),
					$itemMedia = $thisItem.find('.qodef-e-media-image a');

				$itemMedia.on('mouseenter', function() {
					$thisItem.addClass('qodef--active');
				});

				$itemMedia.on('mouseleave', function() {
					$thisItem.removeClass('qodef--active');
				});
			});
		}
	};

	qodefCore.shortcodes[shortcode].qodefBlogList = qodefBlogList;
	qodefCore.shortcodes[shortcode].qodefResizeIframes = qodef.qodefResizeIframes;

})(jQuery);