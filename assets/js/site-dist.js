var t;(t=jQuery)(window).on("load",(function(){AOS.init({offset:150,duration:1200}),t((function(){t("#menu-toggle, .mobile-contact-button").on("click",(function(){t(this).addClass("toggle-active"),t(".x-bar").toggleClass("x-bar-active"),t(".site-nav--main-menu").toggleClass("primary-menu-active"),t("body, html").toggleClass("no-scroll"),t("#fader, .site-nav--text-logo").toggleClass("fade-lock")})),t(".site-nav--main-menu li a").on("click",(function(){t(".site-nav--main-menu").removeClass("toggle-active"),t(".x-bar").toggleClass("x-bar-active"),t(".site-nav--main-menu").toggleClass("primary-menu-active"),t("body, html").toggleClass("no-scroll"),t("#fader, .site-nav--text-logo").toggleClass("fade-lock")}))})),t((function(){t('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on("click",(function(e){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var a=t(this.hash);(a=a.length?a:t("[name="+this.hash.slice(1)+"]")).length&&(e.preventDefault(),t("html, body").animate({scrollTop:a.offset().top},1e3))}}))}))}));
//# sourceMappingURL=site-dist.js.map