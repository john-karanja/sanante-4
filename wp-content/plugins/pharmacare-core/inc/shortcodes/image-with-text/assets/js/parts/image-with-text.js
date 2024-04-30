(function ($) {
    "use strict";

	qodefCore.shortcodes.pharmacare_core_image_with_text = {};
    qodefCore.shortcodes.pharmacare_core_image_with_text.qodefMagnificPopup = qodef.qodefMagnificPopup;

	$( document ).ready(
		function () {
			/* hovered class on image & read more btn */
			qodef.qodefHoverTrigger.init('.qodef-image-with-text .qodef-m-image > a, .qodef-image-with-text .qodef-m-title a', '.qodef-image-with-text');
		}
	);

})(jQuery);
