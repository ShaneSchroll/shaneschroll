(function($) {
    $(document).ready(function() {

        $('#menu-toggle').on('click', function() {
            $('.x-bar').toggleClass('x-bar-active');
        });

        // set active link based on URL
        if( location.pathname.split('/')[1] !== '' ) {
            $('.top-level-item[href^="/' + location.pathname.split('/')[1] + '"]').addClass('active');
        }

    }); // end document.ready
})(jQuery);