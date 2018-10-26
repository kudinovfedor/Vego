<?php get_header(); ?>

<div class="page-wrapper">
    <?php
    $args = array(
        'post_type' => 'info',
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) { ?>
        <div class="info info-set-up container">
            <ul class="info-list">
                <?php while ($query->have_posts()) {
                    $query->the_post();

                    $info = array();
                    $info['price'] = '';

                    if (function_exists('rwmb_meta')) {
                        $info['city'] = esc_html(rwmb_meta('info-city'));
                        $info['link'] = esc_url(rwmb_meta('info-link'));
                        if(!empty(rwmb_meta('info-price'))) {
                            $info['price'] = esc_html((float)number_format(rwmb_meta('info-price'), 0, '.', ' '));
                        }
                        $info['labels'] = array(
                            'blue' => rwmb_meta('info-label-blue'),
                            'green' => rwmb_meta('info-label-green'),
                            'orange' => rwmb_meta('info-label-orange'),
                            'purple' => rwmb_meta('info-label-purple'),
                            'red' => rwmb_meta('info-label-red'),
                        );
                    }

                    $isLabelsNotEmpty = false;

                    foreach ($info['labels'] as $item) {
                        if (!empty($item)) {
                            $isLabelsNotEmpty = true;
                        }
                    }

                    $thumbnail = has_post_thumbnail()
                        ? sprintf("url('%s')", esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                        : 'none';
                    ?>
                    <li id="info-<?php the_ID(); ?>" <?php post_class('info-item'); ?>>
                        <div class="info-box" style="background-image: <?php echo $thumbnail; ?>;">
                            <?php if ($isLabelsNotEmpty) { ?>
                                <div class="info-labels text-right text-uppercase text-bold">
                                    <?php foreach ($info['labels'] as $key => $label) {
                                        if (empty($label)) {
                                            continue;
                                        } ?>
                                        <span class="label label-<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></span>
                                        <br>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="info-group text-left">
                                <?php if (!empty($info['city'])) { ?>
                                    <span class="info-city d-inline-block text-uppercase">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                        <?php echo $info['city']; ?>
                                </span>
                                <?php } ?>
                                <div class="info-title"><?php the_title() ?></div>
                            </div>
                        </div>
                        <div class="info-footer">
                            <?php if (!empty($info['price'])) { ?>
                                <span class="info-price d-inline-block">від
                                <span class="info-price-value"><?php echo $info['price']; ?></span>
                                USD
                            </span>
                            <?php }
                            if (!empty($info['link'])) { ?>
                                <a class="info-link text-uppercase" href="<?php echo $info['link']; ?>">Детальніше</a>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php } ?>

    <div class="project-map">
        <?php
        $args = array(
            'post_type' => 'projects',
            'posts_per_page' => -1
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $coordinates = array();
            $latitude = 0;
            $longitude = 0;
            while ($query->have_posts()) {
                $query->the_post();
                $project = array(
                    'lat' => (float)rwmb_meta('project-latitude'),
                    'lng' => (float)rwmb_meta('project-longitude'),
                );
                $coordinates[] = array(
                    'lat' => $project['lat'],
                    'lng' => $project['lng'],
                    'url' => get_the_permalink(),
                    'title' => get_the_title(),
                );
                $latitude += $project['lat'];
                $longitude += $project['lng'];
            }

            $coordinates = array_filter($coordinates, function ($value) {
                return !empty($value['lat']) && !empty($value['lng']);
            });
            $projects_count = count($coordinates);
            $latitude = round($latitude / $projects_count, 2);
            $longitude = round($longitude / $projects_count, 2);
        } ?>
        <?php google_map(array(
            'latitude' => $latitude,
            'longitude' => $longitude,
            'zoom' => get_theme_mod('bw_vego_google_map_front_page_zoom', 10),
            'marker' => array(
                'icon' => get_template_directory_uri() . '/assets/img/marker2-without-shadow.png',
                'locations' => array_values($coordinates),
            ),
            'dimensions' => false,
        )); ?>
    </div>

    <?php
    $title = get_theme_mod('bw_vego_live_title');
    $desc = get_theme_mod('bw_vego_live_desc');
    if (!empty($title) || !empty($desc)) { ?>
        <div class="live">
            <div class="container z-index-2">
                <div class="row">
                    <?php if (!empty($title)) { ?>
                        <div class="col-md-6 live-title"><?php echo $title; ?></div>
                    <?php }
                    if (!empty($desc)) { ?>
                        <div class="col-md-6 live-desc"><?php echo $desc; ?></div>
                    <?php } ?>
                </div>
            </div>
            <?php ?>
        </div>
    <?php } ?>

    <?php $vego_list = array(
        array(
            'value' => get_theme_mod('bw_vego_list_item-value-1'),
            'desc' => get_theme_mod('bw_vego_list_item-desc-1'),
        ),
        array(
            'value' => get_theme_mod('bw_vego_list_item-value-2'),
            'desc' => get_theme_mod('bw_vego_list_item-desc-2'),
        ),
        array(
            'value' => get_theme_mod('bw_vego_list_item-value-3'),
            'desc' => get_theme_mod('bw_vego_list_item-desc-3'),
        ),
        array(
            'value' => get_theme_mod('bw_vego_list_item-value-4'),
            'desc' => get_theme_mod('bw_vego_list_item-desc-4'),
        ),
    );
    $vego_list = array_filter($vego_list, function ($item) {
        return !empty($item['value']) && !empty($item['desc']);
    });
    if (!empty($vego_list)) { ?>
        <div class="container z-index-2">
            <div class="row vego-list">
                <?php foreach ($vego_list as $item) { ?>
                    <div class="col-sm-6 col-md-3 vego-item">
                        <div class="highlight"><?php echo strip_tags($item['value'], '<small><sup>'); ?></div>
                        <?php echo esc_html($item['desc']); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <div class="container">
        <div class="press-centre">
            <div class="press-centre-left">
                <h3 class="press-centre-title text-uppercase">Прес-центр</h3>
                <p class="press-centre-desc">Новини та акції компанії</p>
                <a href="<?php the_permalink(get_option('page_for_posts')); ?>"
                   class="button-medium button-outline press-centre-btn">Всі новини</a>
            </div>
            <div class="press-centre-right">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) { ?>
                    <div class="blog-list">
                        <div class="js-post-slider">
                            <?php while ($query->have_posts()): $query->the_post(); ?>
                                <article id="blog-<?php the_ID() ?>" <?php post_class('blog-item') ?>>
                                    <?php if (has_post_thumbnail()) {
                                        $thumbnail = has_post_thumbnail()
                                            ? sprintf("url('%s')",
                                                esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                                            : 'none';
                                        ?>
                                        <a class="blog-thumbnail d-block" href="<?php the_permalink(); ?>"
                                           style="background-image: <?php echo $thumbnail; ?>"></a>
                                    <?php } ?>
                                    <time class="blog-datetime d-block text-uppercase"
                                          datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                    <h2 class="blog-title">
                                        <a class="blog-link" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                    </h2>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
