(function($) {
    $(window).on('load', function() {

        // initialize aos animations
        AOS.init({
            offset: 150,
            duration: 1200
        });

        // notice banner functions and cookies
        $(function noticeBanner() {
            // hide banner if cookie is set
            if(window.localStorage.getItem('close_banner_cookie')) {
                $('.notice-banner').hide();
            }

            // close banner and set cookie
            $('#close-notice').on('click', function() {
                window.localStorage.setItem('close_banner_cookie', true, (60*24*7));
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