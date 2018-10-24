<?php
function cptui_register_my_cpts()
{

    /**
     * Post Type: Info.
     */

    $labels = array(
        "name" => __("Info", "brainworks"),
        "singular_name" => __("Info", "brainworks"),
    );

    $args = array(
        "label" => __("Info", "brainworks"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "info", "with_front" => true),
        "query_var" => true,
        "menu_icon" => "dashicons-info",
        "supports" => array("title", "editor", "thumbnail", "custom-fields"),
    );

    register_post_type("info", $args);

    /**
     * Post Type: Проекти.
     */

    $labels = array(
        "name" => __("Проекти", "brainworks"),
        "singular_name" => __("Проект", "brainworks"),
    );

    $args = array(
        "label" => __("Проекти", "brainworks"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "projects", "with_front" => true),
        "query_var" => true,
        "menu_icon" => "dashicons-portfolio",
        "supports" => array("title", "editor", "thumbnail", "excerpt", "custom-fields"),
    );

    register_post_type("projects", $args);

    /**
     * Post Type: Дома.
     */

    $labels = array(
        "name" => __("Дома", "brainworks"),
        "singular_name" => __("Дом", "brainworks"),
    );

    $args = array(
        "label" => __("Дома", "brainworks"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "house", "with_front" => true),
        "query_var" => true,
        "menu_icon" => "dashicons-admin-home",
        "supports" => array("title", "editor", "thumbnail"),
    );

    register_post_type("house", $args);
}

add_action('init', 'cptui_register_my_cpts');
