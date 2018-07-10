<?php get_header(); ?>

<div class="page-wrapper container">
    <div class="section-content">
        <div class="text-center mb-20">
            <?php if (function_exists('kama_breadcrumbs')) {
                kama_breadcrumbs(' &mdash; ');
            } ?>
        </div>
        <?php get_template_part('loops/content', 'single'); ?>
        <?php //get_template_part('template-parts/block', 'latest'); ?>
    </div>
</div>

<?php get_footer(); ?>
