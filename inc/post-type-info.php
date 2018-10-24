<?php

function fk_info_get_meta_box($meta_boxes)
{
    $prefix = 'info-';

    $meta_boxes[] = array(
        'id' => 'info',
        'title' => 'Additional',
        'post_types' => array('info'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'city',
                'type' => 'text',
                'name' => 'City',
            ),
            array(
                'id' => $prefix . 'link',
                'type' => 'url',
                'name' => 'Подробнее',
            ),
            array(
                'id' => $prefix . 'price',
                'type' => 'text',
                'name' => 'Price',
            ),
            array(
                'id' => $prefix . 'label-blue',
                'type' => 'text',
                'name' => 'Label (синий)',
            ),
            array(
                'id' => $prefix . 'label-green',
                'type' => 'text',
                'name' => 'Label (зеленый)',
            ),
            array(
                'id' => $prefix . 'label-orange',
                'type' => 'text',
                'name' => 'Label (оранжевый)',
            ),
            array(
                'id' => $prefix . 'label-red',
                'type' => 'text',
                'name' => 'Label (красный)',
            ),
            array(
                'id' => $prefix . 'label-purple',
                'type' => 'text',
                'name' => 'Label (фиолетовый)',
            ),
        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'fk_info_get_meta_box');
