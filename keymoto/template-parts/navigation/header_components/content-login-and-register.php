<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
    <?php if (!is_user_logged_in()): ?>
           <div class="fl-flipper-icon">
                  <div class="fl-front-content">
                      <i class="ic icon-user"></i>
                  </div>
                  <div class="fl-back-content">
                      <span class="fl-custom-icon-plus-symbol"></span>
                  </div>
           </div>
    <?php else: ?>
             <a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" class="fl-logout-links">
                 <i class="ic icon-logout"></i>
             </a>
    <?php endif; ?>