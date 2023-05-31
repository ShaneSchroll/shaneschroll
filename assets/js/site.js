(function($) {
    $(window).on('load', function() {

        // initialize aos + defaults
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

            // close banner and set cookie (14 days)
            $('#close-notice').on('click', function() {
                var now = (new Date()).getTime();
                var day = 1000*60*60*24;
                var expires = now + (day*14);

                window.localStorage.setItem('close_banner_cookie', true, expires);
                $('.notice-banner').fadeToggle(350);
            });
        });

        // form submit and validation
        $(function submitForm() {
            var contact_form = $('#contact-form');

            contact_form.on('submit', (e) => {
                e.preventDefault();

                // collect form data
                var name = $('#name').val();
                var email = $('#email').val();
                var company = $('#company').val();
                var contact_reason = $('#contact-reason').val();
                var message = $('#message').val();

                // check form data
                if(name == '' || email == '' || contact_reason == '' || message == '') {} else {}
            });

        });
	}); // end window.load
})(jQuery);