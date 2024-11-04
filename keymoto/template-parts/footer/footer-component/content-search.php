<div class="header-search-form closed">
    <div class="search-form-entry-content">
        <div class="search-close-btn"><i class="fl-custom-icon-cancel-5"></i></div>
        <div class="overflow-search-bg"></div>
        <div class="search-form-wrapper">
            <div class="container">
                <!--Search form Start-->
                <form class="search_global" role="search" method="get" id="searchform-global" action="<?php echo esc_url(site_url())?>" >
                    <fieldset>
                        <div class="row search-form-row">
                            <input type="text" class="searchinput col-5" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="search-form-global" placeholder="<?php echo esc_attr__('Search keyword ...', 'keymoto')?>" />
                            <div class="searchsubmit">
                                <button type="submit" id="searchsubmit-global" class="fl-default-button primary-button-style submit-btn"><?php echo esc_attr__('SEARCH', 'keymoto')?><span class="button-decor"></span></button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <!--Search form End-->
            </div>
        </div>
    </div>

</div>