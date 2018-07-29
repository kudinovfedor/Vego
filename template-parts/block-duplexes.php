<!-- Start Duplexes -->
<div class="duplexes">
    <div class="container">
        <?php
        $headline = 'Дуплексы';

        if (function_exists('rwmb_meta')) {
            $headline = rwmb_meta('project-house-headline');
            $headline = !empty($headline) ? $headline : 'Дуплексы';
        } ?>
        <h2 class="section-title with-divider text-center"><?php echo $headline; ?></h2>
        <?php
        global $post;
        $post_id = $post->ID;
        $args = array(
            'post_type' => 'house',
            'posts_per_page' => -1,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'house-project',
                    'value' => $post_id
                )
            )
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?>
            <ul class="house-list">
                <?php while ($query->have_posts()) {
                    $query->the_post();
                    $house = array(
                        'project' => rwmb_meta('house-project'),
                        'type' => esc_html(rwmb_meta('house-type')),
                        'status' => rwmb_meta('house-status'),
                        'square' => rwmb_meta('house-total-square'),
                        'main-options' => rwmb_meta('house-main-options'),
                        'extra-options' => rwmb_meta('house-extra-options'),
                        'gallery' => rwmb_meta('house-gallery'),
                    );
                    $status = $house['status'];
                    ?>
                    <li class="house-item">
                        <div class="house-header">
                            <?php if (!empty($house['type'])) { ?>
                                <div class="house-type text-uppercase text-bold"><?php echo $house['type']; ?></div>
                            <?php }
                            if (!empty($house['square'])) { ?>
                                <div class="house-square text-right">
                                    <span class="highlight"><?php echo $house['square']; ?></span>
                                    Общая площадь
                                </div>
                            <?php } ?>
                        </div>
                        <div class="house-body">
                            <div class="house-preview <?php echo $status ? 'house-preview--sold' : ''; ?>">
                                <?php if (!empty($house['gallery'])) {
                                    if ($status) { ?>
                                        <div class="house-status">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/img/sold.png'; ?>"
                                                 alt="Продано">
                                        </div>
                                    <?php } ?>
                                    <div class="js-house-gallery">
                                        <?php foreach ($house['gallery'] as $item) { ?>
                                            <span class="house-thumbnail"
                                                  style="background-image: url('<?php echo esc_url($item['full_url']); ?>');"></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="house-gallery-nav"></div>
                            <div class="house-main">
                                <div class="house-content">
                                    <?php the_content(); ?>
                                    <?php if (!$status) { ?>
                                        <button class="button-medium js-house-price" type="button">Узнать стоимость
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="house-details">
                                    <?php if (!empty($house['main-options'])) { ?>
                                        <ul>
                                            <?php foreach ($house['main-options'] as $item) { ?>
                                                <li>
                                                    <span><?php echo esc_html($item['name']); ?></span>
                                                    <b><?php echo $item['value']; ?></b>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php }
                                    if (!empty($house['extra-options'])) { ?>
                                        <div class="text-uppercase text-bold mb-10" style="letter-spacing: 2.1px;">
                                            Дополнительно
                                        </div>
                                        <ul>
                                            <?php foreach ($house['extra-options'] as $item) { ?>
                                                <li>
                                                    <span><?php echo esc_html($item['name']); ?></span>
                                                    <b><?php echo $item['value']; ?></b>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        <?php } ?>
    </div>
</div>
<!-- End Duplexes -->
