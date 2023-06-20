(function($) {
    $(window).on('load', function() {

        // initialize aos + defaults
        AOS.init({
            offset: 150,
            duration: 1200
        }); // end AOS setup

        // mobile menu toggle and xbar animation
        $(function menuFunctions() {
            $('#menu-toggle').click(function() {
                $('.x-bar').toggleClass('x-bar-active');
                $('.site-nav--main-menu').toggleClass('primary-menu-active');
                $('body, html').toggleClass('no-scroll');
                $('#fader, .site-nav--text-logo').toggleClass('fade-lock');
            });
        }); // end menuFunctions()

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