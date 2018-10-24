<?php get_header(); ?>
<?php //get_header('projects'); ?>

<div class="page-wrapper">
    <?php
    $project = array(
        'logo' => rwmb_meta('project-logo', array('size' => 'thumbnail', 'limit' => 1)),
        'type' => esc_html(rwmb_meta('project-type')),
        'price' => '',
        'date' => esc_html(rwmb_meta('project-completion-date')),
        'status' => esc_html(rwmb_meta('project-status')),
        'address' => esc_html(rwmb_meta('project-address')),
        'distance' => esc_html(rwmb_meta('project-distance')),
        'latitude' => esc_html(rwmb_meta('project-latitude')),
        'longitude' => esc_html(rwmb_meta('project-longitude')),
        'gallery' => rwmb_meta('project-gallery'),
    );

    if(!empty(rwmb_meta('project-price'))) {
        $project['price'] = esc_html((float)number_format(rwmb_meta('project-price'), 0, '.', ' '));
    }
    ?>

    <?php get_template_part('template-parts/block', 'specification'); ?>
    <?php get_template_part('template-parts/block', 'philosophy'); ?>
    <?php get_template_part('template-parts/block', 'duplexes'); ?>
    <?php get_template_part('template-parts/block', 'gallery'); ?>
    <?php get_template_part('template-parts/block', 'location'); ?>
    <?php get_template_part('template-parts/block', 'application'); ?>
</div>

<?php get_footer(); ?>
