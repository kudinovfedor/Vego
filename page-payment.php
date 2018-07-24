<?php
/**
 * Template Name: Payment Page
 * Template Post Type: page
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) { ?>
    <div class="payment">
        <?php while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()) {
                $thumbnail = esc_url(get_the_post_thumbnail_url(null, 'full')); ?>
                <span class="payment-thumbnail" style="background-image: url('<?php echo $thumbnail; ?>');"></span>
            <?php } ?>
            <div class="container">
                <div class="payment-column">
                    <?php if (function_exists('kama_breadcrumbs')) {
                        kama_breadcrumbs(' &mdash; ');
                    } ?>
                    <article id="page-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                        <h1 class="text-uppercase section-headline"><?php the_title(); ?></h1>
                        <div style="max-height: 700px; overflow-y: auto;">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php } ?>

<?php get_footer(); ?>

