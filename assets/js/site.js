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

            /* mega ugly */

            // cache selectors
            let $tab_1 = $('#tab-1');
            let $tab_2 = $('#tab-2');
            let $tab_3 = $('#tab-3');
            let $tab_4 = $('#tab-4');
            let $tab_5 = $('#tab-5');

            // initial state
            $('#tab-1 .icon-box').addClass('tab-active');
            $('#doc-tab-1').show();

            $('#doc-tab-2').hide();
            $('#doc-tab-3').hide();
            $('#doc-tab-4').hide();
            $('#doc-tab-5').hide();

            // tab and content click events
            $tab_1.on('click', function() {
                $('#tab-1 .icon-box').addClass('tab-active');
                $('#tab-2 .icon-box').removeClass('tab-active');
                $('#tab-3 .icon-box').removeClass('tab-active');
                $('#tab-4 .icon-box').removeClass('tab-active');
                $('#tab-5 .icon-box').removeClass('tab-active');

                $('#doc-tab-1').slideToggle(450);
                $('#doc-tab-2').slideUp(450);
                $('#doc-tab-3').slideUp(450);
                $('#doc-tab-4').slideUp(450);
                $('#doc-tab-5').slideUp(450);
            });

            $tab_2.on('click', function() {
                $('#tab-1 .icon-box').removeClass('tab-active');
                $('#tab-2 .icon-box').addClass('tab-active');
                $('#tab-3 .icon-box').removeClass('tab-active');
                $('#tab-4 .icon-box').removeClass('tab-active');
                $('#tab-5 .icon-box').removeClass('tab-active');

                $('#doc-tab-1').slideUp(450);
                $('#doc-tab-2').slideToggle(450);
                $('#doc-tab-3').slideUp(450);
                $('#doc-tab-4').slideUp(450);
                $('#doc-tab-5').slideUp(450);
            });

            $tab_3.on('click', function() {
                $('#tab-1 .icon-box').removeClass('tab-active');
                $('#tab-2 .icon-box').removeClass('tab-active');
                $('#tab-3 .icon-box').addClass('tab-active');
                $('#tab-4 .icon-box').removeClass('tab-active');
                $('#tab-5 .icon-box').removeClass('tab-active');

                $('#doc-tab-1').slideUp(450);
                $('#doc-tab-2').slideUp(450);
                $('#doc-tab-3').slideToggle(450);
                $('#doc-tab-4').slideUp(450);
                $('#doc-tab-5').slideUp(450);
            });

            $tab_4.on('click', function() {
                $('#tab-1 .icon-box').removeClass('tab-active');
                $('#tab-2 .icon-box').removeClass('tab-active');
                $('#tab-3 .icon-box').removeClass('tab-active');
                $('#tab-4 .icon-box').addClass('tab-active');
                $('#tab-5 .icon-box').removeClass('tab-active');

                $('#doc-tab-1').slideUp(450);
                $('#doc-tab-2').slideUp(450);
                $('#doc-tab-3').slideUp(450);
                $('#doc-tab-4').slideToggle(450);
                $('#doc-tab-5').slideUp(450);
            });

            $tab_5.on('click', function() {
                $('#tab-1 .icon-box').removeClass('tab-active');
                $('#tab-2 .icon-box').removeClass('tab-active');
                $('#tab-3 .icon-box').removeClass('tab-active');
                $('#tab-4 .icon-box').removeClass('tab-active');
                $('#tab-5 .icon-box').addClass('tab-active');

                $('#doc-tab-1').slideUp(450);
                $('#doc-tab-2').slideUp(450);
                $('#doc-tab-3').slideUp(450);
                $('#doc-tab-4').slideUp(450);
                $('#doc-tab-5').slideToggle(450);
            });
        }

    }); // end document.ready
})(jQuery);