(function ( $ ) {
    'use strict';

    $( document ).ready(
        function () {
            qodefExtendedDropdownOpener.init();
        }
    );

    var qodefExtendedDropdownOpener = {
        init: function () {
            var opener = $('.qodef-extended-dropdown-menu:not(.qodef-dropdown-always-opened)');

            if ( opener.length ) {

                opener.on('mouseenter', function(){
                    opener.addClass('qodef-dropdown-hovered');
                });

                opener.on('mouseleave', function(){
                    opener.removeClass('qodef-dropdown-hovered');
                });
            }
        }
    };

})( jQuery );
