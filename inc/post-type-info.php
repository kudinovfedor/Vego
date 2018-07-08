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
                'id' => $prefix . 'price',
                'type' => 'number',
                'name' => esc_html__('Price', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'labels',
                'name' => esc_html__( 'Labels', 'brainworks' ),
                'type' => 'select_advanced',
                'placeholder' => esc_html__( 'Select a Label', 'brainworks' ),
                'options' => array(
                    'commissioned' => 'Введен в эксплуатацию',
                    'finished' => 'Завершен',
                    'credit' => 'Кредит',
                    'last-houses' => 'Последние дома',
                    'installments' => 'Рассрочка',
                ),
                'multiple' => true,
            ),
        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'fk_info_get_meta_box');