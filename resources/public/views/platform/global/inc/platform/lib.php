    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    <script type='text/javascript'>
        /* <![CDATA[ */
        var yith_wcwl_l10n = {
            "ajax_url": "\/electro\/v2\/wp-admin\/admin-ajax.php",
            "redirect_to_cart": "no",
            "multi_wishlist": "",
            "hide_add_button": "1",
            "enable_ajax_loading": "",
            "ajax_loader_url": "https:\/\/demo3.madrasthemes.com\/electro\/v2\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader-alt.svg",
            "remove_from_wishlist_after_add_to_cart": "1",
            "labels": {
                "cookie_disabled": "We are sorry, but this feature is available only if cookies on your browser are enabled.",
                "added_to_cart_message": "<div class=\"woocommerce-notices-wrapper\"><div class=\"woocommerce-message\" role=\"alert\">Product added to cart successfully<\/div><\/div>"
            },
            "actions": {
                "add_to_wishlist_action": "add_to_wishlist",
                "remove_from_wishlist_action": "remove_from_wishlist",
                "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem",
                "load_mobile_action": "load_mobile",
                "delete_item_action": "delete_item",
                "save_title_action": "save_title",
                "save_privacy_action": "save_privacy",
                "load_fragments": "load_fragments"
            }
        }; /* ]]> */
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/electro\/v2\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/electro\/v2\/?wc-ajax=%%endpoint%%"
        }; /* ]]> */
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/electro\/v2\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/electro\/v2\/?wc-ajax=%%endpoint%%",
            "cart_hash_key": "wc_cart_hash_2322b5abce89cda9c7877047424fca5d",
            "fragment_name": "wc_fragments_2322b5abce89cda9c7877047424fca5d",
            "request_timeout": "5000"
        }; /* ]]> */
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var yith_woocompare = {
            "ajaxurl": "\/electro\/v2\/?wc-ajax=%%endpoint%%",
            "actionadd": "yith-woocompare-add-product",
            "actionremove": "yith-woocompare-remove-product",
            "actionview": "yith-woocompare-view-table",
            "actionreload": "yith-woocompare-reload-product",
            "added_label": "Added",
            "table_title": "Product Comparison",
            "auto_open": "yes",
            "loader": "https:\/\/demo3.madrasthemes.com\/electro\/v2\/wp-content\/plugins\/yith-woocommerce-compare\/assets\/images\/loader.gif",
            "button_text": "Compare",
            "cookie_name": "yith_woocompare_list",
            "close_label": "Close"
        }; /* ]]> */
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var electro_options = {
            "rtl": "0",
            "ajax_url": "https:\/\/demo3.madrasthemes.com\/electro\/v2\/wp-admin\/admin-ajax.php",
            "ajax_loader_url": "https:\/\/demo3.madrasthemes.com\/electro\/v2\/wp-content\/themes\/electro\/assets\/images\/ajax-loader.gif",
            "enable_sticky_header": "",
            "enable_hh_sticky_header": "",
            "enable_live_search": "",
            "live_search_limit": "10",
            "live_search_template": "<a href=\"{{url}}\" class=\"media live-search-media\"><img src=\"{{image}}\" class=\"media-left media-object flip pull-left\" height=\"60\" width=\"60\"><div class=\"media-body\"><p>{{{value}}}<\/p><\/div><\/a>",
            "live_search_empty_msg": "Unable to find any products that match the current query",
            "deal_countdown_text": {
                "days_text": "Days",
                "hours_text": "Hours",
                "mins_text": "Mins",
                "secs_text": "Secs"
            },
            "typeahead_options": {
                "hint": false,
                "highlight": true
            },
            "offcanvas_mcs_options": {
                "axis": "y",
                "theme": "minimal-dark",
                "contentTouchScroll": 100,
                "scrollInertia": 1500
            },
            "compare_page_url": "https:\/\/demo3.madrasthemes.com\/electro\/v2\/compare\/"
        }; /* ]]> */
    </script>
    <script>
        window.lazyLoadOptions = {
            elements_selector: "img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",
            data_src: "lazy-src",
            data_srcset: "lazy-srcset",
            data_sizes: "lazy-sizes",
            class_loading: "lazyloading",
            class_loaded: "lazyloaded",
            threshold: 300,
            callback_loaded: function (element) {
                if (element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") {
                    if (element.classList.contains("lazyloaded")) {
                        if (typeof window.jQuery != "undefined") {
                            if (jQuery.fn.fitVids) {
                                jQuery(element).parent().fitVids()
                            }
                        }
                    }
                }
            }
        };
        window.addEventListener('LazyLoad::Initialized', function (e) {
            var lazyLoadInstance = e.detail.instance;
            if (window.MutationObserver) {
                var observer = new MutationObserver(function (mutations) {
                    var image_count = 0;
                    var iframe_count = 0;
                    var rocketlazy_count = 0;
                    mutations.forEach(function (mutation) {
                        for (i = 0; i < mutation.addedNodes.length; i++) {
                            if (typeof mutation.addedNodes[i].getElementsByTagName !==
                                'function') {
                                return
                            }
                            if (typeof mutation.addedNodes[i].getElementsByClassName !==
                                'function') {
                                return
                            }
                            images = mutation.addedNodes[i].getElementsByTagName('img');
                            is_image = mutation.addedNodes[i].tagName == "IMG";
                            iframes = mutation.addedNodes[i].getElementsByTagName('iframe');
                            is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                            rocket_lazy = mutation.addedNodes[i].getElementsByClassName(
                                'rocket-lazyload');
                            image_count += images.length;
                            iframe_count += iframes.length;
                            rocketlazy_count += rocket_lazy.length;
                            if (is_image) {
                                image_count += 1
                            }
                            if (is_iframe) {
                                iframe_count += 1
                            }
                        }
                    });
                    if (image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) {
                        lazyLoadInstance.update()
                    }
                });
                var b = document.getElementsByTagName("body")[0];
                var config = {
                    childList: !0,
                    subtree: !0
                };
                observer.observe(b, config)
            }
        }, !1)
    </script>
    <script data-no-minify="1" async
        src="https://demo3.madrasthemes.com/electro/v2/wp-content/plugins/wp-rocket/assets/js/lazyload/12.0/lazyload.min.js">
    </script>
    <script src="https://demo3.madrasthemes.com/electro/v2/wp-content/cache/min/1/d8f3ac270a3b419710b3a05f6a6098b9.js"
        data-minify="1" defer></script>
    <noscript>
        <link rel="stylesheet"
            href="https://demo3.madrasthemes.com/electro/v2/wp-content/cache/min/1/08c681f1293494b1109d671d0ebb1cac.css"
            data-minify="1" />
    </noscript>
    <noscript>
        <link rel='stylesheet' id='electro-fonts-css'
            href='//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C600%2C700%2C800%2C800italic%2C700italic%2C600italic%2C400italic%2C300italic&#038;subset=latin%2Clatin-ext&#038;display=swap'
            type='text/css' media='all' />
    </noscript>