<?php
echo __FILE__;
global $post;
$url = sprintf("url('%s')", get_the_post_thumbnail_url($post, 'full'));
$header_bg = has_post_thumbnail($post) ? $url : 'none'; ?>
<header class="header header-projects" style="background-image: <?php echo $header_bg; ?>;">
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
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post();
            $project = array(
                'logo' => rwmb_meta('project-logo', array('size' => 'thumbnail', 'limit' => 1)),
                'type' => esc_html(rwmb_meta('project-type')),
                'price' => esc_html(number_format((float)rwmb_meta('project-price'), 0, '.', ' ')),
                'date' => esc_html(rwmb_meta('project-completion-date')),
                'status' => esc_html(rwmb_meta('project-status')),
            );
            ?>
            <div class="container">
                <div class="text-center">
                    <?php if (function_exists('kama_breadcrumbs')) {
                        kama_breadcrumbs(' &mdash; ');
                    }
                    if (!empty($project['type'])) { ?>
                        <div>
                            <div class="project-type-h text-uppercase text-extrabold"><?php echo $project['type']; ?></div>
                        </div>
                    <?php } ?>
                    <div>
                        <div class="project-title-h text-extrabold"><?php the_title(); ?></div>
                    </div>
                </div>
                <div class="row project-details-h">
                    <?php if (!empty($project['status'])) { ?>
                        <div class="col-md-4">
                            <div class="highlight text-uppercase text-bold">Статус</div>
                            <?php echo $project['status']; ?>
                        </div>
                    <?php }
                    if (!empty($project['date'])) { ?>
                        <div class="col-md-4">
                            <div class="highlight text-uppercase text-bold">Дата сдачи</div>
                            <?php echo $project['date']; ?>
                        </div>
                    <?php }
                    if (!empty($project['price'])) { ?>
                        <div class="col-md-4">
                            <div class="highlight text-uppercase text-bold">Стоимость м<sup>2</sup></div>
                            от <?php echo $project['price']; ?> грн
                        </div>
                    <?php } ?>
                </div>
                <?php if (!empty($project['logo'])) { $logo = reset($project['logo']); ?>
                    <span class="project-logo-h">
                        <img src="<?php echo esc_url($logo['full_url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                    </span>
                <?php } ?>
            </div>
        <?php }
    } ?>
</header>

<div class="nav-mobile-header">
    <button class="hamburger js-hamburger" type="button" tabindex="0">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
    </button>
    <div class="logo"><?php get_default_logo_link(); ?></div>
</div>
