<?php
function projects_get_meta_box($meta_boxes)
{
    $prefix = 'project-';

    $meta_boxes[] = array(
        'id' => 'project',
        'title' => esc_html__('Основные параметры', 'brainworks'),
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
                'id' => $prefix . 'completion-date',
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
            array(
                'id' => $prefix . 'logo',
                'type' => 'image_advanced',
                'name' => esc_html__('Логотип', 'brainworks'),
                'max_file_uploads' => 1,
                'max_status' => false,
            ),
            array(
                'id' => $prefix . 'latitude',
                'type' => 'text',
                'name' => esc_html__('Широта', 'brainworks'),
                'placeholder' => esc_html__('Latitude', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'longitude',
                'type' => 'text',
                'name' => esc_html__('Долгота', 'brainworks'),
                'placeholder' => esc_html__('Longitude', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'zoom',
                'type' => 'text',
                'name' => esc_html__('Зум', 'brainworks'),
                'placeholder' => esc_html__('10', 'brainworks'),
            ),
            array(
                'id' => $prefix . 'gallery',
                'type' => 'image_advanced',
                'name' => esc_html__('Галерея', 'brainworks'),
            ),
        ),
    );

    $spec_fields = array();

    for ($i = 1; $i < 17; $i++) {
        $spec_fields[] = array(
            'id' => 'heading-' . $i,
            'type' => 'heading',
            'name' => 'Спецификаия №' . $i,
        );

        $spec_fields[] = array(
            'id' => $prefix . 'spec-svg-icon-' . $i,
            'type' => 'text',
            'name' => esc_html__('SVG иконка', 'brainworks'),
            'desc' => 'SVG icons list (<b>bricks, facade, doors, windows, foundation, roof, gates, terrace</b>)',
        );

        $spec_fields[] = array(
            'id' => $prefix . 'spec-image-icon-' . $i,
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'max_status' => false,
            'name' => esc_html__('Иконка jpg, png формата', 'brainworks'),
        );

        $spec_fields[] = array(
            'id' => $prefix . 'spec-text-' . $i,
            'type' => 'text',
            'name' => esc_html__('Текст', 'brainworks'),
        );
    }

    $meta_boxes[] = array(
        'id' => 'spec',
        'title' => esc_html__('Спецификация поселка', 'brainworks'),
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => $spec_fields,
    );

    $philosophy_fields = array();

    for ($i = 1; $i < 9; $i++) {
        $philosophy_fields[] = array(
            'id' => 'heading_' . $i,
            'type' => 'heading',
            'name' => 'Блок №' . $i,
        );

        $philosophy_fields[] = array(
            'id' => $prefix . 'philosophy-image-' . $i,
            'type' => 'image_advanced',
            'name' => esc_html__('Изображение', 'brainworks'),
            'max_file_uploads' => 1,
            'max_status' => false,
        );

        $philosophy_fields[] = array(
            'id' => $prefix . 'philosophy-title-' . $i,
            'type' => 'text',
            'name' => esc_html__('Название', 'brainworks'),
        );

        $philosophy_fields[] = array(
            'id' => $prefix . 'philosophy-desc-' . $i,
            'type' => 'textarea',
            'name' => esc_html__('Описание', 'brainworks'),
        );
    }

    $meta_boxes[] = array(
        'id' => 'philosophy',
        'title' => esc_html__('Философия комфорта', 'brainworks'),
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => $philosophy_fields,
    );

    $meta_boxes[] = array(
        'id' => 'visit',
        'title' => esc_html__('Блок заявки на просмотр', 'brainworks'),
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'visit-image',
                'type' => 'image_advanced',
                'name' => esc_html__('Фон', 'brainworks'),
                'max_file_uploads' => 1,
                'max_status' => false,
            ),
            array(
                'id' => $prefix . 'visit-title',
                'type' => 'textarea',
                'name' => esc_html__('Название', 'brainworks'),
                'placeholder' => 'Побывайте в «Балтик Хаус», чтобы:',
            ),
            array(
                'id' => $prefix . 'visit-list',
                'type' => 'text',
                'name' => esc_html__( 'Список', 'metabox-online-generator' ),
                'size' => 75,
                'clone' => true,
                'sort_clone' => true,
                'add_button' => esc_html__( 'Добавить еще', 'metabox-online-generator' ),
            ),
            array(
                'id' => $prefix . 'visit-form',
                'name' => esc_html__( 'Form shortcode', 'metabox-online-generator' ),
                'type' => 'text',
            ),

        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'projects_get_meta_box');