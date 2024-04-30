(function ($) {
    "use strict";
    
	qodefCore.shortcodes.pharmacare_core_product_categories_list_simple = {};

    $( document ).ready(
        function () {
            qodefProductCategoriesSimple.init();
        }
    );

    var qodefProductCategoriesSimple = {
        init: function () {
            this.holder = $( '.qodef-woo-product-categories-list-simple' );

            if ( this.holder.length ) {
                this.holder.each(
                    function () {
                        var $thisHolder = $( this );
                        qodefProductCategoriesSimple.initDropDown($thisHolder);
                    }
                );
            }
        },
        initDropDown: function ($holder) {
            var $dropdownOpenerHolder = $holder.find('.qodef-product-categories-list .qodef-product-category > .children');

            if ( $dropdownOpenerHolder.length ) {
                $dropdownOpenerHolder.each(
                    function () {
                        var $thisItem       = $( this ),
                            $thisItemOpener = $thisItem.prev('.qodef-cat-link').find('.qodef-cat-opener');

                        $thisItemOpener.on(
                            'click',
                            function ( e ) {
                                e.preventDefault();
                                e.stopImmediatePropagation();

                                var $thisItemParent = $thisItem.parent(),
                                    $submenu        = $thisItemParent.find( '.children' );

                                if ( $submenu.is( ':visible' ) ) {
                                    $submenu.slideUp( 450 );
                                    $thisItemParent.removeClass( 'qodef--opened' );
                                } else {
                                    $submenu.slideDown( 400 );
                                    $thisItemParent.addClass( 'qodef--opened' );
                                }
                            }
                        );
                    }
                );
            }
        }
    };

    qodefCore.shortcodes.pharmacare_core_product_categories_list_simple.qodefProductCategoriesSimple = qodefProductCategoriesSimple;

})(jQuery);
