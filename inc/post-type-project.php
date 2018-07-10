<?php
function projects_get_meta_box($meta_boxes)
{
    $prefix = 'project-';

    $meta_boxes[] = array(
        'id' => 'project',
        'title' => esc_html__('Additional', 'brainworks'),
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'status',
                'type' => 'text',
                'name' => esc_html__('Статус', 'brainworks'),
                'placeholder' => esc_html__('Построен', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'ompletion-date',
                'type' => 'text',
                'name' => esc_html__('Дата сдачи', 'brainworks'),
                'placeholder' => esc_html__('III квартал 2018', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'address',
                'type' => 'text',
                'name' => esc_html__('Адрес', 'brainworks'),
                'placeholder' => esc_html__('Киевская область,  г.Борисполь, ул. Коцюбинского 17', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'distance',
                'type' => 'text',
                'name' => esc_html__('Расстояние', 'brainworks'),
                'placeholder' => esc_html__('20,3 км до М Бориспольская', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'price',
                'type' => 'number',
                'name' => esc_html__('Цена', 'brainworks'),
                'placeholder' => esc_html__('10 000', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'type',
                'type' => 'text',
                'name' => esc_html__('Тип', 'brainworks'),
                'placeholder' => esc_html__('Коттеджный двор', 'brainworks'),
            ),
        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'projects_get_meta_box');