<?php get_header(); ?>

<div class="page-wrapper container">

    <?php
    $args = array(
        'post_type' => 'info',
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) { ?>
        <div class="info">
            <ul class="info-list">
                <?php while ($query->have_posts()) {
                    $query->the_post();

                    $info = array();

                    if (function_exists('rwmb_meta')) {
                        $info['city'] = esc_html(rwmb_meta('info-city'));
                        $info['price'] = esc_html(number_format(rwmb_meta('info-price'), 0, '.', ' '));
                        $info['labels'] = rwmb_meta('info-labels');

                        $labels = array(
                            'commissioned' => 'Введен в эксплуатацию',
                            'finished' => 'Завершен',
                            'credit' => 'Кредит',
                            'last-houses' => 'Последние дома',
                            'installments' => 'Рассрочка',
                        );
                    }
                    //dump($info);
                    $thumbnail = has_post_thumbnail()
                        ? sprintf("url('%s')", esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                        : 'none';
                    ?>
                    <li id="info-<?php the_ID(); ?>" <?php post_class('info-item'); ?>>
                        <div class="info-box" style="background-image: <?php echo $thumbnail; ?>;">
                            <?php if (!empty($info['labels'])) { ?>
                                <div class="info-labels text-right text-uppercase text-bold">
                                    <?php foreach ($info['labels'] as $label) { ?>
                                        <span class="label label-<?php echo esc_attr($label); ?>"><?php echo esc_html($labels[$label]); ?></span>
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
                                <span class="info-price d-inline-block">от
                                <span class="info-price-value"><?php echo $info['price']; ?></span>
                                грн/1M<sup>2</sup>
                            </span>
                            <?php } ?>
                            <a class="info-link text-uppercase" href="<?php the_permalink() ?>">Подробнее</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php } ?>

    <hr>

    <div class="maps"></div>

    <hr>

    <div>
        <p>Живи там где <br>хочешь ты</p>
        <p>Начинать свой день с чашки свежесваренного кофе у панорамного окна — бесценно. Любоваться окружающей
            природой,
            дышать свежим воздухом и гулять по утопающему в зелени парку. Выбери свое комфортное жилье и живи там где
            хочешь
            ты.</p>
    </div>

    <hr>

    <ul>
        <li>﻿3500 м<sup>2</sup><br>Жилья построено</li>
        <li>﻿6 комплексов<br>Введено в эксплуатацию</li>
        <li>32<br>Семьи заселилось</li>
        <li>﻿3500 м<sup>2</sup><br>Жилья построено</li>
    </ul>

    <?php get_template_part('loops/content-2', get_post_format()); ?>

</div>

<?php get_footer(); ?>