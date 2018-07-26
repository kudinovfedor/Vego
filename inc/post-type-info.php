<?php

function fk_info_get_meta_box($meta_boxes)
{
    $prefix = 'info-';

    $meta_boxes[] = array(
        'id' => 'info',
        'title' => esc_html__('Additional', 'brainworks'),
        'post_types' => array('info'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'city',
                'type' => 'text',
                'name' => esc_html__('City', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'link',
                'type' => 'url',
                'name' => esc_html__('Подробнее', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'price',
                'type' => 'number',
                'name' => esc_html__('Price', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'label-blue',
                'type' => 'text',
                'name' => esc_html__('Label (синий)', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'label-green',
                'type' => 'text',
                'name' => esc_html__('Label (зеленый)', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'label-orange',
                'type' => 'text',
                'name' => esc_html__('Label (оранжевый)', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'label-red',
                'type' => 'text',
                'name' => esc_html__('Label (красный)', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'label-purple',
                'type' => 'text',
                'name' => esc_html__('Label (фиолетовый)', 'brainworks'),
            ),
        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'fk_info_get_meta_box');