/**
 * Regular functions and definitions
 */
( function() {
    if ( typeof svg4everybody === 'function' ) {
        svg4everybody();
    }
    if ( typeof particlesJS === 'function' ) {
        particlesJS( 'sbanner-particles', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": { "enable": true, "value_area": 800 }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": { "width": 0, "color": "#000000" },
                    "polygon": { "nb_sides": 5 },
                    "image": { "src": "img/github.svg", "width": 100, "height": 100 }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": { "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": { "enable": false, "speed": 40, "size_min": 0.1, "sync": false }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "attract": { "enable": false, "rotateX": 600, "rotateY": 1200 }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "repulse" },
                    "onclick": { "enable": true, "mode": "push" },
                    "resize": true
                },
                "modes": {
                    "grab": { "distance": 400, "line_linked": { "opacity": 1 } },
                    "bubble": { "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3 },
                    "repulse": { "distance": 200 },
                    "push": { "particles_nb": 4 },
                    "remove": { "particles_nb": 2 }
                }
            },
            "retina_detect": true,
            "config_demo": {
                "hide_card": false,
                "background_color": "#b61924",
                "background_image": "",
                "background_position": "50% 50%",
                "background_repeat": "no-repeat",
                "background_size": "cover"
            }
        } );
    }
} )();


/**
 * jQuery based functions and definitions
 */
( function( $ ) {
    "use strict";

    /**
     * Utility object
     */
    var FSFlexUtilities = {
        /**
         * Get scrollbar width
         */
        getScrollBarWidth : function() {
            return window.innerWidth - $( window ).width();
        },

        /**
         * Generate an unique id
         */
        getUniqId : function() {
            var guid = function() {
                return Math.floor( ( 1 + Math.random() ) * 0x10000 ).toString( 16 ).substring( 1 );
            };
            return guid() + guid();
        },

        /**
         * Perform toggles.
         */
        performToggle: function( elem, closeOnly )
        {
            var expanded = elem.attr( 'aria-expanded' ),
                controls = $( '#' + elem.attr( 'aria-controls' ) ),
                stopScroll = $( '#' + elem.attr( 'aria-controls' ) ).attr( 'data-stop-body-scroll' ),
                parentActive = $( '#' + elem.attr( 'aria-controls' ) ).attr( 'data-parent-active' );

            if ( 'true' == expanded || closeOnly )
            {
                elem.removeClass( 'active' );
                elem.attr( 'aria-expanded', 'false' );
                controls.removeClass( 'active' );
                controls.attr( 'aria-expanded', 'false' );
                $( 'body' ).removeClass( elem.attr( 'aria-controls' ) + '-active' );
                if ( 'true' == stopScroll )
                {
                    $( 'body' ).css( { 'overflow': '', 'padding-right': '' } );
                }
                if ( parentActive )
                {
                    controls.parent().removeClass( 'active' );
                }
                elem.blur();
                elem.find( 'input, textarea, select' ).blur();
            }
            else
            {
                elem.addClass( 'active' );
                elem.attr( 'aria-expanded', 'true' );
                controls.addClass( 'active' );
                controls.attr( 'aria-expanded', 'true' );
                $( 'body' ).addClass( elem.attr( 'aria-controls' ) + '-active' );
                elem.blur();

                if ( 'true' == stopScroll )
                {
                    $( 'body' ).css( { 'overflow': 'hidden', 'padding-right': getScrollBarWidth() } );
                }
                if ( parentActive )
                {
                    controls.parent().addClass( 'active' );
                }
            }
        },
    };

    /**
     * The main object
     * @type {Object}
     */
    var FSFlex = {

        _initialized : false,
        _lastScrollTop : 0,
        _touchSupport : false,

        init : function() {
            if ( this._initialized ) {
                return;
            }

            this._initialized = true;
            this._lastScrollTop = $( window ).scrollTop();

            if ( 'ontouchstart' in document ) {
                this._touchSupport = true;
            }

            this.toggleClose( this );
            this.clickAnyWhere( this );

            this.carousels( this );
            this.mainNavigation( this );
        },

        /**
         * Handle event when user click on body
         * We do close every toggles if certain contittions are met
         */
        toggleClose: function( o )
        {
            $( '[aria-controls]' ).on( 'click', function( event )
            {
                event.stopPropagation();

                FSFlexUtilities.performToggle( $( '[aria-expanded="true"]' ).not( $( this ) ), true );
                FSFlexUtilities.performToggle( $( this ), false );
            } );
        },

        /**
         * Click handle when user is clicking anywhere on the page
         */
        clickAnyWhere: function( o )
        {
            // Close Toggles
            var processTouch = function( event )
            {
                var target = $( event.target );

                // Close toggles
                $( '[aria-expanded="true"][aria-controls]' ).each( function() {
                    var id = $( this ).attr( 'aria-controls' );

                    if ( target.closest( '#' + id ).length )
                    {
                        return;
                    }
                    else
                    {
                        FSFlexUtilities.performToggle( $( this ), true );
                    }
                } );
            };

            // Touch support
            if ( o._touchSupport )
            {
                $( document ).on( 'touchstart', processTouch );
            }
            else
            {
                $( document ).on( 'click', processTouch );
            }

            $( document ).on( 'keyup', function( event )
            {
                if ( event.keyCode == 27 )
                {
                    $( '[aria-expanded="true"]' ).each( function()
                    {
                        FSFlexUtilities.performToggle( $( this ), true );
                    } );
                }
            } );

            // Nav menu on touch
            $( document ).on( 'click', function( event )
            {
                // Simulate 2nd tap on touch devices for dropdown
                if ( o._touchSupport )
                {
                    var nav_touch = $( '#primary-menu [data-touch="true"]' );

                    if ( nav_touch.length && target.attr( 'id' ) != 'primary-menu' && ! target.closest( '#primary-menu' ).length )
                    {
                        nav_touch.attr( 'data-touch', 'false' );
                        nav_touch.parent().removeClass( 'hover' );
                    }
                }
            } );
        },

        /**
         * Theme carousels
         */
        carousels: function( o ) {

            var Events = {

                owlInitialized : function( e ) {
                    window.setTimeout( function() {
                        $( e.target.querySelectorAll( '.owl-item.active' ) ).addClass( 'activated' );
                    }, 100 );
                },

                onTranslateStart : function( e ) {
                    var elements = e.target.querySelectorAll( '.owl-item' );
                    var activeElem = e.target.querySelectorAll( '.owl-item.activated' );

                    $( elements ).removeClass( 'activating' ).removeClass( 'activated' );
                    $( elements[e.item.index] ).addClass( 'activating' );
                },

                onTranslateEnd : function( e ) {
                    var elements = e.target.querySelectorAll( '.owl-item' );
                    $( elements[e.item.index] ).removeClass( 'activating' ).addClass( 'activated' );
                }
            };

            $( '.carousel[data-theme-carousel="true"]' ).each( function() {
                var _this = $( this );
                var options = _this.data( 'options' );
                var settings = $.extend(
                    {
                        nav: true,
                        navText: ['←','→'],
                        dots: false,
                        margin: 30,
                        smartSpeed: 600,
                        autoHeight: true,

                    },
                    options
                );

                console.log(settings);

                _this.on( 'initialized.owl.carousel', Events.owlInitialized );

                _this.owlCarousel( settings );
                _this.removeAttr( 'data-options' );
                _this.removeAttr( 'data-theme-carousel' );

                _this.on( 'translate.owl.carousel', Events.onTranslateStart );
                _this.on( 'translated.owl.carousel', Events.onTranslateEnd );
            } );
        },

        /**
         * Main navigation scripts. Including:
         * - Mobile Nav
         * - Touch screen support
         * - Side Navigation Events
         */
        mainNavigation: function( o )
        {
            $( '[data-close-controls="smenu-block"]' ).on( 'click', function() {
                $( '[aria-controls="smenu-block"]' ).trigger( 'click' );
                return false;
            });

            
            // Add data attribute for touch support
            $( ' #smenu a' ).each( function() {
                $( this ).attr( 'data-touch', 'false' );
            } );

            // Touch event support
            $( '#smenu a' ).on( 'click', function( event ) {
                //if ( o._touchSupport ) {
                    event.stopPropagation();

                    if ( 'false' == $( this ).attr( 'data-touch' ) && $( this ).next( 'ul' ).length ) {
                        event.preventDefault();
                        var otherParents = $( this ).parent().siblings();

                        otherParents.removeClass( 'hover' );
                        otherParents.find( 'a' ).attr( 'data-touch', 'false' );
                        otherParents.find( '.hover' ).removeClass( 'hover' );
                        $( this ).parent().addClass( 'hover' );
                        $( this ).attr( 'data-touch', 'true' );
                    }
                    else {
                        $( this ).parent().removeClass( 'hover' );
                        $( this ).attr( 'data-touch', 'false' );
                    }
                //}
            } );

            // Prevent submenu get out of window boundary
            $( '#smenu li' ).each( function() {
                var submenu = $( this ).children( 'ul' );
                var submenuParent = null;

                if ( ! submenu.length || submenu.hasClass( 'oposite' ) || submenu.offset().left + submenu.innerWidth() < window.innerWidth ) {
                    return true;
                } 

                // We'll get the deepest sub menu
                while ( submenu.length ) {
                    if ( ! submenu.hasClass( 'oposite' ) ) {
                        if ( submenu.offset().left + submenu.innerWidth() > window.innerWidth ) {
                            submenu.addClass( 'oposite' );
                        }
                    }
                    submenu = submenu.find( '> li > ul' );
                }
            } );


            $( '#smenu' ).on( 'mouseenter', 'li', function( event ) {
                var submenu = $( this ).children( 'ul' );

                if ( submenu.length > 0 && ! submenu.hasClass( 'oposite' ) ) {
                    if ( submenu.offset().left + submenu.innerWidth() > window.innerWidth ) {
                        submenu.addClass( 'oposite' );
                    }
                }
            } );

            if ( $( 'a#backtotoplink' ).length ) {

                $( 'a#backtotoplink' ).on( 'click', function( event ) {
                    event.stopPropagation();
                    $( 'html, body' ).stop().animate( { scrollTop: 0 }, 1500, 'swing' );
                } );

                $( window ).on( 'scroll', function() {
                    if ( $( window ).scrollTop() > 480 ) {
                        $( 'a#backtotoplink' ).addClass( 'active' );
                    }
                    else {
                        $( 'a#backtotoplink' ).removeClass( 'active' );
                    }
                } );
            }
        }
    };

    $( document ).ready( function( e ) {
        FSFlex.init();
    } );
} )( jQuery );