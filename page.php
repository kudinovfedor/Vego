<?php get_header(); ?>

<div class="page-wrapper container">
    <div class="section-content">
        <div class="mb-20">
            <?php if (function_exists('kama_breadcrumbs')) {
                kama_breadcrumbs(' &mdash; ');
            } ?>
        </div>
        <?php get_template_part('loops/content', 'page'); ?>
    </div>
</div>

<?php get_footer(); ?>
