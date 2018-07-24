<?php
function house_get_meta_box($meta_boxes)
{
    $prefix = 'house-';

    $post_type_projects = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'projects',
        'post_status' => 'publish',
        'orderby' => 'title '
    ));
    $projects = array();
    foreach ($post_type_projects as $one) {
        $projects[$one->ID] = $one->post_title;
    }

    $meta_boxes[] = array(
        'id' => 'main',
        'title' => esc_html__('Основные параметры', 'brainworks'),
        'post_types' => array('house'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'project',
                'type' => 'select_advanced',
                'name' => esc_html__('Проект', 'brainworks'),
                'options' => $projects,
                'placeholder' => 'Выюерите проект к которому хотите привязать дома',
            ),
            array(
                'id' => $prefix . 'status',
                'type' => 'checkbox',
                'name' => esc_html__('Продано', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'type',
                'type' => 'text',
                'name' => esc_html__('Тип', 'brainworks'),
                'placeholder' => esc_html__('Terrace apartments', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'total-square',
                'type' => 'text',
                'name' => esc_html__('Общая площадь', 'brainworks'),
                'placeholder' => esc_html__('131,3 м<sup>2</sup>', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'main-options',
                'type' => 'fieldset_text',
                'name' => esc_html__('Основные', 'brainworks'),
                'rows' => 2,
                'options' => array(
                    'name' => 'Name',
                    'value' => 'Value',
                ),
                'clone' => true,
                'sort_clone' => true,
                'add_button' => esc_html__('Add more', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'extra-options',
                'type' => 'fieldset_text',
                'name' => esc_html__('Дополнительно', 'brainworks'),
                'rows' => 2,
                'options' => array(
                    'name' => 'Name',
                    'value' => 'Value',
                ),
                'clone' => true,
                'sort_clone' => true,
                'add_button' => esc_html__('Add more', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'gallery',
                'type' => 'image_advanced',
                'name' => esc_html__('Галерея', 'brainworks'),
                'max_file_uploads' => 5,
                'max_status' => true,
            ),
        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'house_get_meta_box');