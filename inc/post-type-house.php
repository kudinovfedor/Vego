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
        'title' => 'Основные параметры',
        'post_types' => array('house'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'project',
                'type' => 'select_advanced',
                'name' => 'Проект',
                'options' => $projects,
                'placeholder' => 'Выберите проект к которому хотите привязать дома',
            ),
            array(
                'id' => $prefix . 'status',
                'type' => 'checkbox',
                'name' => 'Продано',
            ),
            array(
                'id' => $prefix . 'type',
                'type' => 'text',
                'name' => 'Тип',
                'placeholder' => 'Terrace apartments',
            ),
            array(
                'id' => $prefix . 'total-square',
                'type' => 'text',
                'name' => 'Общая площадь',
                'placeholder' => '131,3 м<sup>2</sup>',
            ),
            array(
                'id' => $prefix . 'main-options',
                'type' => 'fieldset_text',
                'name' => 'Основные',
                'rows' => 2,
                'options' => array(
                    'name' => 'Name',
                    'value' => 'Value',
                ),
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Add more',
            ),
            array(
                'id' => $prefix . 'extra-options',
                'type' => 'fieldset_text',
                'name' => 'Дополнительно',
                'rows' => 2,
                'options' => array(
                    'name' => 'Name',
                    'value' => 'Value',
                ),
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Add more',
            ),
            array(
                'id' => $prefix . 'gallery',
                'type' => 'image_advanced',
                'name' => 'Галерея',
                'max_file_uploads' => 5,
                'max_status' => true,
            ),
        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'house_get_meta_box');