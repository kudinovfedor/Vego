<?php
/**
 * The Page Loop
 * =============
 */
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article id="post-<?php the_ID() ?>" <?php post_class('article') ?>>
        <?php if (has_post_thumbnail()) {
            $thumbnail = has_post_thumbnail()
                ? sprintf("url('%s')", esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')))
                : 'none';
            ?>
            <span class="blog-thumbnail blog-thumbnail-md d-block image-left"
                  style="background-image: <?php echo $thumbnail; ?>"></span>
        <?php } ?>
        <time class="blog-datetime d-block text-uppercase" datetime="<?php echo get_the_date('c'); ?>">
            <?php echo get_the_date(); ?>
        </time>
        <h1 class="blog-title text-uppercase"><?php the_title() ?></h1>
        <?php the_content() ?>
        <?php wp_link_pages(); ?>
    </article>
<?php endwhile; endif; ?>
