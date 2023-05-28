(function($) {
    $(window).on('load', function() {

        // initialize aos + defaults
        // AOS.init({
        //     offset: 150,
        //     duration: 1200
        // });

        // notice banner functions and cookies
        $(function noticeBanner() {
            // hide banner if cookie is set
            if(window.localStorage.getItem('close_banner_cookie')) {
                $('.notice-banner').hide();
            }

            // close banner and set cookie (14 days)
            $('#close-notice').on('click', function() {
                var now = (new Date()).getTime();
                var day = 1000*60*60*24;
                var expires = now + (day*14);
                window.localStorage.setItem('close_banner_cookie', true, expires);
                $('.notice-banner').fadeToggle(350);
            });
        });

        // setup our features swiper
        // const swiper = new Swiper('.swiper', {
        //     direction: 'horizontal',
        //     loop: true, // same as 'autoplay: infinite'
        //     speed: 3500,

        //     // pagination: {
        //     //     el: '.swiper-pagination',
        //     // },

        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },

        //     // scrollbar: {
        //     //     el: '.swiper-scrollbar',
        //     // },
        // });

	}); // end window.load
})(jQuery);