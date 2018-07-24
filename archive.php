<?php get_header(); ?>

<div class="page-wrapper container">
    <div class="section-content">
        <div class="text-center">
            <?php if (function_exists('kama_breadcrumbs')) {
                kama_breadcrumbs(' &mdash; ');
            } ?>
            <h1 class="text-uppercase section-headline"><?php single_post_title(); ?></h1>
        </div>
        <?php if (have_posts()) { ?>
            <div class="blog-list">
                <?php while (have_posts()): the_post(); ?>
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
            </div>
        <?php } ?>
        <div class="text-center"><?php fk_pagination(); ?></div>
    </div>
</div>

<?php get_footer(); ?>

