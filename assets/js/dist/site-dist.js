var a;(a=jQuery)(document).ready((function(){var t=location.pathname.split("/"),o=window.location.href;if(""!==t[1]&&(a('.top-level-item[href^="/'+t[1]+'"]').addClass("active"),a('.grid-item--link[href^="/'+t[1]+'"]').addClass("active")),o.indexOf("mockup")>-1&&"mockups"!==t[1]&&a('.sub-level-item[href^="http://portfolio-site.local/mockup/'+t[2]+'"]').addClass("sub-active"),o.indexOf("help-docs")>-1){let t=a("#tab-1"),o=a("#tab-2"),e=a("#tab-3"),b=a("#tab-4"),c=a("#tab-5");a("#tab-1 .icon-box").addClass("tab-active"),a("#doc-tab-1").show(),a("#doc-tab-2").hide(),a("#doc-tab-3").hide(),a("#doc-tab-4").hide(),a("#doc-tab-5").hide(),t.on("click",(function(){a("#tab-1 .icon-box").addClass("tab-active"),a("#tab-2 .icon-box").removeClass("tab-active"),a("#tab-3 .icon-box").removeClass("tab-active"),a("#tab-4 .icon-box").removeClass("tab-active"),a("#tab-5 .icon-box").removeClass("tab-active"),a("#doc-tab-1").slideToggle(450),a("#doc-tab-2").slideUp(450),a("#doc-tab-3").slideUp(450),a("#doc-tab-4").slideUp(450),a("#doc-tab-5").slideUp(450)})),o.on("click",(function(){a("#tab-1 .icon-box").removeClass("tab-active"),a("#tab-2 .icon-box").addClass("tab-active"),a("#tab-3 .icon-box").removeClass("tab-active"),a("#tab-4 .icon-box").removeClass("tab-active"),a("#tab-5 .icon-box").removeClass("tab-active"),a("#doc-tab-1").slideUp(450),a("#doc-tab-2").slideToggle(450),a("#doc-tab-3").slideUp(450),a("#doc-tab-4").slideUp(450),a("#doc-tab-5").slideUp(450)})),e.on("click",(function(){a("#tab-1 .icon-box").removeClass("tab-active"),a("#tab-2 .icon-box").removeClass("tab-active"),a("#tab-3 .icon-box").addClass("tab-active"),a("#tab-4 .icon-box").removeClass("tab-active"),a("#tab-5 .icon-box").removeClass("tab-active"),a("#doc-tab-1").slideUp(450),a("#doc-tab-2").slideUp(450),a("#doc-tab-3").slideToggle(450),a("#doc-tab-4").slideUp(450),a("#doc-tab-5").slideUp(450)})),b.on("click",(function(){a("#tab-1 .icon-box").removeClass("tab-active"),a("#tab-2 .icon-box").removeClass("tab-active"),a("#tab-3 .icon-box").removeClass("tab-active"),a("#tab-4 .icon-box").addClass("tab-active"),a("#tab-5 .icon-box").removeClass("tab-active"),a("#doc-tab-1").slideUp(450),a("#doc-tab-2").slideUp(450),a("#doc-tab-3").slideUp(450),a("#doc-tab-4").slideToggle(450),a("#doc-tab-5").slideUp(450)})),c.on("click",(function(){a("#tab-1 .icon-box").removeClass("tab-active"),a("#tab-2 .icon-box").removeClass("tab-active"),a("#tab-3 .icon-box").removeClass("tab-active"),a("#tab-4 .icon-box").removeClass("tab-active"),a("#tab-5 .icon-box").addClass("tab-active"),a("#doc-tab-1").slideUp(450),a("#doc-tab-2").slideUp(450),a("#doc-tab-3").slideUp(450),a("#doc-tab-4").slideUp(450),a("#doc-tab-5").slideToggle(450)}))}}));
//# sourceMappingURL=site-dist.js.map