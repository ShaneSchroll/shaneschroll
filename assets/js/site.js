(function ($) {
    $(function() {
        /**
          * Mobile menu toggle
        */
        let menu_logo = $('.mobile-menu-logo');
        let menu_link = $('.mobile-link-wrapper');
        let menu_close = $('.close-button');

        $('#mobile-menu-toggle').on('click', function() {
            $('.mobile-nav-container__menu').addClass('mobile-menu-open');
            $('body').addClass('mobile-menu-active');

            // wait for menu to show before animating links in
            setTimeout( function() {
                menu_logo.addClass('mobile-menu-link-up');
                menu_link.addClass('mobile-menu-link-up');
                menu_close.addClass('mobile-menu-link-up');
            }, 250);
        });

        $('#close-menu-button').on('click', function() {
            $('body').removeClass('mobile-menu-active');
            menu_logo.removeClass('mobile-menu-link-up');
            menu_link.removeClass('mobile-menu-link-up');
            menu_close.removeClass('mobile-menu-link-up');

            // fade links out before closing menu
            setTimeout( function() {
                $('.mobile-nav-container__menu').removeClass('mobile-menu-open');
            }, 350);
        });

        /**
          * AOS Library Init and Config
        */
        AOS.init({
            offset: 40,
            duration: 500,
            once: true,
            mirror: false
        });
    });
})(jQuery);
