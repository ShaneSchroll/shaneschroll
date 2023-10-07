(function($) {
    $(document).ready(function() {

        $('#menu-toggle').on('click', function() {
            $('.x-bar').toggleClass('x-bar-active');
        });

        var path = location.pathname.split('/');
        var get_url = window.location.href;

        // set active link based on URL
        if( path[1] !== '' ) {
            $('.top-level-item[href^="/' + path[1] + '"]').addClass('active');
        }

        // set active link based on URL for sub menu items
        if( get_url.indexOf('mockup') > -1 && path[1] !== 'mockups' ) {
            $('.sub-level-item[href^="http://portfolio-site.local/mockup/' + path[2] + '"]').addClass('sub-active'); // local dev
            // $('.sub-level-item[href^="https://shaneschroll.dev/mockup/' + path[2] + '"]').addClass('sub-active'); // production
        }

    }); // end document.ready
})(jQuery);