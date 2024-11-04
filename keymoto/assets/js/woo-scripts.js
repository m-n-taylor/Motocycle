jQuery.noConflict()(function($) {

    "use strict";

// Compare Custom
    var initCompareCustomFunction = function()
    {
        $(document).on('click', 'a.compare:not(.added)', function (e) {
            e.preventDefault();

            var $this = $(this);
            $this.addClass('loading');

            $this.closest('.product-inner').find('.compare:not(.loading)').trigger('click');

            var compare = false;

            if ($(this).hasClass('added')) {
                compare = true;
            }

            if (compare === false) {
                var compare_counter = $(document).find('#top-cart-compare-count').html();
                compare_counter = parseInt(compare_counter, 10) + 1;
                $this.removeClass('loading');
                setTimeout(function () {
                    $(document).find('#top-cart-compare-count').html(compare_counter);
                }, 2000);

            }
        });

        $(document).find('.compare-list').on('click', '.remove a', function (e) {
            e.preventDefault();
            var compare_counter = $('#top-cart-compare-count', window.parent.document).html();
            compare_counter = parseInt(compare_counter, 10) - 1;
            if (compare_counter < 0) {
                compare_counter = 0;
            }

            $('#top-cart-compare-count', window.parent.document).html(compare_counter);
        });

        $('.yith-woocompare-widget').on('click', 'li a.remove', function (e) {
            e.preventDefault();
            var compare_counter = $(document).find('#top-cart-compare-count').html();
            compare_counter = parseInt(compare_counter, 10) - 1;
            if (compare_counter < 0) {
                compare_counter = 0;
            }

            setTimeout(function () {
                $(document).find('#top-cart-compare-count').html(compare_counter);
            }, 2000);

        });

        $('.yith-woocompare-widget').on('click', 'a.clear-all', function (e) {
            e.preventDefault();
            setTimeout(function () {
                $(document).find('#top-cart-compare-count').html('0');
            }, 2000);
        });
    };
// Numbers
    var initWooArrowsProduct = function() {
        $('.fl-single-product .quantity, .shop_table .quantity').each(function(){
            var $inputNumber, min, max, $self = $(this);
            if($self.length > 0) {
                $self.prepend('<i class="fl-custom-icon-minus-sign-of-a-line-in-horizontal-position minus">').append('<i class="fl-custom-icon-plus-sign plus">');
                $self.find('.minus').on('click', function() {
                    $inputNumber = $(this).siblings('.qty');
                    min = $inputNumber.attr('min') ? $inputNumber.attr('min') : 1;
                    max = $inputNumber.attr('max');
                    var beforeVal = +$inputNumber.val();
                    var newVal = (beforeVal > min || !min) ? +beforeVal - 1 : min;
                    $inputNumber.val(newVal).trigger('change');
                    $(this).parent().siblings('.single_add_to_cart_button').attr('data-quantity', newVal);
                });
                $self.find('.plus').on('click', function() {
                    $inputNumber = $(this).siblings('.qty');
                    min = $inputNumber.attr('min') ? $inputNumber.attr('min') : 1;
                    max = $inputNumber.attr('max');
                    var beforeVal = +$inputNumber.val();
                    var newVal = (beforeVal < max || !max) ? +beforeVal + 1 : max;
                    $inputNumber.val(newVal).trigger('change');
                    $(this).parent().siblings('.single_add_to_cart_button').attr('data-quantity', newVal);
                });
            }
            $self.find('.qty').on('input propertychange',function() {
                $('.single_add_to_cart_button').attr('data-quantity', $(this).val());
            });
        });
    };


var initFilterShop = function () {
    var counter_filter_woo = $('.fl-woocommerce-filter-sidebar div.widget').length-1;
    $('.filter-count').text(counter_filter_woo);




    var filter_btn = $('.fl-filter-setting'),filter_div = $('.fl-woocommerce-filter-sidebar');
    // Open Close
    filter_btn.on('click',function() {
        if ($(this).hasClass("active")){
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }

        if (filter_div.hasClass("enable")) {
            filter_div.removeClass('enable');
            filter_div.addClass('disable');
            filter_div.slideUp(200);
        } else {
            filter_div.slideDown();
            filter_div.removeClass('disable');
            filter_div.addClass('enable');
        }
    });

};
// Shop Slider Function
var initSliderSingleShopFunction = function () {

    var slider = $('.product-slider');

    slider.not('.slick-initialized').slick({
            arrows: false,
            dots: false,
            infinite: false,
            speed: 700,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            focusOnSelect: true,
            asNavFor: '.product-carousel'
        });

        $('.product-carousel').not('.slick-initialized').slick({
            dots: false,
            infinite: false,
            draggable: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            focusOnSelect: true,
            arrows: false,
            asNavFor: '.product-slider',
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




// Category Widget Woo
var initProductCategoryWidgetAnimation = function () {

        var $widgetWrapper = $('.widget_product_categories');

        $widgetWrapper.find('ul.product-categories li.cat-parent').first().addClass('opened');

        $widgetWrapper.find('li').each(function(){
            var $this = $(this);
            if($this.length > 0) {
                $this.prepend( "<i></i>" );
            }
        });

        // open -> close sub-menu
        function toogleWidgetSub_menu($widget_sub_menu_find) {
            var $widget_navigation_Items = $widget_sub_menu_find.find('.cat-parent >.children >li >a,.cat-parent >.children >li');

            if (!$widget_sub_menu_find.find('.cat-parent >.children >li.opened').length) {
                $widget_navigation_Items = $widget_sub_menu_find.find('.children >li ');
            }

            console.log($widget_navigation_Items);

            TweenMax.set($widget_navigation_Items, {
                opacity: 0,
                x: '-20%',
                force3D: true
            }, 0.04);
            if ($widget_sub_menu_find.hasClass('opened')) {
                $widget_sub_menu_find.removeClass('opened');
                $widget_sub_menu_find.find('li').removeClass('opened');
                $widget_sub_menu_find.find('ul').slideUp(200);
                TweenMax.staggerTo($widget_navigation_Items, 0.3, {
                    opacity: 0,
                    x: '-20%',
                    force3D: true
                }, 0.04);
                console.log($widget_navigation_Items);
            } else {
                TweenMax.staggerTo($widget_navigation_Items, 0.3, {
                    x: '0%',
                    opacity: 1,
                    delay: 0.2
                }, 0.04);

                $widget_sub_menu_find.addClass('opened');
                if (!$widget_sub_menu_find.children('ul').length) {
                    $widget_sub_menu_find.find('div').children('ul').slideDown();
                } else {
                    $widget_sub_menu_find.children('ul').slideDown();
                }
                // Sub menu Children
                $widget_sub_menu_find.siblings('li').children('ul').slideUp(200);
                $widget_sub_menu_find.siblings('li').removeClass('opened');
                $widget_sub_menu_find.siblings('li').find('li').removeClass('opened');
                $widget_sub_menu_find.siblings('li').find('ul').slideUp(200);
            }
        }

        $widgetWrapper.on('click', 'li.cat-parent >i', function (e) {
            toogleWidgetSub_menu($(this).parent());
            e.preventDefault();
        });
};


    $(document).ready(function(){
        // Compare Custom
        initCompareCustomFunction();
        // Numbers
        initWooArrowsProduct();
        // Filter Shop
        initFilterShop();
        // Shop Slider Function
        initSliderSingleShopFunction();
        // Category Widget Woo
        initProductCategoryWidgetAnimation();
    });

    $(document.body).on('updated_wc_div cart_page_refreshed',function() {
        initWooArrowsProduct();
        $( document ).trigger('change input');
    });

});