jQuery.noConflict()(function($) {

    "use strict";

    var initLoadMoreFunction = function() {
        var body = $('body');
        var page_num = parseInt(keymoto_pagination_data.startPage) + 1;
        var max_pages = parseInt(keymoto_pagination_data.maxPages);
        var next_link = keymoto_pagination_data.nextLink;

        var container = keymoto_pagination_data.container;
        var $container = $(container);
        var container_has_isotope = false;


        var last_btn_text = keymoto_pagination_data.button_text_no_post;

        var $button = $('#fl-ajax-load-more-pagination');


        // Last Page Blog Text
        if($container.hasClass('fl--blog-post-div')){
            last_btn_text = keymoto_pagination_data.button_text_no_post;
        }
        // Last Page Woo Text
        if($container.hasClass('fl--work--wrapper')){
            last_btn_text = keymoto_pagination_data.button_text_no_work;
        }
        // Last Page Woo Text
        if($container.hasClass('products')){
            last_btn_text = keymoto_pagination_data.button_text_no_product;
        }
        //
        if($container.hasClass('vc-cars-wrapper')){
            last_btn_text = keymoto_pagination_data.button_car_text_no_car;
        }
        if (page_num > max_pages) {
            $button.addClass('load_more_disable').text(last_btn_text);
        }


        // Define a function to update the next_link with filter parameters
        function updateNextLink(extraLink = null) {
            
            var link = next_link.substring(0,next_link.indexOf("page"));
            link += 'page/';
            if( extraLink == null)
            {
                extraLink = next_link.substring(link.length);

                if(extraLink.indexOf('/') != -1) {
                    extraLink = extraLink.substring(extraLink.indexOf('/'));
                } else {
                    extraLink = '';
                }
            }

            next_link = link + page_num + extraLink;

        }

        // Call this function whenever a filter action occurs
        $(document).on('wpfAjaxSuccess', function() {
            const filterUrl = new URL(window.location.href);
            var filterParams = filterUrl.search; // capture current filter params

            page_num = 2; // reset to the first page
            max_pages = parseInt(keymoto_pagination_data.maxPages);
            console.log(page_num);
            console.log(max_pages);
            updateNextLink("/" + filterParams);
            $button.removeClass('load_more_disable').text(keymoto_pagination_data.button_text);
        });


        // Correcting load-more operation error after heltering action


        $(document).on('click','#fl-ajax-load-more-pagination', function(e) {
            e.preventDefault();
            $button = $(this);

            if (!$(this).hasClass('loading') && !$(this).hasClass('load_more_disable') && page_num <= max_pages) {
                $.ajax({
                    type: 'GET',
                    url: next_link,
                    dataType: 'html',
                    beforeSend: function() {
                        $button.addClass('loading');
                        $button.text(keymoto_pagination_data.button_loading);
                    },
                    complete: function(content) {
                        $button.text(keymoto_pagination_data.button_text);
                        $button.removeClass('loading');

                        if (content.status == 200 && content.responseText != '') {
                            page_num++;

                            // Update next_link for the next page with filter params
                            updateNextLink();

                            if (page_num > max_pages) {

                                $button.addClass('load_more_disable').text(last_btn_text);

                            }

                            if ($(content.responseText).find(container).length > 0) {
                                container_has_isotope = ($container.hasClass('fl-isotope-wrapper'));
                                $(content.responseText).find(container).children().each(function() {
                                    if (!container_has_isotope) {
                                        $container.append( $(this));
                                        fl_theme.initVelocityAnimationSave();

                                    } else {
                                        fl_theme.initVelocityAnimationSave();
                                        var $content = $(this);
                                        $content.imagesLoaded(function () {
                                            $container.append($content).isotope('appended', $content);
                                        });

                                    }
                                });
                                $('body').trigger('post-load');
                            }
                        }
                    }
                });
            }
        });
    };
    $(document).ready(function(){
        // Load More
        initLoadMoreFunction();
    });

});