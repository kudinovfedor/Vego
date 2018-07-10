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
            <ul class="project-list">
                <?php while (have_posts()): the_post(); ?>
                    <article id="project-<?php the_ID() ?>" <?php post_class('project-item') ?>>
                        <?php if (has_post_thumbnail()) {
                            $thumbnail = has_post_thumbnail()
                                ? sprintf("url('%s')", esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                                : 'none';
                            ?>
                            <a class="project-thumbnail d-block" href="<?php the_permalink(); ?>"
                               style="background-image: <?php echo $thumbnail; ?>"></a>
                        <?php } ?>
                        <h2 class="project-title"><?php the_title() ?></h2>
                        <a class="project-link button-medium" href="<?php the_permalink(); ?>">Смотреть проект</a>
                    </article>
                <?php endwhile; ?>
            </ul>
        <?php } ?>
        <div class="text-center"><?php fk_pagination(); ?></div>
    </div>
</div>

<?php get_footer(); ?>
