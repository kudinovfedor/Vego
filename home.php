<?php get_header(); ?>

<div class="sp-xs-2 sp-sm-2 sp-md-2 sp-lg-2 sp-xl-2"></div>
<h1 class="page-name"><?php single_post_title(); ?></h1>
<div class="sp-xs-2 sp-sm-2 sp-md-2 sp-lg-2 sp-xl-2"></div>

<?php
$args = array(
    'post_type' => 'info',
    'posts_per_page' => -1
);

$query = new WP_Query($args);

if ($query->have_posts()) { ?>

    <?php while ($query->have_posts()) {
        $query->the_post();

        $info = array();

        if (function_exists('rwmb_meta')) {
            $info['city'] = rwmb_meta('info-city');
            $info['price'] = rwmb_meta('info-price');
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
        ?>
        <div style="padding: 10px; display: inline-block; vertical-align: top; margin: 10px;">
            <h5><?php the_title() ?></h5>
            <?php if (has_post_thumbnail()) { ?>
                <figure>
                    <?php the_post_thumbnail(); ?>
                </figure>
            <?php } ?>

            <?php if (!empty($info['labels'])) { ?>
                <p>
                    <?php foreach ($info['labels'] as $label) {
                        echo $labels[$label] . '<br>';
                    } ?>
                </p>
            <?php } ?>

            <?php if (!empty($info['city'])) { ?>
                <p><?php echo esc_html($info['city']); ?></p>
            <?php } ?>

            <?php if (!empty($info['price'])) { ?>
                <p>от <?php echo esc_html($info['price']); ?> грн/1M<sup>2</sup></p>
            <?php } ?>

            <a href="<?php the_permalink() ?>">Подробнее</a>
        </div>
    <?php } ?>

    <?php wp_reset_postdata(); ?>

<?php } ?>

<hr>

<div class="maps"></div>

<hr>

<div>
    <p>Живи там где <br>хочешь ты</p>
    <p>Начинать свой день с чашки свежесваренного кофе у панорамного окна — бесценно. Любоваться окружающей природой, дышать свежим воздухом и гулять по утопающему в зелени парку. Выбери свое комфортное жилье и живи там где хочешь ты.</p>
</div>

<hr>

<ul>
    <li>﻿3500 м<sup>2</sup><br>Жилья построено</li>
    <li>﻿6 комплексов<br>Введено в эксплуатацию</li>
    <li>32<br>Семьи заселилось</li>
    <li>﻿3500 м<sup>2</sup><br>Жилья построено</li>
</ul>

<?php get_template_part('loops/content-2', get_post_format()); ?>

<?php get_footer(); ?>
