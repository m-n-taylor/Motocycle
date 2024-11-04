jQuery.noConflict()(function ($) {

    "use strict";


    // accordion functions
    var accordion = $("#stepForm").accordion();
    var current = 0;

    $.validator.addMethod("pageRequired", function (value, element) {
        var $element = $(element)

        function match(index) {
            return current == index && $(element).parents("#sf" + (index + 1)).length;
        }
        if (match(0) || match(1) || match(2)) {
            return !this.optional(element);
        }
        return "dependency-mismatch";
    }, $.validator.messages.required)

    var v = $("#tmreviews_add_blog_post").validate({
        errorClass: "warning",
        onkeyup: false,
        onfocusout: false,

    });

    // back buttons do not need to run validation
    $("#sf2 .prevbutton").click(function () {
        accordion.accordion("option", "active", 0);
        current = 0;
    });
    $("#sf3 .prevbutton").click(function () {
        accordion.accordion("option", "active", 1);
        current = 1;
    });
    $("#sf4 .prevbutton").click(function () {
        accordion.accordion("option", "active", 1);
        current = 2;
    });

    $("#sf5 .prevbutton").click(function () {
        accordion.accordion("option", "active", 1);
        current = 3;
    });





    // these buttons all run the validation, overridden by specific targets above


    $(".open4").click(function () {
        if (v.form()) {
            accordion.accordion("option", "active", 4);
            current = 4;
        }
    });

    $(".open3").click(function () {
        if (v.form()) {
            accordion.accordion("option", "active", 3);
            current = 3;
        }
    });


    $(".open2").click(function () {
        if (v.form()) {
            accordion.accordion("option", "active", 2);
            current = 2;
        }
    });
    $(".open1").click(function () {
        if (v.form()) {
            accordion.accordion("option", "active", 1);
            current = 1;
        }
    });
    $(".open0").click(function () {
        if (v.form()) {
            accordion.accordion("option", "active", 0);
            current = 0;
        }
    });






    var $window = window,
        offset = '90%',
        $doc = $(document),
        self = this,
        $body = $('body'),
        TweenMax = window.TweenMax,
        fl_theme = window.fl_theme || {};
    fl_theme.window = $(window);
    fl_theme.document = $(document);
    window.fl_theme = fl_theme;
    fl_theme.window = $(window);


    // Stiky Sidebar
    fl_theme.initStikySidebar = function () {
        var sidebar_stiky = $('.sidebar-sticky');
        if (sidebar_stiky.length) {
            sidebar_stiky.theiaStickySidebar({
                additionalMarginTop: 30,
                additionalMarginBottom: 30
            });
        }
    };

    // Resize iframe video
    fl_theme.initResponsiveIframe = function () {
        var resizeitem = $('iframe');
        resizeitem.height(
            resizeitem.attr("height") / resizeitem.attr("width") * resizeitem.width()
        );
    };

    //Image Popups
    fl_theme.initImagePopup = function () {
        $('.fl-gallery-image-popup').magnificPopup({
            delegate: 'a',
            type: 'image',
            removalDelay: 500,
            image: {
                markup: '<div class="mfp-figure">' +
                    '<div class="mfp-img"></div>' +
                    '<div class="mfp-bottom-bar">' +
                    '<div class="mfp-title"></div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mfp-close"></div>' +
                    '<div class="mfp-counter"></div>'
            },
            callbacks: {
                beforeOpen: function () {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'fl-zoom-in-popup-animation';
                }
            },
            closeOnContentClick: true,
            midClick: true,
            gallery: {
                enabled: true,
                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%">' +
                    '<svg viewBox="0 0 40 40">' +
                    '<path d="M10,20 L30,20 M22,12 L30,20 L22,28"></path>' +
                    '</svg>' +
                    '</button>', // markup of an arrow button

                tPrev: 'Previous', // title for left button
                tNext: 'Next', // title for right button

                tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
            }
        });
    };
    // Gallery Popups
    fl_theme.initGalleryPopup = function () {
        $('.fl-magic-popup').each(function () {
            var popup_gallery_custom_class = $(this).attr('data-custom-class'),
                gallery_enable = true,
                popup_type = 'image';
            if ($(this).hasClass('fl-single-popup')) {
                gallery_enable = false;
                popup_gallery_custom_class = 'fl-single-popup';
            } else if ($(this).hasClass('fl-video-popup')) {
                popup_type = 'iframe';
                gallery_enable = false;
                popup_gallery_custom_class = 'fl-video-popup';
            }

            $("." + popup_gallery_custom_class).magnificPopup({
                delegate: 'a',
                type: popup_type,
                gallery: {
                    enabled: gallery_enable,
                    tPrev: 'Previous',
                    tNext: 'Next',
                    tCounter: '<span class="mfp-counter">%curr% / %total%</span>' // markup of counter
                },
                image: {
                    markup: '<div class="mfp-figure">' +
                        '<div class="mfp-img"></div>' +
                        '</div>' +
                        '<div class="mfp-close"></div>' +
                        '<div class="mfp-bottom-bar">' +
                        '<div class="mfp-title"></div>' +
                        '<div class="mfp-counter"></div>' +
                        '</div>'
                },
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                        '</div>' +
                        '<div class="mfp-close"></div>'
                },
                mainClass: 'mfp-zoom-in',
                removalDelay: 300,
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.next = function () {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function () {
                                $.magnificPopup.proto.next.call(self);
                            }, 120);
                        };
                        $.magnificPopup.instance.prev = function () {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function () {
                                $.magnificPopup.proto.prev.call(self);
                            }, 120);
                        }
                    },
                    imageLoadComplete: function () {
                        var self = this;
                        setTimeout(function () {
                            self.wrap.addClass('mfp-image-loaded');
                        }, 16);
                    }
                }
            });

        });
    };
    // Var
    fl_theme.initCustomSelect = function () {
        var jelect = $('.jelect');
        if (jelect.length) {
            jelect.jelect();
        }
    };

    // Fixed Nav Bar
    fl_theme.initNavBarFixed = function () {

        var c, currentScrollTop = 0;
        var body = $('body'),
            nav_bar = $('.fl--header'),
            nav_bar_height = nav_bar.height();

        if (nav_bar.hasClass("fixed-navbar")) {
            body.find('.header-padding').css("padding-top", nav_bar_height + "px");

            $(window).scroll(function () {
                var a = $(window).scrollTop();
                var b = nav_bar.height();
                var d = nav_bar.find('.fl-top-header-content').height();
                currentScrollTop = a;
                if (nav_bar.hasClass("auto-hide-navbar")) {
                    if (c < currentScrollTop && a > b + 500) {
                        nav_bar.addClass("scrollUp");
                    } else if (c > currentScrollTop && !(a <= b)) {
                        nav_bar.removeClass("scrollUp");
                    }
                }

                if (c < currentScrollTop && a > b) {
                    nav_bar.addClass("fixed-enable");
                } else if (c > currentScrollTop && a < d) {
                    nav_bar.removeClass("fixed-enable");
                }


                c = currentScrollTop;

            });
        }
    };

    // Car Google Maps
    fl_theme.initCarGoogleMaps = function () {
        var car_maps = $('#contact-map'),
            lat = car_maps.attr('data-location-lat'),
            long = car_maps.attr('data-location-long');

        if (car_maps.length) {
            car_maps.gmap3({
                marker: {
                    options: {
                        position: [lat, long],
                        //icon: "'.$image_done[0].'"
                    }
                },
                map: {
                    options: {
                        center: [lat, long],
                        zoom: 11,
                        scrollwheel: false,
                        draggable: true,
                        mapTypeControl: true,
                        styles: [{
                            "featureType": "administrative",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "on"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 20
                            }]
                        }, {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "on"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 40
                            }]
                        }, {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "on"
                            }, {
                                "saturation": -10
                            }, {
                                "lightness": 30
                            }]
                        }, {
                            "featureType": "landscape.man_made",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "simplified"
                            }, {
                                "saturation": -60
                            }, {
                                "lightness": 10
                            }]
                        }, {
                            "featureType": "landscape.natural",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "simplified"
                            }, {
                                "saturation": -60
                            }, {
                                "lightness": 60
                            }]
                        }, {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 60
                            }]
                        }, {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 60
                            }]
                        }]
                    }
                }
            });

        }
    };
    // Change Grid Switch Car Page
    fl_theme.initGridSwitchCar = function () {
        if ($('#pixad-listing').hasClass('grid')) {
            $('.sorting__item.view-by .grid').addClass('active')
        } else {
            $('.sorting__item.view-by .list').addClass('active')
        }
    };





    fl_theme.initCustomWidgetRange = function () {
        /////////////////////////////////////////////////////////////////
        //PRICE RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-price').length > 0) {
            var slider = document.getElementById('slider-price');
            var min_price = document.getElementById('pix-min-price').value;
            var max_price = document.getElementById('pix-max-price').value;
            var max_slider_price = document.getElementById('pix-max-slider-price').value;

            var pix_thousand = document.getElementById('pix-thousand').value;
            var pix_decimal = document.getElementById('pix-decimal').value;
            var pix_decimal_number = document.getElementById('pix-decimal_number').value;

            //var symbol_price = document.getElementById('pix-currency-symbol').value;
            min_price = min_price == '' ? 0 : min_price;
            max_price = max_price == '' ? max_slider_price : max_price;

            noUiSlider.create(slider, {
                start: [min_price, max_price],
                step: 1000,
                connect: true,
                range: {
                    'min': 0,
                    'max': Number(max_slider_price)
                },


                format: wNumb({
                    decimals: pix_decimal_number,
                    mark: pix_decimal,
                    thousand: pix_thousand
                })

            });

            var pValues_price = [
                document.getElementById('slider-price_min'),
                document.getElementById('slider-price_max')
            ];

            slider.noUiSlider.on('update', function (values, handle) {
                pValues_price[handle].value = values[handle];
            });

            slider.noUiSlider.on('change', function (values, handle) {
                $(pValues_price[handle]).trigger('change');
            });

        }

        /////////////////////////////////////////////////////////////////
        //YEAR RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-year').length > 0) {
            var slider_year = document.getElementById('slider-year');
            var min_year = document.getElementById('pix-min-year').value;
            var max_year = document.getElementById('pix-max-year').value;
            var max_slider_year = document.getElementById('pix-max-slider-year').value;
            min_year = min_year == '' ? 1950 : min_year;
            max_year = max_year == '' ? max_slider_year : max_year;

            noUiSlider.create(slider_year, {
                start: [min_year, max_year],
                step: 1,
                connect: true,
                range: {
                    'min': 1950,
                    'max': Number(max_slider_year)
                },

                format: {
                    to: function (value) {
                        return value;
                    },
                    from: function (value) {
                        return value;
                    }
                }

            });

            var pValues_year = [
                document.getElementById('slider-year_min'),
                document.getElementById('slider-year_max')
            ];

            slider_year.noUiSlider.on('update', function (values, handle) {
                pValues_year[handle].value = values[handle];
            });

            slider_year.noUiSlider.on('change', function (values, handle) {
                $(pValues_year[handle]).trigger('change');
            });

        }



        /////////////////////////////////////////////////////////////////
        //   MILEAGE RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-mileage').length > 0) {
            var slider_mileage = document.getElementById('slider-mileage');
            var min_mileage = document.getElementById('pix-min-mileage').value;
            var max_mileage = document.getElementById('pix-max-mileage').value;
            var max_slider_mileage = document.getElementById('pix-max-slider-mileage').value;
            min_mileage = min_mileage == '' ? 0 : min_mileage;
            max_mileage = max_mileage == '' ? max_slider_mileage : max_mileage;

            noUiSlider.create(slider_mileage, {
                start: [min_mileage, max_mileage],
                step: 10000,
                connect: true,
                range: {
                    'min': 0,
                    'max': Number(max_slider_mileage)
                },

                format: {
                    to: function (value) {
                        return value;
                    },
                    from: function (value) {
                        return value;
                    }
                }

            });

            var pValues_mileage = [
                document.getElementById('slider-mileage_min'),
                document.getElementById('slider-mileage_max')
            ];

            slider_mileage.noUiSlider.on('update', function (values, handle) {
                pValues_mileage[handle].value = values[handle];
            });

            slider_mileage.noUiSlider.on('change', function (values, handle) {
                $(pValues_mileage[handle]).trigger('change');
            });

        }

        /////////////////////////////////////////////////////////////////
        //   ENGINE RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-engine').length > 0) {
            var slider_engine = document.getElementById('slider-engine');
            var min_engine = document.getElementById('pix-min-engine').value;
            var max_engine = document.getElementById('pix-max-engine').value;
            var max_slider_engine = document.getElementById('pix-max-slider-engine').value;
            min_engine = min_engine == '' ? 0 : min_engine;
            max_engine = max_engine == '' ? max_slider_engine : max_engine;

            noUiSlider.create(slider_engine, {
                start: [min_engine, max_engine],
                step: 0.1,
                connect: true,
                range: {
                    'min': 0,
                    'max': Number(max_slider_engine)
                },

                // Full number format support.

            });

            var pValues_engine = [
                document.getElementById('slider-engine_min'),
                document.getElementById('slider-engine_max')
            ];

            slider_engine.noUiSlider.on('update', function (values, handle) {
                pValues_engine[handle].value = values[handle];
            });

            slider_engine.noUiSlider.on('change', function (values, handle) {
                $(pValues_engine[handle]).trigger('change');
            });

        }

    };

    fl_theme.initCustomHeidthIframeSlider = function () {
        var slider_iframe = $('.car-details .auto-slider .slides li iframe'),
            slider_iframe_parent = $('.car-details .auto-slider .slides li').height();

        if (slider_iframe.length) {
            slider_iframe.css({
                'height': '' + slider_iframe_parent + 'px'
            });
        }



    };

    fl_theme.initCustomWidgetFunction = function () {
        /*Widgets*/
        $('.widget.widget_categories .children').parent('.cat-item').addClass('has-sub-category');
    };

    // Open Close Mobile Navigation
    fl_theme.initMobileNavigationOpenClose = function () {
        var $navbar_wrapper = $('.fl-mobile-menu-wrapper'),
            $navbar_menu_sidebar = $('.fl--mobile-menu-navigation-wrapper'),
            $hamburgerbars = $('.fl--hamburger-menu-wrapper,.fl--hamburger-menu'),
            $social_profiles = $('.fl-mobile-menu-wrapper ul.fl-sidebar-social-profiles li a'),
            OpenNavBar = void 0;

        self.fullscreenNavbarIsOpened = function () {
            return OpenNavBar;
        };

        self.toogleOpenCloseMobileMenu = function () {
            self[OpenNavBar ? 'closeFullscreenNavbar' : 'openFullscreenNavbar']();
        };
        self.openFullscreenNavbar = function () {
            if (OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 1;

            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a,.fl--mobile-menu li.opened .sub-menu >li >a');
            if (!$navbar_wrapper.find('.fl--mobile-menu >li.opened').length) {
                $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');
            }

            $hamburgerbars.addClass('opened');
            $hamburgerbars.removeClass('closed');

            // NavBarMenu Items Animation
            TweenMax.set($navbarMenuItems, {
                opacity: 0,
                x: '-20%',
                force3D: true
            });

            TweenMax.staggerTo($navbarMenuItems, 0.2, {
                opacity: 1,
                x: '0%',
                delay: 0.4
            }, 0.04);

            // Social Profiles Animation
            TweenMax.set($social_profiles, {
                opacity: 0,
                y: '-100%',
                force3D: true
            });

            TweenMax.staggerTo($social_profiles, 0.2, {
                opacity: 1,
                y: '0%',
                delay: 0.6
            }, 0.04);

            // NavBarMenu wrapper Animation
            TweenMax.set($navbar_wrapper, {
                display: 'none',
                force3D: true
            });

            TweenMax.to($navbar_wrapper, 0.4, {
                opacity: 1,
                display: 'block'
            }, 0.04);

            // NavBarMenu menu sidebar Animation
            TweenMax.set($navbar_menu_sidebar, {
                opacity: 0,
                x: '-100%',
                force3D: true
            });

            TweenMax.to($navbar_menu_sidebar, 0.4, {
                opacity: 1,
                x: '0%',
                display: 'block'
            }, 0.04);

            $navbar_wrapper.addClass('open');

        };

        self.closeFullscreenNavbar = function (dontTouchBody) {
            if (!OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 0;


            // disactive all togglers
            $hamburgerbars.removeClass('opened');
            $hamburgerbars.addClass('closed');


            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');


            // set top position and animate
            TweenMax.to($navbar_wrapper, 0.4, {
                force3D: true,
                opacity: 0,
                display: 'none',
                delay: 0.1
            });

            TweenMax.to($navbar_menu_sidebar, 0.2, {
                opacity: 0,
                x: '-100%',
                force3D: true,
                delay: 0.3
            }, 0.1);

            TweenMax.to($navbarMenuItems, 0.2, {
                opacity: 0,
                x: '-20%',
                delay: 0.2
            }, 0.1);



            // open navbar block
            $navbar_wrapper.removeClass('open');

        };

        $doc.on('click', '.fl--hamburger-menu-wrapper,.fl--mobile-menu-icon,.fl--hamburger-menu', function (e) {
            self.toogleOpenCloseMobileMenu();
            e.preventDefault();
        });
    };
    // Mobile Menu
    fl_theme.initMobileNavigationSubMenuAnimation = function () {
        var $mobileMenu = $('.fl--mobile-menu');

        $mobileMenu.find('li').each(function () {
            var $this = $(this);
            if ($this.find('ul').length > 0) {
                $this.find('> a').append('<span class="fl-menu-flipper-icon fl--open-child-menu"><span class="fl-front-content"><i class="fl-custom-icon-list-style-6"></i></span><span class="fl-back-content"><i class="fl-custom-icon-cancel-5"></i></span></span>');
            }
        });

        // open -> close sub-menu
        function toggleSub_menu($sub_menu_find) {
            var $navigation_Items = $sub_menu_find.find('.sub-nav >.sub-menu >li >a');

            if (!$sub_menu_find.find('.sub-nav >.sub-menu >li.opened').length) {
                $navigation_Items = $sub_menu_find.find('.sub-menu >li >a');
            }

            TweenMax.set($navigation_Items, {
                opacity: 0,
                x: '-20%',
                force3D: true
            }, 0.04);
            if ($sub_menu_find.hasClass('opened')) {
                $sub_menu_find.removeClass('opened');
                $sub_menu_find.find('li').removeClass('opened');
                $sub_menu_find.find('ul').slideUp(200);
                TweenMax.staggerTo($navigation_Items, 0.3, {
                    opacity: 0,
                    x: '-20%',
                    force3D: true
                }, 0.04);
                console.log($navigation_Items);
            } else {
                TweenMax.staggerTo($navigation_Items, 0.3, {
                    x: '0%',
                    opacity: 1,
                    delay: 0.2
                }, 0.04);

                $sub_menu_find.addClass('opened');
                if (!$sub_menu_find.children('ul').length) {
                    $sub_menu_find.find('div').children('ul').slideDown();
                } else {
                    $sub_menu_find.children('ul').slideDown();
                }
                // Sub menu Children
                $sub_menu_find.siblings('li').children('ul').slideUp(200);
                $sub_menu_find.siblings('li').removeClass('opened');
                $sub_menu_find.siblings('li').find('li').removeClass('opened');
                $sub_menu_find.siblings('li').find('ul').slideUp(200);
            }
        }

        $mobileMenu.on('click', 'li.has-submenu >a', function (e) {
            toggleSub_menu($(this).parent());
            e.preventDefault();
        });
    };

    // WPML Demo Click
    fl_theme.initWPMLDemoClickLink = function () {

        $body.on('click', '.demo-language-selector a', function (e) {

            alert('The language switcher requires WPML plugin to be installed and activated.If you don\'t need this option do not install the plugin');

            e.preventDefault();
        });
    };

    fl_theme.initVelocityAnimationSave = function () {
        var animated_velocity = $('.fl-animated-item-velocity');

        // Hided item if animated not complete
        animated_velocity.each(function () {
            var $this = $(this),
                $item;

            if ($this.data('item-for-animated')) {
                $item = $this.find($this.data('item-for-animated'));
                $item.each(function () {
                    if (!$(this).hasClass('animation-complete')) {
                        $(this).css('opacity', '0');
                    }
                });
            } else {
                if (!$this.hasClass('animation-complete')) {
                    $this.css('opacity', '0');
                }
            }
        });

        // animated Function
        animated_velocity.each(function () {
            var $this_item = $(this),
                $item, $animation;
            $animation = $this_item.data('animate-type');
            if ($this_item.data('item-for-animated')) {
                $item = $this_item.find($this_item.data('item-for-animated'));
                $item.each(function () {
                    var $this = $(this);
                    var delay = '';
                    if ($this_item.data('item-delay')) {
                        delay = $this_item.data('item-delay');
                    } else {
                        if ($this.data('item-delay')) {
                            delay = $this.data('item-delay');
                        }
                    }
                    $this.waypoint(function () {
                        if (!$this.hasClass('animation-complete')) {
                            $this.addClass('animation-complete')
                                .velocity('transition.' + $animation, {
                                    delay: delay,
                                    display: 'undefined',
                                    opacity: 1
                                });
                        }
                    }, {
                        offset: offset
                    });
                });
            } else {
                $this_item.waypoint(function () {
                    var delay = '';
                    if ($this_item.data('item-delay')) {
                        delay = $this_item.data('item-delay');
                    }

                    if (!$this_item.hasClass('animation-complete')) {
                        $this_item.addClass('animation-complete')
                            .velocity('transition.' + $animation, {
                                delay: delay,
                                display: 'undefined',
                                opacity: 1
                            });
                    }

                }, {
                    offset: offset
                });
            }
        });
    };


    // Post Archive And Single Slider Post
    fl_theme.initPostSlider = function () {
        $('.post-gallery-slider').each(function () {
            $(this).slick({
                dots: false,
                infinite: false,
                draggable: true,
                speed: 800,
                nextArrow: '.slider-arrow-right',
                prevArrow: '.slider-arrow-left',
            });
        });
    };

    fl_theme.initSharePostArchive = function () {
        $('body').on('click', '.share-post', function (e) {

            if ($(this).hasClass('closed')) {
                $(this).removeClass('closed').addClass('opened');
                $(this).parent().find('.post-share-icon').removeClass('closed').addClass('opened');
            } else {
                $(this).removeClass('opened').addClass('closed');
                $(this).parent().find('.post-share-icon').removeClass('opened').addClass('closed');
            }

            e.preventDefault();
        });
    };
    // Venobox
    fl_theme.initVenoBoxFunction = function () {
        var venobox = $('.venobox');
        if (venobox.length) {
            venobox.each(function () {
                $(this).venobox();
            });
        }
    };
    // Post Archive And Single Slider Post
    fl_theme.initMotoSlider = function () {
        $('.templines-moto-slider').each(function () {
            var $motoslider = $(this);
            var current = $motoslider.parent().find('.current');
            $motoslider.on('init', function (event, slick) {
                current.text(slick.currentSlide + 1);
                $('.total').text(slick.slideCount);
            });
            $motoslider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                current.text(nextSlide + 1);
                TweenMax.fromTo(current, .5, {
                    y: "-3px",
                    opacity: 0
                }, {
                    y: "0px",
                    opacity: 1,
                    delay: 0.2,
                    easing: 'easeInOutQuad'
                });

            });

            // Slick Slider Options
            $motoslider.not('.slick-initialized').slick({
                draggable: true,
                arrows: true,
                dots: false,
                infinite: true,
                speed: 1000,
                mobileFirst: true,
                pauseOnHover: true,
                nextArrow: $motoslider.parent().find('.moto-slider-arrow-next'),
                prevArrow: $motoslider.parent().find('.moto-slider-arrow-prev'),
            });
            console.log($motoslider.parent());
        });
    };
    // Testimonial Slider
    fl_theme.initTestimonialSlider = function () {
        $('.templines-testimonial-slider').each(function () {
            var $motoslider = $(this);
            // Slick Slider Options
            $motoslider.not('.slick-initialized').slick({
                draggable: true,
                arrows: true,
                dots: true,
                infinite: true,
                speed: 1000,
                mobileFirst: true,
                pauseOnHover: true,
                nextArrow: $motoslider.parent().find('.moto-slider-arrow-next'),
                prevArrow: $motoslider.parent().find('.moto-slider-arrow-prev'),
            });
        });
    };

    // Line Height Check
    fl_theme.initLineHeightСheck = function () {
        var $element = $('.post-inner_content >p ,.single-page-wrapper >p');
        $element.each(function () {
            if ($(this).css("font-size") >= "20px") {
                $(this).css('line-height', '1.6');
            }
        });
    };

    fl_theme.initGoogleMapsPageBuilderFunction = function () {
        var google_map = $(".page-builder-google-map-wrap"),
            custom_html_google_map = google_map.attr('data-custom-class'),
            address = google_map.attr('data-map-address'),
            scrollwell = google_map.attr('data-map-scrollwhell'),
            icon = google_map.attr('data-map-marker'),
            map_zoom = google_map.attr('data-map-zoom'),
            style_map = '';
        if (google_map.hasClass('map-light-coloured')) {
            style_map = '[ { "featureType": "landscape", "stylers": [ { "hue": "#FFBB00" }, { "saturation": 43.400000000000006 }, { "lightness": 37.599999999999994 }, { "gamma": 1 } ] }, { "featureType": "road.highway", "stylers": [ { "hue": "#FFC200" }, { "saturation": -61.8 }, { "lightness": 45.599999999999994 }, { "gamma": 1 } ] }, { "featureType": "road.arterial", "stylers": [ { "hue": "#FF0300" }, { "saturation": -100 }, { "lightness": 51.19999999999999 }, { "gamma": 1 } ] }, { "featureType": "road.local", "stylers": [ { "hue": "#FF0300" }, { "saturation": -100 }, { "lightness": 52 }, { "gamma": 1 } ] }, { "featureType": "water", "stylers": [ { "hue": "#0078FF" }, { "saturation": -13.200000000000003 }, { "lightness": 2.4000000000000057 }, { "gamma": 1 } ] }, { "featureType": "poi", "stylers": [ { "hue": "#00FF6A" }, { "saturation": -1.0989010989011234 }, { "lightness": 11.200000000000017 }, { "gamma": 1 } ] } ]';
        }
        $('.' + custom_html_google_map + " .google-map").gmap3({
            marker: {
                address: address,

                options: {
                    icon: icon
                }
            },
            map: {
                options: {
                    zoom: Number(map_zoom),
                    scrollwheel: false,
                    draggable: true,
                    mapTypeControl: true,
                    style_map
                }
            }
        });

    };

    // Car slider
    fl_theme.initCarsSlider = function () {

        $('.auto-slider .slides').slick({
            dots: false,
            infinite: false,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            focusOnSelect: true,
            nextArrow: '.fl-slider-arrow-right',
            prevArrow: '.fl-slider-arrow-left',
            asNavFor: '.auto-carousel .slides'
        });

        $('.auto-carousel .slides').slick({
            dots: false,
            infinite: false,
            draggable: true,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            focusOnSelect: true,
            arrows: false,
            swipeToSlide: true,
            asNavFor: '.auto-slider .slides',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

    };

    // Full Search Form Open Close
    fl_theme.initFullSearchFormOpenClose = function () {
        var OpenSearchFullScrean = void 0,
            searchFormWrap = $('.header-search-form'),
            searchForm = $('.header-search-form .search-form-entry-content .search-form-wrapper form'),
            searchCloseBtn = $('.header-search-form .search-form-entry-content .search-close-btn'),
            seacrhOverflow = $('.header-search-form .search-form-entry-content .overflow-search-bg');

        self.FullScreanSearchFormIsOpened = function () {
            return OpenSearchFullScrean;
        };

        self.toogleOpenCloseFullSearchForm = function () {
            self[OpenSearchFullScrean ? 'closeFullScreanSearchForm' : 'openFullScreanSearchForm']();
        };
        self.openFullScreanSearchForm = function () {
            if (OpenSearchFullScrean || !searchFormWrap.length) {
                return;
            }
            OpenSearchFullScrean = 1;
            searchFormWrap.addClass('opened');


            TweenMax.to(seacrhOverflow, 0.1, {
                opacity: 1,
                delay: 0.2
            }, 0.04);

            TweenMax.to(searchForm, 0.2, {
                opacity: 1,
                y: '0%',
                delay: 0.4
            }, 0.04);

            TweenMax.to(searchCloseBtn, 0.2, {
                opacity: 1,
                x: '0%',
                delay: 0.6
            }, 0.04);

        };

        self.closeFullScreanSearchForm = function () {
            if (!OpenSearchFullScrean || !searchFormWrap.length) {
                return;
            }
            OpenSearchFullScrean = 0;

            TweenMax.to(searchCloseBtn, 0.2, {
                opacity: 0,
                x: '60',
                delay: 0.3
            }, 0.04);

            TweenMax.to(seacrhOverflow, 0.2, {
                opacity: 0,
                delay: 0.5
            }, 0.04);

            TweenMax.to(searchForm, 0.2, {
                opacity: 0,
                y: '-30',
                delay: 0.6
            }, 0.04);

            TweenMax.set(searchFormWrap, {
                className: "-=opened",
                delay: 0.8
            });

        };

        $doc.on('click', '.fl-search-header-icon-wrap,.search-close-btn,.header-search-form .search-form-entry-content .overflow-search-bg', function (e) {
            self.toogleOpenCloseFullSearchForm();
            e.preventDefault();
        });
    };
    // SidebarHeader Open Close
    fl_theme.initHeaderSidebarOpenClose = function () {
        var OpenHeaderSIdebar = void 0,
            HeaderSidebarWrap = $('.header-sidebar-wrap'),
            HeaderSidebar = $('.header-sidebar-wrap .entry-content .header-sidebar-container'),
            HeaderSidebarOverflow = $('.header-sidebar-wrap .entry-content .overflow-header-sidebar');

        self.HeaderSIdebarFormIsOpened = function () {
            return OpenHeaderSIdebar;
        };

        self.toogleOpenCloseHeaderSidebar = function () {
            self[OpenHeaderSIdebar ? 'closeHeaderSIdebarForm' : 'openHeaderSIdebarForm']();
        };
        self.openHeaderSIdebarForm = function () {
            if (OpenHeaderSIdebar || !HeaderSidebarWrap.length) {
                return;
            }
            OpenHeaderSIdebar = 1;
            HeaderSidebarWrap.addClass('opened');


            TweenMax.to(HeaderSidebarOverflow, 0.1, {
                opacity: 1,
                delay: 0.2
            }, 0.04);

            TweenMax.to(HeaderSidebar, 0.2, {
                opacity: 1,
                x: '0%',
                delay: 0.4
            }, 0.04);

        };

        self.closeHeaderSIdebarForm = function () {
            if (!OpenHeaderSIdebar || !HeaderSidebarWrap.length) {
                return;
            }
            OpenHeaderSIdebar = 0;

            TweenMax.to(HeaderSidebarOverflow, 0.2, {
                opacity: 0,
                delay: 0.5
            }, 0.04);

            TweenMax.to(HeaderSidebar, 0.2, {
                opacity: 0,
                x: '330px',
                delay: 0.6
            }, 0.04);

            TweenMax.set(HeaderSidebarWrap, {
                className: "-=opened",
                delay: 0.8
            });

        };

        $doc.on('click', '.fl-sidebar-header-icon-wrap,.header-sidebar-wrap .entry-content .header-sidebar-container .entry-sidebar .closed-icon-wrap .closed-icon-header-sidebar,.header-sidebar-wrap .entry-content .overflow-header-sidebar', function (e) {
            self.toogleOpenCloseHeaderSidebar();
            e.preventDefault();
        });
    };
    // SidebarHeader Open Close
    fl_theme.initMotoSliderImage = function () {
        var $motoslider = $('.moto-image-slider');
        // Slick Slider Options
        $motoslider.not('.slick-initialized').slick({
            draggable: true,
            arrows: false,
            dots: false,
            infinite: true,
            autoplay: true,
            speed: 1000,
            mobileFirst: true,
            pauseOnHover: true,
        });
    };
    fl_theme.initCustomFunction = function () {
        // Sidebar
        fl_theme.initStikySidebar();
        // Resize iframe video
        fl_theme.initResponsiveIframe();
        // Image Popup
        fl_theme.initImagePopup();
        // Gallery Popups
        fl_theme.initGalleryPopup();
        // Select
        fl_theme.initCustomSelect();
        // Open Close Mobile Navigation
        fl_theme.initMobileNavigationOpenClose();
        // Sub Menu Animation
        fl_theme.initMobileNavigationSubMenuAnimation();
        //Navbar fixed
        fl_theme.initNavBarFixed();
        // Car Google Maps
        fl_theme.initCarGoogleMaps();
        // Change Grid Switch Car Page
        fl_theme.initGridSwitchCar();
        // Widget Range
        fl_theme.initCustomWidgetRange();
        // Custom Widget Function
        fl_theme.initCustomWidgetFunction();
        //  Custom Iframe Slider Function
        fl_theme.initCustomHeidthIframeSlider();
        //  WPML Demo Click Link
        fl_theme.initWPMLDemoClickLink();
        // Share Post
        fl_theme.initSharePostArchive();
        // Post Slider
        fl_theme.initPostSlider();
        // Venobox
        fl_theme.initVenoBoxFunction();
        // Line Height Check
        fl_theme.initLineHeightСheck();
        // Moto Slider
        fl_theme.initMotoSlider();
        // Testimonial Slider
        fl_theme.initTestimonialSlider();
        // Google Map Page Builder
        fl_theme.initGoogleMapsPageBuilderFunction();
        // Car slider
        fl_theme.initCarsSlider();
        // Full Search Form Open Close
        fl_theme.initFullSearchFormOpenClose();
        // SidebarHeader Open Close
        fl_theme.initHeaderSidebarOpenClose();
        // Slider Moto Image
        fl_theme.initMotoSliderImage();
    };

    fl_theme.initVelocityAnimationSave();
    fl_theme.initCustomFunction();


    $($window).resize(function () {
        fl_theme.initResponsiveIframe();
        fl_theme.initNavBarFixed();
        // Resize iframe video
        fl_theme.initResponsiveIframe();
        // Custom Iframe Slider Function
        fl_theme.initCustomHeidthIframeSlider();
        setTimeout(fl_theme.initCustomHeidthIframeSlider, 200);
    });


});
