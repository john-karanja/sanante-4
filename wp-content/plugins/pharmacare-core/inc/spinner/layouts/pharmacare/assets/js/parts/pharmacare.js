(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefPharmaCareSpinner.init();
    });

    $(window).on(
        'load',
        function () {
            qodefPharmaCareSpinner.windowLoaded = true;
        }
    );

    $(window).on('elementor/frontend/init', function() {
        var isEditMode = Boolean( elementorFrontend.isEditMode() );

        if ( isEditMode ) {
            qodefPharmaCareSpinner.init( isEditMode );
        }
    });

    var qodefPharmaCareSpinner = {
        init: function ( isEditMode ) {
            var $holder = $('#qodef-page-spinner.qodef-layout--pharmacare');

            if ( $holder.length ) {
                if ( isEditMode ) {
                    qodefPharmaCareSpinner.fadeOutLoader( $holder );
                } else {
                    qodefPharmaCareSpinner.animateSpinner( $holder );
                    qodefPharmaCareSpinner.splitText( $holder );
                }
            }
        },
        animateSpinner: function ( $holder ) {
            $holder.addClass('qodef--init');

            var $spinnerSvg = $holder.find('.qodef-m-svg'),
                $masonryElements = $('.qodef-masonry-elements').first();

            if ( $spinnerSvg.length ) {
                setTimeout( function () {
                    var $word = $holder.find('.qodef-m-text .qodef-m-word');

                    setTimeout( function () {
                        $holder.addClass('qodef--show');
                    }, 500);

                    qodefPharmaCareSpinner.animateText( $word, 'qodef-animate', 200 );
                }, 2000);

                setTimeout( function () {
                    if ( qodefPharmaCareSpinner.windowLoaded ) {
                        qodef.body.addClass('qodef-spinner--finished');

                        if ( $masonryElements.length ) {
                            $holder.css('height', $masonryElements.outerHeight());
                        }
                    } else {
                        var $interval = setInterval( function() {
                            if ( qodefPharmaCareSpinner.windowLoaded ) {
                                clearInterval($interval);
                                qodef.body.addClass('qodef-spinner--finished');

                                if ( $masonryElements.length ) {
                                    $holder.css('height', $masonryElements.outerHeight());
                                }
                            }
                        }, 100);
                    }
                }, 6000);
            }
        },
        splitText: function ( $holder ) {
            var $preloaderText = $holder.find('.qodef-m-text');

            if ( $preloaderText.length ) {
                var $txt = $preloaderText.text(),
                    $newTxt = $.trim($txt),
                    $extraClass = '';

                $preloaderText.empty();

                $newTxt.split(/(?=[A-Z])/).forEach( function( c ) {
                    $extraClass = (c === " " ? 'qodef-m-empty-char' : ' ');
                    $preloaderText.append('<span class="qodef-m-word ' + $extraClass + '">' + c + '</span>');
                });
            }
        },
        animateText: function ( $selector, $class, $delay ) {
            $selector.each( function( $i ) {
                var $thisSpan = $(this);

                setTimeout(function () {
                    $thisSpan.addClass($class);
                }, $delay * 1 + $i * $delay);
            });
        },
        fadeOutLoader: function ($holder, speed, delay, easing) {
            speed = speed ? speed : 500;
            delay = delay ? delay : 0;
            easing = easing ? easing : 'swing';

            if ($holder.length) {
                $holder.delay(delay).fadeOut(speed, easing);
                $(window).on('bind', 'pageshow', function (event) {
                    if (event.originalEvent.persisted) {
                        $holder.fadeOut(speed, easing);
                    }
                });
            }
        }
    };

})(jQuery);