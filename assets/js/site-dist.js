var e;(e=jQuery)(document).ready((function(){e("#menu-toggle").on("click",(function(){e(".x-bar").toggleClass("x-bar-active")}));var a=location.pathname.split("/"),t=window.location.href;""!==a[1]&&(e('.top-level-item[href^="/'+a[1]+'"]').addClass("active"),e('.grid-item--link[href^="/'+a[1]+'"]').addClass("active")),t.indexOf("mockup")>-1&&"mockups"!==a[1]&&e('.sub-level-item[href^="http://portfolio-site.local/mockup/'+a[2]+'"]').addClass("sub-active")}));
//# sourceMappingURL=site-dist.js.map