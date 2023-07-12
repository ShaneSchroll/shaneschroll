(function($) {
    $(window).on('load', function() {

        // mobile menu toggle and xbar animation
        $(function menuFunctions() {
            $('#menu-toggle').on('click', function() {
                $(this).toggleClass('toggle-active');
                $('.x-bar').toggleClass('x-bar-active');
                $('.site-nav--main-menu').toggleClass('primary-menu-active');
                $('body, html').toggleClass('no-scroll');
                $('#fader, .site-nav--text-logo').toggleClass('fade-lock');

                if( $('#fader').hasClass('fade-lock') ) {
                    $('#fader').attr('aria-disabled', 'true');
                } else {
                    $('#fader').attr('aria-disabled', 'false');
                }
            });

            // redundant but needed since the menu toggle is inside the nav itself (causes desktop issues)
            $('.site-nav--main-menu li a, .mobile-contact-button').on('click', function() {
                if( $('#menu-toggle').hasClass('toggle-active') ) {
                    $('#menu-toggle').toggleClass('toggle-active');
                    $('.x-bar').toggleClass('x-bar-active');
                    $('.site-nav--main-menu').toggleClass('primary-menu-active');
                    $('body, html').toggleClass('no-scroll');
                    $('#fader, .site-nav--text-logo').toggleClass('fade-lock');

                    if( $('#fader').hasClass('fade-lock') ) {
                        $('#fader').attr('aria-disabled', 'true');
                    } else {
                        $('#fader').attr('aria-disabled', 'false');
                    }
                }
            });
        }); // end menuFunctions()

        if( window.location.href.indexOf('services') > -1 ) {
            $('#service-option-tabs').tabs(); // initialize tabs
        }

        // smooth scroll to anchors instead of jumping to content
        $(function smoothScroll() {
            $('a[href*="#"]')
            .not('[href="#"]')
            .not('[href="#0"]')
            .on('click', function(event) {
                if(
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && 
                location.hostname == this.hostname
                ) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                    if(target.length) {
                        event.preventDefault();

                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000 );
                    }
                }
            });
        }); // end smoothScroll()

	}); // end window.load
})(jQuery);