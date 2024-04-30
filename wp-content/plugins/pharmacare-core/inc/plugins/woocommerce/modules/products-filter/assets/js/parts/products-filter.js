(function ( $ ) {
    'use strict';

    $( document ).ready(
        function () {
            productsFilter.init();
        }
    );

    var productsFilter = {
        init: function () {
            var $filterHolder = $( '.qodef-product-list-layouts' ),
                $filterEnabled = qodefCore.body.hasClass( 'qodef-products-filter--yes' ),
                $buttons = '',
                $productList = '',
                $productColumns = '';

            if ($filterHolder.length && $filterEnabled) {
                $productList = $filterHolder.parent('.qodef-woo-results').next('.qodef-woo-product-list');
                $productColumns = $productList.find('.products');
                $buttons = $filterHolder.find('li');

                /* set local storage for product list class */
                if ( $productList.hasClass('qodef-item-layout--info-right') ) {
                    window.localStorage.setItem('productListClass', 'qodef-item-layout--info-right');
                } else if ( $productList.hasClass('qodef-item-layout--info-below') ) {
                    window.localStorage.setItem('productListClass', 'qodef-item-layout--info-below');
                } else if ( $productList.hasClass('qodef-item-layout--info-on-image') ) {
                    window.localStorage.setItem('productListClass', 'qodef-item-layout--info-on-image');
                }

                /* set local storage for product list ul class - columns number */
                if ( $productColumns.hasClass('columns-1') ) {
                    window.localStorage.setItem('productColumnsClass', 'columns-1');
                } else if ( $productColumns.hasClass('columns-2') ) {
                    window.localStorage.setItem('productColumnsClass', 'columns-2');
                } else if ( $productColumns.hasClass('columns-3') ) {
                    window.localStorage.setItem('productColumnsClass', 'columns-3');
                } else if ( $productColumns.hasClass('columns-4') ) {
                    window.localStorage.setItem('productColumnsClass', 'columns-4');
                } else if ( $productColumns.hasClass('columns-5') ) {
                    window.localStorage.setItem('productColumnsClass', 'columns-5');
                } else if ( $productColumns.hasClass('columns-6') ) {
                    window.localStorage.setItem('productColumnsClass', 'columns-6');
                }

                if ( window.localStorage.getItem('activeButton') === 'qodef-layout-grid' ) {
                    $buttons.find('.qodef-layout-grid').addClass("qodef-item-active");
                    /* layout classes change for grid layout */
                    window.localStorage.setItem('activeButton', 'qodef-layout-grid');
                    $productList.removeClass('qodef-item-layout--info-right qodef-item-layout--info-below qodef-item-layout--info-on-image');
                    $productList.addClass(window.localStorage.getItem('productListClass'));
                    $productColumns.removeClass('columns-1 columns-2 columns-3 columns-4 columns-5 columns-6');
                    $productColumns.addClass(window.localStorage.getItem('productColumnsClass'));
                } else if ( window.localStorage.getItem('activeButton') === 'qodef-layout-list' ) {
                    $buttons.find('.qodef-layout-list').addClass("qodef-item-active");
                    /* layout classes change for list layout */
                    window.localStorage.setItem('activeButton', 'qodef-layout-list');
                    $productList.removeClass('qodef-item-layout--info-right qodef-item-layout--info-below qodef-item-layout--info-on-image');
                    $productList.addClass('qodef-item-layout--info-right');
                    $productColumns.removeClass('columns-1 columns-2 columns-3 columns-4 columns-5 columns-6');
                    $productColumns.addClass('columns-1');
                } else {
                    $buttons.first().find("a").addClass("qodef-item-active");
                }

                /* on click change */
                $buttons.find("a").on('click',function(){
                    var $button = $(this);
                    $buttons.find("a").removeClass("qodef-item-active");
                    $button.addClass("qodef-item-active");

                    if ( $button.hasClass('qodef-layout-grid') ) {
                        /* layout classes change for grid layout */
                        window.localStorage.setItem('activeButton', 'qodef-layout-grid');
                        $productList.removeClass('qodef-item-layout--info-right qodef-item-layout--info-below qodef-item-layout--info-on-image');
                        $productList.addClass(window.localStorage.getItem('productListClass'));
                        $productColumns.removeClass('columns-1 columns-2 columns-3 columns-4 columns-5 columns-6');
                        $productColumns.addClass(window.localStorage.getItem('productColumnsClass'));
                    } else if ( $button.hasClass('qodef-layout-list') ) {
                        /* layout classes change for list layout */
                        window.localStorage.setItem('activeButton', 'qodef-layout-list');
                        $productList.removeClass('qodef-item-layout--info-right qodef-item-layout--info-below qodef-item-layout--info-on-image');
                        $productList.addClass('qodef-item-layout--info-right');
                        $productColumns.removeClass('columns-1 columns-2 columns-3 columns-4 columns-5 columns-6');
                        $productColumns.addClass('columns-1');
                    }
                });
            }
        },
    };

})( jQuery );
