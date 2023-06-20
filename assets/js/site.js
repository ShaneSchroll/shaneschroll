(function($) {
    $(window).on('load', function() {

        // initialize aos + defaults
        AOS.init({
            offset: 150,
            duration: 1200
        }); // end AOS

        // mobile menu toggle and xbar animation
        $('#menu-toggle').click(function() {
			$('.x-bar').toggleClass('x-bar-active');
			$('.site-nav--main-menu').toggleClass('primary-menu-active');
		}); // end menu-toggle

        // smooth scroll to anchors instead of jumping to content
        $(function smoothScroll() {
            $('a[href*="#"]')
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
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
        }); // end smoothScroll

	}); // end window.load
})(jQuery);