(function($) {
    $(document).ready(function() {

        var path = location.pathname.split('/');
        var get_url = window.location.href;

        // set active link based on URL
        if ( path[1] !== '' ) {
            $('.top-level-item[href^="/' + path[1] + '"]').addClass('active');
            $('.grid-item--link[href^="/' + path[1] + '"]').addClass('active');
        }

        // set active link based on URL for mockup sub menu items
        if ( get_url.indexOf('mockup') > -1 && path[1] !== 'mockups' ) {
            $('.sub-level-item[href^="http://portfolio-site.local/mockup/' + path[2] + '"]').addClass('sub-active'); // local dev
            // $('.sub-level-item[href^="https://shaneschroll.dev/mockup/' + path[2] + '"]').addClass('sub-active'); // production
        }

        // UI Tabs for documentation
        if ( get_url.indexOf('help-docs') > -1 ) {
            $('#project-tabs').tabs();
        }

    }); // end document.ready
})(jQuery);