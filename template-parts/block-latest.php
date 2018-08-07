<div class="blog-latest">
    <h2 class="text-center blog-headline">Актуальні <span>новини</span></h2>
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => array(get_queried_object_id()),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) { ?>
        <ul class="blog-list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article id="blog-<?php the_ID() ?>" <?php post_class('blog-item') ?>>
                    <?php if (has_post_thumbnail()) {
                        $thumbnail = has_post_thumbnail()
                            ? sprintf("url('%s')", esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                            : 'none';
                        ?>
                        <a class="blog-thumbnail d-block" href="<?php the_permalink(); ?>"
                           style="background-image: <?php echo $thumbnail; ?>"></a>
                    <?php } ?>
                    <time class="blog-datetime d-block text-uppercase" datetime="<?php echo get_the_date('c'); ?>">
                        <?php echo get_the_date(); ?>
                    </time>
                    <h2 class="blog-title">
                        <a class="blog-link" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                    </h2>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    <?php } ?>
</div>