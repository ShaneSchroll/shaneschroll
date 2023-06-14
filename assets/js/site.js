(function($) {
    $(window).on('load', function() {

        // initialize aos + defaults
        AOS.init({
            offset: 150,
            duration: 1200
        });

        // mobile menu toggle and xbar animation
        $('#menu-toggle').click(function() {
			$('.x-bar').toggleClass('x-bar-active');
			$('.site-nav--main-menu').toggleClass('primary-menu-active');
		});
	}); // end window.load
})(jQuery);