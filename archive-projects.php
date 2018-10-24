<?php get_header(); ?>

<div class="page-wrapper container">
    <div class="section-content">
        <div class="text-center mb-20">
            <?php if (function_exists('kama_breadcrumbs')) {
                kama_breadcrumbs(' &mdash; ');
            } ?>
            <h1 class="text-uppercase section-headline"><?php post_type_archive_title(); ?></h1>
        </div>
        <?php if (have_posts()) { ?>
            <div class="project-list">
                <?php while (have_posts()): the_post();
                    $project = array();
                    if (function_exists('rwmb_meta')) {
                        $project = array(
                            'logo' => rwmb_meta('project-logo', array('size' => 'thumbnail', 'limit' => 1)),
                            'type' => esc_html(rwmb_meta('project-type')),
                            'price' => '',
                            'date' => esc_html(rwmb_meta('project-completion-date')),
                            'status' => esc_html(rwmb_meta('project-status')),
                            'address' => esc_html(rwmb_meta('project-address')),
                            'distance' => esc_html(rwmb_meta('project-distance')),
                        );

                        if(!empty(rwmb_meta('project-price'))) {
                            $project['price'] = esc_html((float)number_format(rwmb_meta('project-price'), 0, '.', ' '));
                        }
                    }
                    ?>
                    <article id="project-<?php the_ID() ?>" <?php post_class('project-item') ?>>
                        <?php if (has_post_thumbnail()) {
                            $thumbnail = has_post_thumbnail()
                                ? sprintf("url('%s')", esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                                : 'none';
                            ?>
                            <a class="project-thumbnail d-block" href="<?php the_permalink(); ?>"
                               style="background-image: <?php echo $thumbnail; ?>"></a>
                        <?php } ?>
                        <div class="project-header">
                            <?php if (!empty($project['type'])) { ?>
                                <div class="project-type text-uppercase text-extrabold"><?php echo $project['type']; ?></div>
                            <?php } ?>
                            <?php if (!empty($project['logo'])) {
                                $logo = reset($project['logo']);
                                ?>
                                <img class="project-logo" src="<?php echo esc_attr(esc_url($logo['url'])); ?>"
                                     alt="<?php echo esc_attr($logo['alt']); ?>">
                            <?php } ?>
                            <h2 class="project-title"><?php the_title() ?></h2>
                        </div>
                        <div class="project-info">
                            <div class="project-side-left">
                                <?php if (!empty($project['price'])) { ?>
                                    <span class="project-price">
                                        від
                                        <span class="project-price-value text-bold"><?php echo $project['price']; ?></span>
                                        USD/м<sup>2</sup>
                                    </span>
                                <?php } ?>
                                <a class="project-link button-medium button-outline" href="<?php the_permalink(); ?>">Дивитися проект</a>
                            </div>
                            <div class="project-side-right">
                                <ul class="project-details">
                                    <?php if (!empty($project['status'])) { ?>
                                        <li>Статус: <span><?php echo $project['status']; ?></span></li>
                                    <?php } ?>
                                    <?php if (!empty($project['date'])) { ?>
                                        <li>Дата здачі: <span><?php echo $project['date']; ?></span></li>
                                    <?php } ?>
                                    <?php if (!empty($project['address'])) { ?>
                                        <li>Адреса: <span><?php echo $project['address']; ?></span></li>
                                    <?php } ?>
                                    <?php if (!empty($project['distance'])) { ?>
                                        <li>Відстань: <span><?php echo $project['distance']; ?></span></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </article>
                <?php endwhile; ?>
            </div>
        <?php } ?>
        <div class="text-center"><?php fk_pagination(); ?></div>
    </div>
</div>

<?php get_footer(); ?>
