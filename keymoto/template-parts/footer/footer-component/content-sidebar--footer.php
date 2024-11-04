<div class="header-sidebar-wrap">
    <div class="entry-content">
        <div class="overflow-header-sidebar"></div>
        <div class="header-sidebar-container">
            <div class="entry-sidebar">
                <div class="closed-icon-wrap"><div class="closed-icon-header-sidebar"><i class="fl-custom-icon-cancel-5"></i></div></div>
                <?php if ( is_active_sidebar( 'header-sidebar' ) ) {
                    dynamic_sidebar( 'header-sidebar' );
                } ?>
            </div>
        </div>
    </div>
</div>