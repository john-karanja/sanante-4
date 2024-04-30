(function ( $ ) {
	'use strict';

	// This case is important when theme is not active
	if ( typeof qodef !== 'object' ) {
		window.qodef = {};
	}

	window.qodefCore                = {};
	qodefCore.shortcodes            = {};
	qodefCore.listShortcodesScripts = {
		qodefSwiper: qodef.qodefSwiper,
		qodefPagination: qodef.qodefPagination,
		qodefFilter: qodef.qodefFilter,
		qodefMasonryLayout: qodef.qodefMasonryLayout,
		qodefJustifiedGallery: qodef.qodefJustifiedGallery,
	};

	qodefCore.body         = $( 'body' );
	qodefCore.html         = $( 'html' );
	qodefCore.windowWidth  = $( window ).width();
	qodefCore.windowHeight = $( window ).height();
	qodefCore.scroll       = 0;

	$( document ).ready(
		function () {
			qodefCore.scroll = $( window ).scrollTop();
			qodefInlinePageStyle.init();
		}
	);

	$( window ).resize(
		function () {
			qodefCore.windowWidth  = $( window ).width();
			qodefCore.windowHeight = $( window ).height();
		}
	);

	$( window ).scroll(
		function () {
			qodefCore.scroll = $( window ).scrollTop();
		}
	);

	var qodefScroll = {
		disable: function () {
			if ( window.addEventListener ) {
				window.addEventListener(
					'wheel',
					qodefScroll.preventDefaultValue,
					{ passive: false }
				);
			}

			// window.onmousewheel = document.onmousewheel = qodefScroll.preventDefaultValue;
			document.onkeydown = qodefScroll.keyDown;
		},
		enable: function () {
			if ( window.removeEventListener ) {
				window.removeEventListener(
					'wheel',
					qodefScroll.preventDefaultValue,
					{ passive: false }
				);
			}
			window.onmousewheel = document.onmousewheel = document.onkeydown = null;
		},
		preventDefaultValue: function ( e ) {
			e = e || window.event;
			if ( e.preventDefault ) {
				e.preventDefault();
			}
			e.returnValue = false;
		},
		keyDown: function ( e ) {
			var keys = [37, 38, 39, 40];
			for ( var i = keys.length; i--; ) {
				if ( e.keyCode === keys[i] ) {
					qodefScroll.preventDefaultValue( e );
					return;
				}
			}
		}
	};

	qodefCore.qodefScroll = qodefScroll;

	var qodefPerfectScrollbar = {
		init: function ( $holder ) {
			if ( $holder.length ) {
				qodefPerfectScrollbar.qodefInitScroll( $holder );
			}
		},
		qodefInitScroll: function ( $holder ) {
			var $defaultParams = {
				wheelSpeed: 0.6,
				suppressScrollX: true
			};

			var $ps = new PerfectScrollbar(
				$holder[0],
				$defaultParams
			);

			$( window ).resize(
				function () {
					$ps.update();
				}
			);
		}
	};

	qodefCore.qodefPerfectScrollbar = qodefPerfectScrollbar;

	var qodefInlinePageStyle = {
		init: function () {
			this.holder = $( '#pharmacare-core-page-inline-style' );

			if ( this.holder.length ) {
				var style = this.holder.data( 'style' );

				if ( style.length ) {
					$( 'head' ).append( '<style type="text/css">' + style + '</style>' );
				}
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
	    function () {
            qodefBackToTop.init();
        }
	);

	var qodefBackToTop = {
		init: function () {
			this.holder = $( '#qodef-back-to-top' );

			if ( this.holder.length ) {
				// Scroll To Top
				this.holder.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefBackToTop.animateScrollToTop();
					}
				);

				qodefBackToTop.showHideBackToTop();
			}
		},
		animateScrollToTop: function () {
			var startPos = qodef.scroll,
				newPos   = qodef.scroll,
				step     = .9,
				animationFrameId;

			var startAnimation = function () {
				if ( newPos === 0 ) {
                    return;
                }

				newPos < 0.0001 ? newPos = 0 : null;

				var ease = qodefBackToTop.easingFunction( (startPos - newPos) / startPos );
				$( 'html, body' ).scrollTop( startPos - (startPos - newPos) * ease );
				newPos = newPos * step;

				animationFrameId = requestAnimationFrame( startAnimation );
			};
			startAnimation();
			$( window ).one(
				'wheel touchstart',
				function () {
					cancelAnimationFrame( animationFrameId );
				}
			);
		},
		easingFunction: function ( n ) {
			return 0 == n ? 0 : Math.pow( 1024, n - 1 );
		},
		showHideBackToTop: function () {
			$( window ).scroll( function () {
				var $thisItem = $( this ),
					b         = $thisItem.scrollTop(),
					c         = $thisItem.height(),
					d;

				if ( b > 0 ) {
					d = b + c / 2;
				} else {
					d = 1;
				}

				if ( d < 1e3 ) {
					qodefBackToTop.addClass( 'off' );
				} else {
					qodefBackToTop.addClass( 'on' );
				}
			} );
		},
		addClass: function ( a ) {
			this.holder.removeClass( 'qodef--off qodef--on' );

			if ( a === 'on' ) {
				this.holder.addClass( 'qodef--on' );
			} else {
				this.holder.addClass( 'qodef--off' );
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

    $( window ).on(
        'load',
        function () {
			qodefUncoverFooter.init();
		}
	);

	var qodefUncoverFooter = {
		holder: '',
		init: function () {
			this.holder = $( '#qodef-page-footer.qodef--uncover' );

			if ( this.holder.length && ! qodefCore.html.hasClass( 'touchevents' ) ) {
				qodefUncoverFooter.addClass();
				qodefUncoverFooter.setHeight( this.holder );

				$( window ).resize(
					function () {
						qodefUncoverFooter.setHeight( qodefUncoverFooter.holder );
					}
				);
			}
		},
		setHeight: function ( $holder ) {
			$holder.css( 'height', 'auto' );

			var footerHeight = $holder.outerHeight();

			if ( footerHeight > 0 ) {
				$( '#qodef-page-outer' ).css(
					{
						'margin-bottom': footerHeight,
						'background-color': qodefCore.body.css( 'backgroundColor' )
					}
				);

				$holder.css( 'height', footerHeight );
			}
		},
		addClass: function () {
			qodefCore.body.addClass( 'qodef-page-footer--uncover' );
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefFullscreenMenu.init();
		}
	);

	var qodefFullscreenMenu = {
		init: function () {
			var $fullscreenMenuOpener = $( 'a.qodef-fullscreen-menu-opener' ),
				$menuItems            = $( '#qodef-fullscreen-area nav ul li a' );

			// Open popup menu
			$fullscreenMenuOpener.on(
				'click',
				function ( e ) {
					e.preventDefault();
					var $thisOpener = $( this );

					if ( ! qodefCore.body.hasClass( 'qodef-fullscreen-menu--opened' ) ) {
						qodefFullscreenMenu.openFullscreen( $thisOpener );

						$( document ).keyup(
							function ( e ) {
								if ( e.keyCode === 27 ) {
									qodefFullscreenMenu.closeFullscreen( $thisOpener );
								}
							}
						);
					} else {
						qodefFullscreenMenu.closeFullscreen( $thisOpener );
					}
				}
			);

			//open dropdowns
			$menuItems.on(
				'tap click',
				function ( e ) {
					var $thisItem = $( this );

					if ( $thisItem.parent().hasClass( 'menu-item-has-children' ) ) {
						e.preventDefault();
						qodefFullscreenMenu.clickItemWithChild( $thisItem );
					} else if ( $thisItem.attr( 'href' ) !== 'http://#' && $thisItem.attr( 'href' ) !== '#' ) {
						qodefFullscreenMenu.closeFullscreen( $fullscreenMenuOpener );
					}
				}
			);
		},
		openFullscreen: function ( $opener ) {
			$opener.addClass( 'qodef--opened' );
			qodefCore.body.removeClass( 'qodef-fullscreen-menu-animate--out' ).addClass( 'qodef-fullscreen-menu--opened qodef-fullscreen-menu-animate--in' );
			qodefCore.qodefScroll.disable();
		},
		closeFullscreen: function ( $opener ) {
			$opener.removeClass( 'qodef--opened' );
			qodefCore.body.removeClass( 'qodef-fullscreen-menu--opened qodef-fullscreen-menu-animate--in' ).addClass( 'qodef-fullscreen-menu-animate--out' );
			qodefCore.qodefScroll.enable();
			$( 'nav.qodef-fullscreen-menu ul.sub_menu' ).slideUp( 200 );
		},
		clickItemWithChild: function ( thisItem ) {
			var $thisItemParent  = thisItem.parent(),
				$thisItemSubMenu = $thisItemParent.find( '.sub-menu' ).first();

			if ( $thisItemSubMenu.is( ':visible' ) ) {
				$thisItemSubMenu.slideUp( 300 );
				$thisItemParent.removeClass( 'qodef--opened' );
			} else {
				$thisItemSubMenu.slideDown( 300 );
				$thisItemParent.addClass( 'qodef--opened' ).siblings().find( '.sub-menu' ).slideUp( 400 );
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefHeaderScrollAppearance.init();
			qodefHeaderTopMessageClose.init();
		}
	);

	var qodefHeaderScrollAppearance = {
		appearanceType: function () {
			return qodefCore.body.attr( 'class' ).indexOf( 'qodef-header-appearance--' ) !== -1 ? qodefCore.body.attr( 'class' ).match( /qodef-header-appearance--([\w]+)/ )[1] : '';
		},
		init: function () {
			var appearanceType = this.appearanceType();

			if ( appearanceType !== '' && appearanceType !== 'none' ) {
				qodefCore[appearanceType + 'HeaderAppearance']();
			}
		}
	};

	var qodefHeaderTopMessageClose = {
		init: function () {
			var closeMessage = $('.qodef-close-message');
			var messageHolder = $('#qodef-top-message-holder');
			closeMessage.click(function () {
				//messageHolder.addClass('qodef-close-message');
				setTimeout(300, messageHolder.addClass('qodef-close-message'));
				messageHolder.slideUp('fast');
			});
		}
	}
})( jQuery );

(function($) {
    'use strict';
    
    var like = {};
    
    like.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    
    /**
    *  All functions to be called on $(document).ready() should be in this function
    **/
    function qodefOnDocumentReady() {
        qodefLikes();
    }

    function qodefLikes() {
        $(document).on('click','.qodef-like', function() {
            var likeLink = $(this),
                id = likeLink.attr('id'),
                postID = likeLink.data('post-id'),
                type = '';

            if ( likeLink.hasClass('liked') ) {
                return false;
            }

            if (typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }
    
            var dataToPass = {
                action: 'pharmacare_core_action_like',
                likes_id: id,
                type: type,
                like_nonce: $('#qodef_like_nonce_'+postID).val()
            };
        
            var like = $.post(qodefGlobal.vars.qodefAjaxUrl, dataToPass, function( data ) {
                likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
            });
            
            return false;
        });
    }
    
})(jQuery);
(function ( $ ) {
	'use strict';

	$( document ).ready(
	    function () {
            qodefMobileHeaderAppearance.init();
        }
	);

	/*
	 **	Init mobile header functionality
	 */
	var qodefMobileHeaderAppearance = {
		init: function () {
			if ( qodefCore.body.hasClass( 'qodef-mobile-header-appearance--sticky' ) ) {

				var docYScroll1   = qodefCore.scroll,
					displayAmount = qodefGlobal.vars.mobileHeaderHeight + qodefGlobal.vars.adminBarHeight,
					$pageOuter    = $( '#qodef-page-outer' );

				qodefMobileHeaderAppearance.showHideMobileHeader( docYScroll1, displayAmount, $pageOuter );

				$( window ).scroll(
				    function () {
                        qodefMobileHeaderAppearance.showHideMobileHeader( docYScroll1, displayAmount, $pageOuter );
                        docYScroll1 = qodefCore.scroll;
                    }
				);

				$( window ).resize(
				    function () {
                        $pageOuter.css( 'padding-top', 0 );
                        qodefMobileHeaderAppearance.showHideMobileHeader( docYScroll1, displayAmount, $pageOuter );
                    }
				);
			}
		},
		showHideMobileHeader: function ( docYScroll1, displayAmount, $pageOuter ) {
			if ( qodefCore.windowWidth <= 1024 ) {
				if ( qodefCore.scroll > displayAmount * 2 ) {
					//set header to be fixed
					qodefCore.body.addClass( 'qodef-mobile-header--sticky' );

					//add transition to it
					setTimeout(
						function () {
							qodefCore.body.addClass( 'qodef-mobile-header--sticky-animation' );
						},
						300
					); //300 is duration of sticky header animation

					//add padding to content so there is no 'jumping'
					$pageOuter.css( 'padding-top', qodefGlobal.vars.mobileHeaderHeight );
				} else {
					//unset fixed header
					qodefCore.body.removeClass( 'qodef-mobile-header--sticky' );

					//remove transition
					setTimeout(
						function () {
							qodefCore.body.removeClass( 'qodef-mobile-header--sticky-animation' );
						},
						300
					); //300 is duration of sticky header animation

					//remove padding from content since header is not fixed anymore
					$pageOuter.css( 'padding-top', 0 );
				}

				if ( (qodefCore.scroll > docYScroll1 && qodefCore.scroll > displayAmount) || (qodefCore.scroll < displayAmount * 3) ) {
					//show sticky header
					qodefCore.body.removeClass( 'qodef-mobile-header--sticky-display' );
				} else {
					//hide sticky header
					qodefCore.body.addClass( 'qodef-mobile-header--sticky-display' );
				}
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefNavMenu.init();
		}
	);

	var qodefNavMenu = {
		init: function () {
			qodefNavMenu.dropdownBehavior();
			qodefNavMenu.wideDropdownPosition();
			qodefNavMenu.dropdownPosition();
		},
		dropdownBehavior: function () {
			var $menuItems = $( '.qodef-header-navigation > ul > li' );

			$menuItems.each(
				function () {
					var $thisItem = $( this );

					if ( $thisItem.find( '.qodef-drop-down-second' ).length ) {
						$thisItem.waitForImages(
							function () {
								var $dropdownHolder      = $thisItem.find( '.qodef-drop-down-second' ),
									$dropdownMenuItem    = $dropdownHolder.find( '.qodef-drop-down-second-inner ul' ),
									dropDownHolderHeight = $dropdownMenuItem.outerHeight();

								if ( navigator.userAgent.match( /(iPod|iPhone|iPad)/ ) ) {
									$thisItem.on(
										'touchstart mouseenter',
										function () {
											$dropdownHolder.css(
												{
													'height': dropDownHolderHeight,
													'overflow': 'visible',
													'visibility': 'visible',
													'opacity': '1',
												}
											);
										}
									).on(
										'mouseleave',
										function () {
											$dropdownHolder.css(
												{
													'height': '0px',
													'overflow': 'hidden',
													'visibility': 'hidden',
													'opacity': '0',
												}
											);
										}
									);
								} else {
									if ( qodefCore.body.hasClass( 'qodef-drop-down-second--animate-height' ) ) {
										var animateConfig = {
											interval: 0,
											over: function () {
												setTimeout(
													function () {
														$dropdownHolder.addClass( 'qodef-drop-down--start' ).css(
															{
																'visibility': 'visible',
																'height': '0',
																'opacity': '1',
															}
														);
														$dropdownHolder.stop().animate(
															{
																'height': dropDownHolderHeight,
															},
															400,
															'easeInOutQuint',
															function () {
																$dropdownHolder.css( 'overflow', 'visible' );
															}
														);
													},
													100
												);
											},
											timeout: 100,
											out: function () {
												$dropdownHolder.stop().animate(
													{
														'height': '0',
														'opacity': 0,
													},
													100,
													function () {
														$dropdownHolder.css(
															{
																'overflow': 'hidden',
																'visibility': 'hidden',
															}
														);
													}
												);

												$dropdownHolder.removeClass( 'qodef-drop-down--start' );
											}
										};

										$thisItem.hoverIntent( animateConfig );
									} else {
										var config = {
											interval: 0,
											over: function () {
												setTimeout(
													function () {
														$dropdownHolder.addClass( 'qodef-drop-down--start' ).stop().css( { 'height': dropDownHolderHeight } );
													},
													150
												);
											},
											timeout: 150,
											out: function () {
												$dropdownHolder.stop().css( { 'height': '0' } ).removeClass( 'qodef-drop-down--start' );
											}
										};

										$thisItem.hoverIntent( config );
									}
								}
							}
						);
					}
				}
			);
		},
		wideDropdownPosition: function () {
			var $menuItems = $( '.qodef-header-navigation > ul > li.qodef-menu-item--wide' );

			if ( $menuItems.length ) {
				$menuItems.each(
					function () {
						var $menuItem        = $( this );
						var $menuItemSubMenu = $menuItem.find( '.qodef-drop-down-second' ),
							$menuArrow		 = $menuItemSubMenu.find( '.qodef-drop-down-arrow' );

						if ( $menuItemSubMenu.length ) {
							$menuItemSubMenu.css( 'left', 0 );

							var leftPosition = $menuItemSubMenu.offset().left;

							if ( qodefCore.body.hasClass( 'qodef--boxed' ) ) {
								//boxed layout case
								var boxedWidth = $( '.qodef--boxed #qodef-page-wrapper' ).outerWidth();
								leftPosition   = leftPosition - (qodefCore.windowWidth - boxedWidth) / 2;
								$menuItemSubMenu.css( { 'left': -leftPosition, 'width': boxedWidth } );

							} else if ( qodefCore.body.hasClass( 'qodef-drop-down-second--full-width' ) ) {
								//wide dropdown full width case
								$menuItemSubMenu.css( { 'left': -leftPosition } );
							} else {
								//wide dropdown in grid case
								$menuItemSubMenu.css( { 'left': -leftPosition + (qodefCore.windowWidth - $menuItemSubMenu.width()) / 2 } );
							}

							if ( $menuArrow.length ) {
								$menuArrow.css('left', ($menuItem.offset().left + $menuItem.width() / 2) - $menuArrow.width() / 2);
							}
						}
					}
				);
			}
		},
		dropdownPosition: function () {
			var $menuItems = $( '.qodef-header-navigation > ul > li.qodef-menu-item--narrow.menu-item-has-children' );

			if ( $menuItems.length ) {
				$menuItems.each(
					function () {
						var $thisItem         = $( this ),
							menuItemPosition  = $thisItem.offset().left,
							$dropdownHolder   = $thisItem.find( '.qodef-drop-down-second' ),
							$dropdownMenuItem = $dropdownHolder.find( '.qodef-drop-down-second-inner ul' ),
							dropdownMenuWidth = $dropdownMenuItem.outerWidth(),
							menuItemFromLeft  = $( window ).width() - menuItemPosition,
							$menuArrow		  = $dropdownHolder.find( '.qodef-drop-down-arrow' );

						if ( qodef.body.hasClass( 'qodef--boxed' ) ) {
							//boxed layout case
							var boxedWidth   = $( '.qodef--boxed #qodef-page-wrapper' ).outerWidth();
							menuItemFromLeft = boxedWidth - menuItemPosition;
						}

						var dropDownMenuFromLeft;

						if ( $thisItem.find( 'li.menu-item-has-children' ).length > 0 ) {
							dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
						}

						$dropdownHolder.removeClass( 'qodef-drop-down--right' );
						$dropdownMenuItem.removeClass( 'qodef-drop-down--right' );
						if ( menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth ) {
							$dropdownHolder.addClass( 'qodef-drop-down--right' );
							$dropdownMenuItem.addClass( 'qodef-drop-down--right' );
						}

						if ( $menuArrow.length ) {
							$menuArrow.css('left', $thisItem.width() / 2 + (27 - $menuArrow.width() / 2)); // 27 = dropdown menu negative left offset
						}
					}
				);
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

    $( window ).on(
        'load',
        function () {
			qodefParallaxBackground.init();
		}
	);

	/**
	 * Init global parallax background functionality
	 */
	var qodefParallaxBackground = {
		init: function ( settings ) {
			this.$sections = $( '.qodef-parallax' );

			// Allow overriding the default config
			$.extend( this.$sections, settings );

			var isSupported = ! qodefCore.html.hasClass( 'touchevents' ) && ! qodefCore.body.hasClass( 'qodef-browser--edge' ) && ! qodefCore.body.hasClass( 'qodef-browser--ms-explorer' );

			if ( this.$sections.length && isSupported ) {
				this.$sections.each(
					function () {
						qodefParallaxBackground.ready( $( this ) );
					}
				);
			}
		},
		ready: function ( $section ) {
			$section.$imgHolder  = $section.find( '.qodef-parallax-img-holder' );
			$section.$imgWrapper = $section.find( '.qodef-parallax-img-wrapper' );
			$section.$img        = $section.find( 'img.qodef-parallax-img' );

			var h           = $section.height(),
				imgWrapperH = $section.$imgWrapper.height();

			$section.movement = 100 * (imgWrapperH - h) / h / 2; //percentage (divided by 2 due to absolute img centering in CSS)

			$section.buffer       = window.pageYOffset;
			$section.scrollBuffer = null;


			//calc and init loop
			requestAnimationFrame(
				function () {
					$section.$imgHolder.animate( { opacity: 1 }, 100 );
					qodefParallaxBackground.calc( $section );
					qodefParallaxBackground.loop( $section );
				}
			);

			//recalc
			$( window ).on(
				'resize',
				function () {
					qodefParallaxBackground.calc( $section );
				}
			);
		},
		calc: function ( $section ) {
			var wH = $section.$imgWrapper.height(),
				wW = $section.$imgWrapper.width();

			if ( $section.$img.width() < wW ) {
				$section.$img.css(
					{
						'width': '100%',
						'height': 'auto',
					}
				);
			}

			if ( $section.$img.height() < wH ) {
				$section.$img.css(
					{
						'height': '100%',
						'width': 'auto',
						'max-width': 'unset',
					}
				);
			}
		},
		loop: function ( $section ) {
			if ( $section.scrollBuffer === Math.round( window.pageYOffset ) ) {
				requestAnimationFrame(
					function () {
						qodefParallaxBackground.loop( $section );
					}
				); //repeat loop

				return false; //same scroll value, do nothing
			} else {
				$section.scrollBuffer = Math.round( window.pageYOffset );
			}

			var wH   = window.outerHeight,
				sTop = $section.offset().top,
				sH   = $section.height();

			if ( $section.scrollBuffer + wH * 1.2 > sTop && $section.scrollBuffer < sTop + sH ) {
				var delta = (Math.abs( $section.scrollBuffer + wH - sTop ) / (wH + sH)).toFixed( 4 ), //coeff between 0 and 1 based on scroll amount
					yVal  = (delta * $section.movement).toFixed( 4 );

				if ( $section.buffer !== delta ) {
					$section.$imgWrapper.css( 'transform', 'translate3d(0,' + yVal + '%, 0)' );
				}

				$section.buffer = delta;
			}

			requestAnimationFrame(
				function () {
					qodefParallaxBackground.loop( $section );
				}
			); //repeat loop
		}
	};

	qodefCore.qodefParallaxBackground = qodefParallaxBackground;

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefReview.init();
		}
	);

	var qodefReview = {
		init: function () {
			var ratingHolder = $( '#qodef-page-comments-form .qodef-rating-inner' );

			var addActive = function ( stars, ratingValue ) {
				for ( var i = 0; i < stars.length; i++ ) {
					var star = stars[i];

					if ( i < ratingValue ) {
						$( star ).addClass( 'active' );
					} else {
						$( star ).removeClass( 'active' );
					}
				}
			};

			ratingHolder.each(
				function () {
					var thisHolder  = $( this ),
						ratingInput = thisHolder.find( '.qodef-rating' ),
						ratingValue = ratingInput.val(),
						stars       = thisHolder.find( '.qodef-star-rating' );

					addActive( stars, ratingValue );

					stars.on(
						'click',
						function () {
							ratingInput.val( $( this ).data( 'value' ) ).trigger( 'change' );
						}
					);

					ratingInput.change(
						function () {
							ratingValue = ratingInput.val();

							addActive( stars, ratingValue );
						}
					);
				}
			);
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSideArea.init();
		}
	);

	var qodefSideArea = {
		init: function () {
			var $sideAreaOpener = $( 'a.qodef-side-area-opener' ),
				$sideAreaClose  = $( '#qodef-side-area-close' ),
				$sideArea       = $( '#qodef-side-area' );

			qodefSideArea.openerHoverColor( $sideAreaOpener );

			// Open Side Area
			$sideAreaOpener.on(
				'click',
				function ( e ) {
					e.preventDefault();

					if ( ! qodefCore.body.hasClass( 'qodef-side-area--opened' ) ) {
						qodefSideArea.openSideArea();

						$( document ).keyup(
							function ( e ) {
								if ( e.keyCode === 27 ) {
									qodefSideArea.closeSideArea();
								}
							}
						);
					} else {
						qodefSideArea.closeSideArea();
					}
				}
			);

			$sideAreaClose.on(
				'click',
				function ( e ) {
					e.preventDefault();
					qodefSideArea.closeSideArea();
				}
			);

			if ( $sideArea.length && typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
				qodefCore.qodefPerfectScrollbar.init( $sideArea );
			}
		},
		openSideArea: function () {
			var $wrapper      = $( '#qodef-page-wrapper' );
			var currentScroll = $( window ).scrollTop();

			$( '.qodef-side-area-cover' ).remove();
			$wrapper.prepend( '<div class="qodef-side-area-cover"/>' );
			qodefCore.body.removeClass( 'qodef-side-area-animate--out' ).addClass( 'qodef-side-area--opened qodef-side-area-animate--in' );

			$( '.qodef-side-area-cover' ).on(
				'click',
				function ( e ) {
					e.preventDefault();
					qodefSideArea.closeSideArea();
				}
			);

			$( window ).scroll(
				function () {
					if ( Math.abs( qodefCore.scroll - currentScroll ) > 400 ) {
						qodefSideArea.closeSideArea();
					}
				}
			);
		},
		closeSideArea: function () {
			qodefCore.body.removeClass( 'qodef-side-area--opened qodef-side-area-animate--in' ).addClass( 'qodef-side-area-animate--out' );
		},
		openerHoverColor: function ( $opener ) {
			if ( typeof $opener.data( 'hover-color' ) !== 'undefined' ) {
				var hoverColor    = $opener.data( 'hover-color' );
				var originalColor = $opener.css( 'color' );

				$opener.on(
					'mouseenter',
					function () {
						$opener.css( 'color', hoverColor );
					}
				).on(
					'mouseleave',
					function () {
						$opener.css( 'color', originalColor );
					}
				);
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSpinner.init();
		}
	);

	$( window ).on(
		'elementor/frontend/init',
		function () {
			var isEditMode = Boolean( elementorFrontend.isEditMode() );

			if ( isEditMode ) {
				qodefSpinner.init( isEditMode );
			}
		}
	);

	var qodefSpinner = {
		init: function ( isEditMode ) {
			this.holder = $( '#qodef-page-spinner:not(.qodef-layout--pharmacare)' );

			if ( this.holder.length ) {
				qodefSpinner.animateSpinner( this.holder, isEditMode );
				qodefSpinner.fadeOutAnimation();
			}
		},
		animateSpinner: function ( $holder, isEditMode ) {
			$( window ).on(
				'load',
				function () {
					qodefSpinner.fadeOutLoader( $holder );
				}
			);

			if ( isEditMode ) {
				qodefSpinner.fadeOutLoader( $holder );
			}
		},
		fadeOutLoader: function ( $holder, speed, delay, easing ) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			$holder.delay( delay ).fadeOut( speed, easing );

			$( window ).on(
				'bind',
				'pageshow',
				function ( event ) {
					if ( event.originalEvent.persisted ) {
						$holder.fadeOut( speed, easing );
					}
				}
			);
		},
		fadeOutAnimation: function () {

			// Check for fade out animation
			if ( qodefCore.body.hasClass( 'qodef-spinner--fade-out' ) ) {
				var $pageHolder = $( '#qodef-page-wrapper' ),
					$linkItems  = $( 'a' );

				// If back button is pressed, than show content to avoid state where content is on display:none
				window.addEventListener(
					'pageshow',
					function ( event ) {
						var historyPath = event.persisted || (typeof window.performance !== 'undefined' && window.performance.navigation.type === 2);
						if ( historyPath && ! $pageHolder.is( ':visible' ) ) {
							$pageHolder.show();
						}
					}
				);

				$linkItems.on(
					'click',
					function ( e ) {
						var $clickedLink = $( this );

						if (
							e.which === 1 && // check if the left mouse button has been pressed
							$clickedLink.attr( 'href' ).indexOf( window.location.host ) >= 0 && // check if the link is to the same domain
							! $clickedLink.hasClass( 'remove' ) && // check is WooCommerce remove link
							$clickedLink.parent( '.product-remove' ).length <= 0 && // check is WooCommerce remove link
							$clickedLink.parents( '.woocommerce-product-gallery__image' ).length <= 0 && // check is product gallery link
							typeof $clickedLink.data( 'rel' ) === 'undefined' && // check pretty photo link
							typeof $clickedLink.attr( 'rel' ) === 'undefined' && // check VC pretty photo link
							! $clickedLink.hasClass( 'lightbox-active' ) && // check is lightbox plugin active
							(typeof $clickedLink.attr( 'target' ) === 'undefined' || $clickedLink.attr( 'target' ) === '_self') && // check if the link opens in the same window
							$clickedLink.attr( 'href' ).split( '#' )[0] !== window.location.href.split( '#' )[0] // check if it is an anchor aiming for a different page
						) {
							e.preventDefault();

							$pageHolder.fadeOut(
								600,
								'easeOutSine',
								function () {
									window.location = $clickedLink.attr( 'href' );
								}
							);
						}
					}
				);
			}
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

    $( window ).on(
        'load',
        function () {
			qodefSubscribeModal.init();
		}
	);

	var qodefSubscribeModal = {
		init: function () {
			this.holder = $( '#qodef-subscribe-popup-modal' );

			if ( this.holder.length ) {
				var $preventHolder = this.holder.find( '.qodef-sp-prevent' ),
					$modalClose    = $( '.qodef-sp-close' ),
					disabledPopup  = 'no';

				if ( $preventHolder.length ) {
					var isLocalStorage = this.holder.hasClass( 'qodef-sp-prevent-cookies' ),
						$preventInput  = $preventHolder.find( '.qodef-sp-prevent-input' ),
						preventValue   = $preventInput.data( 'value' );

					if ( isLocalStorage ) {
						disabledPopup = localStorage.getItem( 'disabledPopup' );
						sessionStorage.removeItem( 'disabledPopup' );
					} else {
						disabledPopup = sessionStorage.getItem( 'disabledPopup' );
						localStorage.removeItem( 'disabledPopup' );
					}

					$preventHolder.children().on(
						'click',
						function ( e ) {
							if ( preventValue !== 'yes' ) {
								preventValue = 'yes';
								$preventInput.addClass( 'qodef-sp-prevent-clicked' ).data( 'value', 'yes' );
							} else {
								preventValue = 'no';
								$preventInput.removeClass( 'qodef-sp-prevent-clicked' ).data( 'value', 'no' );
							}

							if ( preventValue === 'yes' ) {
								if ( isLocalStorage ) {
									localStorage.setItem( 'disabledPopup', 'yes' );
								} else {
									sessionStorage.setItem( 'disabledPopup', 'yes' );
								}
							} else {
								if ( isLocalStorage ) {
									localStorage.setItem( 'disabledPopup', 'no' );
								} else {
									sessionStorage.setItem( 'disabledPopup', 'no' );
								}
							}
						}
					);
				}

				if ( disabledPopup !== 'yes' ) {
					if ( qodefCore.body.hasClass( 'qodef-sp-opened' ) ) {
						qodefSubscribeModal.handleClassAndScroll( 'remove' );
					} else {
						qodefSubscribeModal.handleClassAndScroll( 'add' );
					}

					$modalClose.on(
						'click',
						function ( e ) {
							e.preventDefault();

							qodefSubscribeModal.handleClassAndScroll( 'remove' );
						}
					);

					// Close on escape
					$( document ).keyup(
						function ( e ) {
							if ( e.keyCode === 27 ) { // KeyCode for ESC button is 27
								qodefSubscribeModal.handleClassAndScroll( 'remove' );
							}
						}
					);
				}
			}
		},

		handleClassAndScroll: function ( option ) {
			if ( option === 'remove' ) {
				qodefCore.body.removeClass( 'qodef-sp-opened' );
				qodefCore.qodefScroll.enable();
			}

			if ( option === 'add' ) {
				qodefCore.body.addClass( 'qodef-sp-opened' );
				qodefCore.qodefScroll.disable();
			}
		},
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.pharmacare_core_accordion = {};

	$( document ).ready(
		function () {
			qodefAccordion.init();
		}
	);

	var qodefAccordion = {
		init: function () {
			this.holder = $( '.qodef-accordion' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						var $thisHolder = $( this );

						if ( $thisHolder.hasClass( 'qodef-behavior--accordion' ) ) {
							qodefAccordion.initAccordion( $thisHolder );
						}

						if ( $thisHolder.hasClass( 'qodef-behavior--toggle' ) ) {
							qodefAccordion.initToggle( $thisHolder );
						}

						$thisHolder.addClass( 'qodef--init' );
					}
				);
			}
		},
		initAccordion: function ( $accordion ) {
			$accordion.accordion(
				{
					animate: 'swing',
					collapsible: true,
					active: 0,
					icons: '',
					heightStyle: 'content',
				}
			);
		},
		initToggle: function ( $toggle ) {
			var $toggleAccordionTitle   = $toggle.find( '.qodef-accordion-title' ),
				$toggleAccordionContent = $toggleAccordionTitle.next();

			$toggle.addClass( 'accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset' );
			$toggleAccordionTitle.addClass( 'ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom' );
			$toggleAccordionContent.addClass( 'ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom' ).hide();

			$toggleAccordionTitle.each(
				function () {
					var $thisTitle = $( this );

					$thisTitle.hover(
						function () {
							$thisTitle.toggleClass( 'ui-state-hover' );
						}
					);

					$thisTitle.on(
						'click',
						function (e) {
							e.preventDefault();
							e.stopImmediatePropagation();
							$thisTitle.toggleClass( 'ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom' );
							$thisTitle.next().toggleClass( 'ui-accordion-content-active' ).slideToggle( 400 );
						}
					);
				}
			);
		}
	};

	qodefCore.shortcodes.pharmacare_core_accordion.qodefAccordion = qodefAccordion;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.pharmacare_core_button = {};

	$( document ).ready(
		function () {
			qodefButton.init();
		}
	);

	var qodefButton = {
		init: function () {
			this.buttons = $( '.qodef-button' );

			if ( this.buttons.length ) {
				this.buttons.each(
					function () {
						var $thisButton = $( this );

						qodefButton.buttonHoverColor( $thisButton );
						qodefButton.buttonHoverBgColor( $thisButton );
						qodefButton.buttonHoverBorderColor( $thisButton );
					}
				);
			}
		},
		buttonHoverColor: function ( $button ) {
			if ( typeof $button.data( 'hover-color' ) !== 'undefined' ) {
				var hoverColor    = $button.data( 'hover-color' );
				var originalColor = $button.css( 'color' );

				$button.on(
					'mouseenter',
					function () {
						qodefButton.changeColor( $button, 'color', hoverColor );
					}
				);
				$button.on(
					'mouseleave',
					function () {
						qodefButton.changeColor( $button, 'color', originalColor );
					}
				);
			}
		},
		buttonHoverBgColor: function ( $button ) {
			if ( typeof $button.data( 'hover-background-color' ) !== 'undefined' ) {
				var hoverBackgroundColor    = $button.data( 'hover-background-color' );
				var originalBackgroundColor = $button.css( 'background-color' );

				$button.on(
					'mouseenter',
					function () {
						qodefButton.changeColor( $button, 'background-color', hoverBackgroundColor );
					}
				);
				$button.on(
					'mouseleave',
					function () {
						qodefButton.changeColor( $button, 'background-color', originalBackgroundColor );
					}
				);
			}
		},
		buttonHoverBorderColor: function ( $button ) {
			if ( typeof $button.data( 'hover-border-color' ) !== 'undefined' ) {
				var hoverBorderColor    = $button.data( 'hover-border-color' );
				var originalBorderColor = $button.css( 'borderTopColor' );

				$button.on(
					'mouseenter',
					function () {
						qodefButton.changeColor( $button, 'border-color', hoverBorderColor );
					}
				);
				$button.on(
					'mouseleave',
					function () {
						qodefButton.changeColor( $button, 'border-color', originalBorderColor );
					}
				);
			}
		},
		changeColor: function ( $button, cssProperty, color ) {
			$button.css( cssProperty, color );
		}
	};

	qodefCore.shortcodes.pharmacare_core_button.qodefButton = qodefButton;

})( jQuery );

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.pharmacare_core_cards_gallery = {};

	$( document ).ready(
		function () {
			qodefCardsGallery.init();
		}
	);

	var qodefCardsGallery = {
		init: function () {
			this.holder = $( '.qodef-cards-gallery' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						var $thisHolder = $( this );
						qodefCardsGallery.initCards( $thisHolder );
						qodefCardsGallery.initBundle( $thisHolder );
					}
				);
			}
		},
		initCards: function ( $holder ) {
			var $cards = $holder.find( '.qodef-m-card' );
			$cards.each(
				function () {
					var $card = $( this );

					$card.on(
						'click',
						function () {
							if ( ! $cards.last().is( $card ) ) {
								$card.addClass( 'qodef-out qodef-animating' ).siblings().addClass( 'qodef-animating-siblings' );
								$card.detach();
								$card.insertAfter( $cards.last() );

								setTimeout(
									function () {
										$card.removeClass( 'qodef-out' );
									},
									200
								);

								setTimeout(
									function () {
										$card.removeClass( 'qodef-animating' ).siblings().removeClass( 'qodef-animating-siblings' );
									},
									1200
								);

								$cards = $holder.find( '.qodef-m-card' );

								return false;
							}
						}
					);
				}
			);
		},
		initBundle: function ( $holder ) {
			if ( $holder.hasClass( 'qodef-animation--bundle' ) && ! qodefCore.html.hasClass( 'touchevents' ) ) {
				$holder.appear(
					function () {
						$holder.addClass( 'qodef-appeared' );
						$holder.find( 'img' ).one(
							'animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd',
							function () {
								$( this ).addClass( 'qodef-animation-done' );
							}
						);
					},
					{ accX: 0, accY: -150 }
				);
			}
		}
	};

	qodefCore.shortcodes.pharmacare_core_cards_gallery.qodefCardsGallery = qodefCardsGallery;

})( jQuery );

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
(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.pharmacare_core_google_map = {};

	$( document ).ready(
		function () {
			qodefGoogleMap.init();
		}
	);

	var qodefGoogleMap = {
		init: function () {
			this.holder = $( '.qodef-google-map' );

			if ( this.holder.length ) {
				this.holder.each(
					function () {
						if ( typeof window.qodefGoogleMap !== 'undefined' ) {
							window.qodefGoogleMap.init( $( this ).find( '.qodef-m-map' ) );
						}
					}
				);
			}
		}
	};

	qodefCore.shortcodes.pharmacare_core_google_map.qodefGoogleMap = qodefGoogleMap;

})( jQuery );

(function ($) {
    "use strict";

	qodefCore.shortcodes.pharmacare_core_icon = {};

    $(document).ready(function () {
        qodefIcon.init();
    });

    var qodefIcon = {
        init: function () {
            this.icons = $('.qodef-icon-holder');

            if (this.icons.length) {
                this.icons.each(function () {
                    var $thisIcon = $(this);

                    qodefIcon.iconHoverColor($thisIcon);
                    qodefIcon.iconHoverBgColor($thisIcon);
                    qodefIcon.iconHoverBorderColor($thisIcon);
                });
            }
        },
        iconHoverColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-color') !== 'undefined') {
                var spanHolder = $iconHolder.find('span');
                var originalColor = spanHolder.css('color');
                var hoverColor = $iconHolder.data('hover-color');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor(spanHolder, 'color', hoverColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor(spanHolder, 'color', originalColor);
                });
            }
        },
        iconHoverBgColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-background-color') !== 'undefined') {
                var hoverBackgroundColor = $iconHolder.data('hover-background-color');
                var originalBackgroundColor = $iconHolder.css('background-color');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor($iconHolder, 'background-color', hoverBackgroundColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor($iconHolder, 'background-color', originalBackgroundColor);
                });
            }
        },
        iconHoverBorderColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-border-color') !== 'undefined') {
                var hoverBorderColor = $iconHolder.data('hover-border-color');
                var originalBorderColor = $iconHolder.css('borderTopColor');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor($iconHolder, 'border-color', hoverBorderColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor($iconHolder, 'border-color', originalBorderColor);
                });
            }
        },
        changeColor: function (iconElement, cssProperty, color) {
            iconElement.css(cssProperty, color);
        }
    };

	qodefCore.shortcodes.pharmacare_core_icon.qodefIcon = qodefIcon;

})(jQuery);
(function ( $ ) {
	'use strict';
	
	qodefCore.shortcodes.pharmacare_core_image_carousel = {};
	
	$( document ).ready(
		function () {
			qodefImageCarousel.init();
		}
	);
	
	
	var qodefImageCarousel = {
		init: function () {
			var sliders = $('.qodef-owl-slider');
			
			if (sliders.length) {
				sliders.each(function () {
					var slider = $(this),
						slideItemsNumber = slider.children().length,
						numberOfItems = 1,
						loop = true,
						autoplay = true,
						autoplayHoverPause = true,
						sliderSpeed = 5000,
						sliderSpeedAnimation = 600,
						margin = 0,
						responsiveMargin = 0,
						responsiveMargin1 = 0,
						stagePadding = 0,
						stagePaddingEnabled = false,
						center = false,
						autoWidth = false,
						animateInClass = false, // keyframe css animation
						animateOut = false, // keyframe css animation
						navigation = true,
						pagination = false,
						sliderDataHolder = slider;
					
					if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false) {
						numberOfItems = slider.data('number-of-items');
					}
					//if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
					//   numberOfItems = sliderDataHolder.data('number-of-columns');
					//}
					if (sliderDataHolder.data('enable-loop') === 'no') {
						loop = false;
					}
					if (sliderDataHolder.data('enable-autoplay') === 'no') {
						autoplay = false;
					}
					if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
						autoplayHoverPause = false;
					}
					if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
						sliderSpeed = sliderDataHolder.data('slider-speed');
					}
					if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
						sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
					}
					if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
						if (sliderDataHolder.data('slider-margin') === 'no') {
							margin = 0;
						} else {
							margin = sliderDataHolder.data('slider-margin');
						}
					} else {
						if (slider.parent().hasClass('qodef-huge-space')) {
							margin = 60;
						} else if (slider.parent().hasClass('qodef-large-space')) {
							margin = 50;
						} else if (slider.parent().hasClass('qodef-normal-space')) {
							margin = 30;
						} else if (slider.parent().hasClass('qodef-small-space')) {
							margin = 20;
						} else if (slider.parent().hasClass('qodef-tiny-space')) {
							margin = 10;
						}
					}
					if (sliderDataHolder.data('slider-padding') === 'yes') {
						stagePaddingEnabled = true;
						stagePadding = parseInt(slider.outerWidth() * 0.28);
						margin = 50;
					}
					if (sliderDataHolder.data('enable-center') === 'yes') {
						center = true;
					}
					if (sliderDataHolder.data('enable-auto-width') === 'yes') {
						autoWidth = true;
					}
					if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
						animateInClass = sliderDataHolder.data('slider-animate-in');
					}
					if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
						animateOut = sliderDataHolder.data('slider-animate-out');
					}
					if (sliderDataHolder.data('enable-navigation') === 'no') {
						navigation = false;
					}
					if (sliderDataHolder.data('enable-pagination') === 'yes') {
						pagination = true;
					}
					
					if (navigation && pagination) {
						slider.addClass('qodef-slider-has-both-nav');
					}
					
					if (slideItemsNumber <= 1) {
						loop = false;
						autoplay = false;
						navigation = false;
						pagination = false;
					}
					
					var responsiveNumberOfItems1 = 1,
						responsiveNumberOfItems2 = 2,
						responsiveNumberOfItems3 = 3,
						responsiveNumberOfItems4 = numberOfItems;
					
					if (numberOfItems < 3) {
						responsiveNumberOfItems2 = numberOfItems;
						responsiveNumberOfItems3 = numberOfItems;
					}
					
					if (numberOfItems > 4) {
						responsiveNumberOfItems4 = 4;
					}
					
					if (slider.hasClass('qodef-image-carousel') && numberOfItems === 8) {
						responsiveNumberOfItems4 = 8;
						responsiveNumberOfItems3 = 6;
						responsiveNumberOfItems2 = 4;
						responsiveNumberOfItems1 = 2;
					}
					
					if (slider.hasClass('qodef-clients-carousel')) {
						responsiveNumberOfItems4 = 5;
						responsiveNumberOfItems3 = 4;
						responsiveNumberOfItems2 = 3;
						responsiveNumberOfItems1 = 2;
					}
					
					if (stagePaddingEnabled || margin > 30) {
						responsiveMargin = 20;
						responsiveMargin1 = 30;
					}
					
					if (margin > 0 && margin <= 30) {
						responsiveMargin = margin;
						responsiveMargin1 = margin;
					}
					
					slider.owlCarousel({
						items: numberOfItems,
						loop: loop,
						autoplay: autoplay,
						autoplayHoverPause: autoplayHoverPause,
						autoplayTimeout: sliderSpeed,
						smartSpeed: sliderSpeedAnimation,
						margin: margin,
						stagePadding: stagePadding,
						center: center,
						autoWidth: autoWidth,
						animateInClass: animateInClass,
						animateOut: animateOut,
						dots: pagination,
						nav: navigation,
						navText: [
							'<span class="qodef-icon-fontkiko kiko-triangular-arrow-left qodef-icon qodef-e" style=""></span>',
							'<span class="qodef-icon-fontkiko kiko-triangular-arrow-right qodef-icon qodef-e" style=""></span>'
						],
						responsive: {
							0: {
								items: responsiveNumberOfItems1,
								margin: responsiveMargin,
								stagePadding: 0,
								center: false,
								autoWidth: false
							},
							681: {
								items: responsiveNumberOfItems2,
								margin: responsiveMargin1
							},
							769: {
								items: responsiveNumberOfItems3,
								margin: responsiveMargin1
							},
							1025: {
								items: responsiveNumberOfItems4
							},
							1281: {
								items: numberOfItems
							}
						},
						onInitialize: function () {
							slider.css('visibility', 'visible');
							//qodefInitParallax();
						},
						onTranslate: function () {
							//qodefInitVDCountdown();
						},
						onDrag: function (e) {
							if (qodef.body.hasClass('qodef-smooth-page-transitions-fadeout')) {
								var sliderIsMoving = e.isTrigger > 0;
								
								if (sliderIsMoving) {
									slider.addClass('qodef-slider-is-moving');
								}
							}
						},
						onDragged: function () {
							if (qodef.body.hasClass('qodef-smooth-page-transitions-fadeout') && slider.hasClass('qodef-slider-is-moving')) {
								
								setTimeout(function () {
									slider.removeClass('qodef-slider-is-moving');
								}, 500);
							}
						}
					});
				});
			}
		}
	}
	
	qodefCore.shortcodes.pharmacare_core_image_carousel.qodefImageCarousel = qodefImageCarousel;
	
})( jQuery );

(function ($) {
    "use strict";
    
	qodefCore.shortcodes.pharmacare_core_image_gallery = {};
	qodefCore.shortcodes.pharmacare_core_image_gallery.qodefSwiper = qodef.qodefSwiper;
	qodefCore.shortcodes.pharmacare_core_image_gallery.qodefMasonryLayout = qodef.qodefMasonryLayout;

})(jQuery);

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

(function ($) {
	"use strict";

	qodefCore.shortcodes.pharmacare_core_tabs = {};

	$(document).ready(function () {
		qodefTabs.init();
	});
	
	var qodefTabs = {
		init: function () {
			this.holder = $('.qodef-tabs');
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefTabs.initTabs($(this));
				});
			}
		},
		initTabs: function ($tabs) {
			$tabs.children('.qodef-tabs-content').each(function (index) {
				index = index + 1;
				
				var $that = $(this),
					link = $that.attr('id'),
					$navItem = $that.parent().find('.qodef-tabs-navigation li:nth-child(' + index + ') a'),
					navLink = $navItem.attr('href');
				
				link = '#' + link;
				
				if (link.indexOf(navLink) > -1) {
					$navItem.attr('href', link);
				}
			});
			
			$tabs.addClass('qodef--init').tabs();
		}
	};

	qodefCore.shortcodes.pharmacare_core_tabs.qodefTabs = qodefTabs;

})(jQuery);
(function ($) {
    "use strict";

	qodefCore.shortcodes.pharmacare_core_video_button = {};
    qodefCore.shortcodes.pharmacare_core_video_button.qodefMagnificPopup = qodef.qodefMagnificPopup;

})(jQuery);
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

(function ( $ ) {
	'use strict';

	var fixedHeaderAppearance = {
		showHideHeader: function ( $pageOuter, $header ) {
			if ( qodefCore.windowWidth > 1024 ) {
				if ( qodefCore.scroll <= 0 ) {
					qodefCore.body.removeClass( 'qodef-header--fixed-display' );
					$pageOuter.css( 'padding-top', '0' );
					$header.css( 'margin-top', '0' );
				} else {
					qodefCore.body.addClass( 'qodef-header--fixed-display' );
					$pageOuter.css( 'padding-top', parseInt( qodefGlobal.vars.headerHeight + qodefGlobal.vars.topAreaHeight ) + 'px' );
					$header.css( 'margin-top', parseInt( qodefGlobal.vars.topAreaHeight ) + 'px' );
				}
			}
		},
		init: function () {

			if ( ! qodefCore.body.hasClass( 'qodef-header--vertical' ) ) {
				var $pageOuter = $( '#qodef-page-outer' ),
					$header    = $( '#qodef-page-header' );

				fixedHeaderAppearance.showHideHeader( $pageOuter, $header );

				$( window ).scroll(
					function () {
						fixedHeaderAppearance.showHideHeader( $pageOuter, $header );
					}
				);

				$( window ).resize(
					function () {
						$pageOuter.css( 'padding-top', '0' );
						fixedHeaderAppearance.showHideHeader( $pageOuter, $header );
					}
				);
			}
		}
	};

	qodefCore.fixedHeaderAppearance = fixedHeaderAppearance.init;

})( jQuery );

(function ( $ ) {
	'use strict';

	var stickyHeaderAppearance = {
		header: '',
		docYScroll: 0,
		init: function () {
			var displayAmount = stickyHeaderAppearance.displayAmount();

			// Set variables
			stickyHeaderAppearance.header 	  = $( '.qodef-header-sticky' );
			stickyHeaderAppearance.docYScroll = $( document ).scrollTop();

			// Set sticky visibility
			stickyHeaderAppearance.setVisibility( displayAmount );

			$( window ).scroll(
				function () {
					stickyHeaderAppearance.setVisibility( displayAmount );
				}
			);
		},
		displayAmount: function () {
			if ( qodefGlobal.vars.qodefStickyHeaderScrollAmount !== 0 ) {
				return parseInt( qodefGlobal.vars.qodefStickyHeaderScrollAmount, 10 );
			} else {
				return parseInt( qodefGlobal.vars.headerHeight + qodefGlobal.vars.adminBarHeight, 10 );
			}
		},
		setVisibility: function ( displayAmount ) {
			var isStickyHidden = qodefCore.scroll < displayAmount;

			if ( stickyHeaderAppearance.header.hasClass( 'qodef-appearance--up' ) ) {
				var currentDocYScroll = $( document ).scrollTop();

				isStickyHidden = (currentDocYScroll > stickyHeaderAppearance.docYScroll && currentDocYScroll > displayAmount) || (currentDocYScroll < displayAmount);

				stickyHeaderAppearance.docYScroll = $( document ).scrollTop();
			}

			stickyHeaderAppearance.showHideHeader( isStickyHidden );
		},
		showHideHeader: function ( isStickyHidden ) {
			if ( isStickyHidden ) {
				qodefCore.body.removeClass( 'qodef-header--sticky-display' );
			} else {
				qodefCore.body.addClass( 'qodef-header--sticky-display' );
			}
		},
	};

	qodefCore.stickyHeaderAppearance = stickyHeaderAppearance.init;

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSideAreaMobileHeader.init();
		}
	);

	var qodefSideAreaMobileHeader = {
		init: function () {
			var $holder = $( '#qodef-side-area-mobile-header' );

			if ( $holder.length && qodefCore.body.hasClass( 'qodef-mobile-header--side-area' ) ) {
				var $navigation = $holder.find( '.qodef-m-navigation' );

				qodefSideAreaMobileHeader.initOpenerTrigger( $holder, $navigation );
				qodefSideAreaMobileHeader.initNavigationClickToggle( $navigation );

				if ( typeof qodefCore.qodefPerfectScrollbar === 'object' ) {
					qodefCore.qodefPerfectScrollbar.init( $holder );
				}
			}
		},
		initOpenerTrigger: function ( $holder, $navigation ) {
			var $openerIcon = $( '.qodef-side-area-mobile-header-opener' ),
				$closeIcon  = $holder.children( '.qodef-m-close' );

			if ( $openerIcon.length && $navigation.length ) {
				$openerIcon.on(
					'tap click',
					function ( e ) {
						e.stopPropagation();
						e.preventDefault();

						if ( $holder.hasClass( 'qodef--opened' ) ) {
							$holder.removeClass( 'qodef--opened' );
						} else {
							$holder.addClass( 'qodef--opened' );
						}
					}
				);
			}

			$closeIcon.on(
				'tap click',
				function ( e ) {
					e.stopPropagation();
					e.preventDefault();

					if ( $holder.hasClass( 'qodef--opened' ) ) {
						$holder.removeClass( 'qodef--opened' );
					}
				}
			);
		},
		initNavigationClickToggle: function ( $navigation ) {
			var $menuItems = $navigation.find( 'ul li.menu-item-has-children' );

			$menuItems.each(
				function () {
					var $thisItem        = $( this ),
						$elementToExpand = $thisItem.find( ' > .qodef-drop-down-second, > ul' ),
						$dropdownOpener  = $thisItem.find( '> a' ),
						slideUpSpeed     = 'fast',
						slideDownSpeed   = 'slow';

					$dropdownOpener.on(
						'click tap',
						function ( e ) {
							e.preventDefault();
							e.stopPropagation();

							if ( $elementToExpand.is( ':visible' ) ) {
								$thisItem.removeClass( 'qodef-menu-item--open' );
								$elementToExpand.slideUp( slideUpSpeed );
							} else if ( $dropdownOpener.parent().parent().children().hasClass( 'qodef-menu-item--open' ) && $dropdownOpener.parent().parent().parent().hasClass( 'qodef-vertical-menu' ) ) {
								$thisItem.parent().parent().children().removeClass( 'qodef-menu-item--open' );
								$thisItem.parent().parent().children().find( ' > .qodef-drop-down-second' ).slideUp( slideUpSpeed );

								$thisItem.addClass( 'qodef-menu-item--open' );
								$elementToExpand.slideDown( slideDownSpeed );
							} else {

								if ( ! $thisItem.parents( 'li' ).hasClass( 'qodef-menu-item--open' ) ) {
									$menuItems.removeClass( 'qodef-menu-item--open' );
									$menuItems.find( ' > .qodef-drop-down-second, > ul' ).slideUp( slideUpSpeed );
								}

								if ( $thisItem.parent().parent().children().hasClass( 'qodef-menu-item--open' ) ) {
									$thisItem.parent().parent().children().removeClass( 'qodef-menu-item--open' );
									$thisItem.parent().parent().children().find( ' > .qodef-drop-down-second, > ul' ).slideUp( slideUpSpeed );
								}

								$thisItem.addClass( 'qodef-menu-item--open' );
								$elementToExpand.slideDown( slideDownSpeed );
							}
						}
					);
				}
			);
		},
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSearchCoversHeader.init();
		}
	);

	var qodefSearchCoversHeader = {
		init: function () {
			var $searchOpener = $( 'a.qodef-search-opener' ),
				$searchForm   = $( '.qodef-search-cover-form' ),
				$searchClose  = $searchForm.find( '.qodef-m-close' );

			if ( $searchOpener.length && $searchForm.length ) {
				$searchOpener.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefSearchCoversHeader.openCoversHeader( $searchForm );
					}
				);
				$searchClose.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefSearchCoversHeader.closeCoversHeader( $searchForm );
					}
				);
			}
		},
		openCoversHeader: function ( $searchForm ) {
			qodefCore.body.addClass( 'qodef-covers-search--opened qodef-covers-search--fadein' );
			qodefCore.body.removeClass( 'qodef-covers-search--fadeout' );

			setTimeout(
				function () {
					$searchForm.find( '.qodef-m-form-field' ).focus();
				},
				600
			);
		},
		closeCoversHeader: function ( $searchForm ) {
			qodefCore.body.removeClass( 'qodef-covers-search--opened qodef-covers-search--fadein' );
			qodefCore.body.addClass( 'qodef-covers-search--fadeout' );

			setTimeout(
				function () {
					$searchForm.find( '.qodef-m-form-field' ).val( '' );
					$searchForm.find( '.qodef-m-form-field' ).blur();
					qodefCore.body.removeClass( 'qodef-covers-search--fadeout' );
				},
				300
			);
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSearchFullscreen.init();
		}
	);

	var qodefSearchFullscreen = {
		init: function () {
			var $searchOpener = $( 'a.qodef-search-opener' ),
				$searchHolder = $( '.qodef-fullscreen-search-holder' ),
				$searchClose  = $searchHolder.find( '.qodef-m-close' );

			if ( $searchOpener.length && $searchHolder.length ) {
				$searchOpener.on(
					'click',
					function ( e ) {
						e.preventDefault();
						if ( qodefCore.body.hasClass( 'qodef-fullscreen-search--opened' ) ) {
							qodefSearchFullscreen.closeFullscreen( $searchHolder );
						} else {
							qodefSearchFullscreen.openFullscreen( $searchHolder );
						}
					}
				);
				$searchClose.on(
					'click',
					function ( e ) {
						e.preventDefault();
						qodefSearchFullscreen.closeFullscreen( $searchHolder );
					}
				);

				//Close on escape
				$( document ).keyup(
					function ( e ) {
						if ( e.keyCode === 27 && qodefCore.body.hasClass( 'qodef-fullscreen-search--opened' ) ) { //KeyCode for ESC button is 27
							qodefSearchFullscreen.closeFullscreen( $searchHolder );
						}
					}
				);
			}
		},
		openFullscreen: function ( $searchHolder ) {
			qodefCore.body.removeClass( 'qodef-fullscreen-search--fadeout' );
			qodefCore.body.addClass( 'qodef-fullscreen-search--opened qodef-fullscreen-search--fadein' );

			setTimeout(
				function () {
					$searchHolder.find( '.qodef-m-form-field' ).focus();
				},
				900
			);

			qodefCore.qodefScroll.disable();
		},
		closeFullscreen: function ( $searchHolder ) {
			qodefCore.body.removeClass( 'qodef-fullscreen-search--opened qodef-fullscreen-search--fadein' );
			qodefCore.body.addClass( 'qodef-fullscreen-search--fadeout' );

			setTimeout(
				function () {
					$searchHolder.find( '.qodef-m-form-field' ).val( '' );
					$searchHolder.find( '.qodef-m-form-field' ).blur();
					qodefCore.body.removeClass( 'qodef-fullscreen-search--fadeout' );
				},
				300
			);

			qodefCore.qodefScroll.enable();
		}
	};

})( jQuery );

(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSearch.init();
		}
	);

	var qodefSearch = {
		init: function () {
			this.search = $( 'a.qodef-search-opener' );

			if ( this.search.length ) {
				this.search.each(
					function () {
						var $thisSearch = $( this );

						qodefSearch.searchHoverColor( $thisSearch );
					}
				);
			}
		},
		searchHoverColor: function ( $searchHolder ) {
			if ( typeof $searchHolder.data( 'hover-color' ) !== 'undefined' ) {
				var hoverColor    = $searchHolder.data( 'hover-color' ),
					originalColor = $searchHolder.css( 'color' );

				$searchHolder.on(
					'mouseenter',
					function () {
						$searchHolder.css( 'color', hoverColor );
					}
				).on(
					'mouseleave',
					function () {
						$searchHolder.css( 'color', originalColor );
					}
				);
			}
		}
	};

})( jQuery );

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
(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefProgressBarSpinner.init();
		}
	);

	var qodefProgressBarSpinner = {
		percentNumber: 0,
		init: function () {
			this.holder = $( '#qodef-page-spinner.qodef-layout--progress-bar' );

			if ( this.holder.length ) {
				qodefProgressBarSpinner.animateSpinner( this.holder );
			}
		},
		animateSpinner: function ( $holder ) {

			var $numberHolder = $holder.find( '.qodef-m-spinner-number-label' ),
				$spinnerLine  = $holder.find( '.qodef-m-spinner-line-front' ),
				numberIntervalFastest,
				windowLoaded  = false;

			$spinnerLine.animate(
				{ 'width': '100%' },
				10000,
				'linear'
			);

			var numberInterval = setInterval(
				function () {
					qodefProgressBarSpinner.animatePercent( $numberHolder, qodefProgressBarSpinner.percentNumber );

					if ( windowLoaded ) {
						clearInterval( numberInterval );
					}
				},
				100
			);

			$( window ).on(
				'load',
				function () {
					windowLoaded = true;

					numberIntervalFastest = setInterval(
						function () {
							if ( qodefProgressBarSpinner.percentNumber >= 100 ) {
								clearInterval( numberIntervalFastest );
								$spinnerLine.stop().animate(
									{ 'width': '100%' },
									500
								);

								setTimeout(
									function () {
										$holder.addClass( 'qodef--finished' );

										setTimeout(
											function () {
												qodefProgressBarSpinner.fadeOutLoader( $holder );
											},
											1000
										);
									},
									600
								);
							} else {
								qodefProgressBarSpinner.animatePercent( $numberHolder, qodefProgressBarSpinner.percentNumber );
							}
						},
						6
					);
				}
			);
		},
		animatePercent: function ( $numberHolder, percentNumber ) {
			if ( percentNumber < 100 ) {
				percentNumber += 5;
				$numberHolder.text( percentNumber );

				qodefProgressBarSpinner.percentNumber = percentNumber;
			}
		},
		fadeOutLoader: function ( $holder, speed, delay, easing ) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			$holder.delay( delay ).fadeOut( speed, easing );

			$( window ).on(
				'bind',
				'pageshow',
				function ( event ) {
					if ( event.originalEvent.persisted ) {
						$holder.fadeOut( speed, easing );
					}
				}
			);
		}
	};

})( jQuery );

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

(function ($) {
    "use strict";
    
	qodefCore.shortcodes.pharmacare_core_product_categories_list = {};
	qodefCore.shortcodes.pharmacare_core_product_categories_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.pharmacare_core_product_categories_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
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

(function ($) {
	"use strict";
	
	var shortcode = 'pharmacare_core_product_list';
	
	qodefCore.shortcodes[shortcode] = {};
	
	if (typeof qodefCore.listShortcodesScripts === 'object') {
		$.each(qodefCore.listShortcodesScripts, function (key, value) {
			qodefCore.shortcodes[shortcode][key] = value;
		});
	}
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSideAreaCart.init();
	});
	
	var qodefSideAreaCart = {
		init: function () {
			var $holder = $('.qodef-woo-side-area-cart');
			
			if ($holder.length) {
				$holder.each(function () {
					var $thisHolder = $(this);
					
					if (qodefCore.windowWidth > 680) {
						qodefSideAreaCart.trigger($thisHolder);
						
						qodefCore.body.on('added_to_cart', function () {
							qodefSideAreaCart.trigger($thisHolder);
						});
					}
				});
			}
		},
		trigger: function ($holder) {
			var $opener = $holder.find('.qodef-m-opener'),
				$close = $holder.find('.qodef-m-close'),
				$items = $holder.find('.qodef-m-items');
			
			// Open Side Area
			$opener.on('click', function (e) {
				e.preventDefault();
				
				if (!$holder.hasClass('qodef--opened')) {
					qodefSideAreaCart.openSideArea($holder);
					
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							qodefSideAreaCart.closeSideArea($holder);
						}
					});
				} else {
					qodefSideAreaCart.closeSideArea($holder);
				}
			});
			
			$close.on('click', function (e) {
				e.preventDefault();
				
				qodefSideAreaCart.closeSideArea($holder);
			});
			
			if ($items.length && typeof qodefCore.qodefPerfectScrollbar === 'object') {
				qodefCore.qodefPerfectScrollbar.init($items);
			}
		},
		openSideArea: function ($holder) {
			qodefCore.qodefScroll.disable();
			
			$holder.addClass('qodef--opened');
			$('#qodef-page-wrapper').prepend('<div class="qodef-woo-side-area-cart-cover"/>');
			
			$('.qodef-woo-side-area-cart-cover').on('click', function (e) {
				e.preventDefault();
				
				qodefSideAreaCart.closeSideArea($holder);
			});
		},
		closeSideArea: function ($holder) {
			if ($holder.hasClass('qodef--opened')) {
				qodefCore.qodefScroll.enable();
				
				$holder.removeClass('qodef--opened');
				$('.qodef-woo-side-area-cart-cover').remove();
			}
		}
	};
	
})(jQuery);

/* PharmaCare Yith Wishlist widget counter update
as covered here https://support.yithemes.com/hc/en-us/articles/115001372967-Wishlist-How-to-count-number-of-products-wishlist-in-ajax */
jQuery( document ).ready( function( $ ){
	$(document).on( 'added_to_wishlist removed_from_wishlist', function(){
		var counter = $('.qodef-wishlist-count');

		$.ajax({
			url: yith_wcwl_l10n.ajax_url,
			data: {
			action: 'yith_wcwl_update_wishlist_count'
			},
			dataType: 'json',
			success: function( data ){
			counter.html( data.count );
			},
			beforeSend: function(){
			counter.block();
			},
			complete: function(){
			counter.unblock();
			}
		})
	} )
});

(function ( $ ) {
	'use strict';

	qodefCore.shortcodes.pharmacare_core_testimonials_list             = {};
	qodefCore.shortcodes.pharmacare_core_testimonials_list.qodefSwiper = qodef.qodefSwiper;

})( jQuery );

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
