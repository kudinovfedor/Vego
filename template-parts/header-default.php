<?php echo __FILE__; ?>
<?php $header_bg = has_header_image() ? sprintf("url('%s')", get_header_image()) : 'none'; ?>
<header class="header header-default" style="background-image: <?php echo $header_bg; ?>;">
    <div class="container header-container">
        <?php if (has_nav_menu('main-nav')) { ?>
            <nav class="nav js-menu header-nav">
                <button type="button" tabindex="0" class="menu-item-close menu-close js-menu-close"></button>
                <?php wp_nav_menu(array(
                    'theme_location' => 'main-nav',
                    'container' => false,
                    'menu_class' => 'menu',
                    'menu_id' => '',
                    'fallback_cb' => 'wp_page_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 3
                )); ?>
            </nav>
        <?php } ?>
        <div class="row">
            <div class="col-md-4 header-phone">
                <?php if (has_phones()) { ?>
                    <ul class="phone">
                        <?php foreach (get_phones() as $key => $phone) {
                            if ($key > 0) {
                                break;
                            } ?>
                            <li class="phone-item">
                                <a href="tel:<?php echo esc_attr(get_phone_number($phone)); ?>"
                                   class="phone-number">
                                    <?php echo esc_html($phone); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php }
                if ($time_work = get_theme_mod('bw_additional_time_work')) { ?>
                    <span class="header-time-work d-block"><?php echo strip_tags($time_work, '<sup>'); ?></span>
                <?php } ?>
            </div>
            <div class="col-md-4 text-center header-logo">
                <div class="logo text-uppercase">
                    <?php get_default_logo_link(); ?>
                    <span class="logo-vego d-block">Vego</span>
                    <span class="logo-dev d-block">development</span>
                </div>
            </div>
            <div class="col-md-4 text-right header-btn">
                <button type="button" class="button-medium button-outline js-callback">
                    <i class="fas fa-phone-volume" aria-hidden="true"></i>
                    <?php _e('Callback', 'brainworks'); ?>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="nav-mobile-header">
    <button class="hamburger js-hamburger" type="button" tabindex="0">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
    </button>
    <div class="logo"><?php get_default_logo_link(); ?></div>
</div>
