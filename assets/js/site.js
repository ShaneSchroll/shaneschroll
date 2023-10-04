(function($) {
    $(document).ready(function() {

        $('#menu-toggle').on('click', function() {
            $('.x-bar').toggleClass('x-bar-active');
        });

        // set active link based on URL
        if( location.pathname.split('/')[1] !== '' ) {
            $('.top-level-item[href^="/' + location.pathname.split('/')[1] + '"]').addClass('active');
        }

        // set active link based on URL for sub menu items and keep top level active
        var get_url = window.location.href;

        if( get_url.indexOf('mockup') > -1 ) {
            $('.sub-level-item[href^="http://portfolio-site.local/mockup/' + location.pathname.split('/')[2] + '"]').addClass('sub-active');
        }

    }); // end document.ready
})(jQuery);