<?php
function projects_get_meta_box($meta_boxes)
{
    $prefix = 'project-';

    $meta_boxes[] = array(
        'id' => 'project',
        'title' => 'Основные параметры',
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'house-headline',
                'type' => 'text',
                'name' => 'Название блока c домами',
                'placeholder' => 'Дуплексы',
            ),
            array(
                'id' => $prefix . 'status',
                'type' => 'text',
                'name' => 'Статус',
                'placeholder' => 'Построен',
            ),
            array(
                'id' => $prefix . 'completion-date',
                'type' => 'text',
                'name' => 'Дата сдачи',
                'placeholder' => 'III квартал 2018',
            ),
            array(
                'id' => $prefix . 'address',
                'type' => 'text',
                'name' => 'Адрес',
                'placeholder' => 'Киевская область,  г.Борисполь, ул. Коцюбинского 17',
            ),
            array(
                'id' => $prefix . 'distance',
                'type' => 'text',
                'name' => 'Расстояние',
                'placeholder' => '20,3 км до М Бориспольская',
            ),
            array(
                'id' => $prefix . 'price',
                'type' => 'number',
                'name' => 'Цена',
                'placeholder' => '10 000',
            ),
            array(
                'id' => $prefix . 'type',
                'type' => 'text',
                'name' => 'Тип',
                'placeholder' => 'Коттеджный двор',
            ),
            array(
                'id' => $prefix . 'logo',
                'type' => 'image_advanced',
                'name' => 'Логотип',
                'max_file_uploads' => 1,
                'max_status' => false,
            ),
            array(
                'id' => $prefix . 'latitude',
                'type' => 'text',
                'name' => 'Широта',
                'placeholder' => 'Latitude',
            ),
            array(
                'id' => $prefix . 'longitude',
                'type' => 'text',
                'name' => 'Долгота',
                'placeholder' => 'Longitude',
            ),
            array(
                'id' => $prefix . 'zoom',
                'type' => 'text',
                'name' => 'Зум',
                'placeholder' => '10',
            ),
            array(
                'id' => $prefix . 'gallery',
                'type' => 'image_advanced',
                'name' => 'Галерея',
            ),
        ),
    );

    $spec_fields = array();

    $spec_fields[] = array(
        'id' => $prefix . 'spec-headline',
        'type' => 'text',
        'name' => 'Название блока',
        'placeholder' => 'Спецификация <span class="highlight">поселка</span>',
    );

    for ($i = 1; $i < 17; $i++) {
        $spec_fields[] = array(
            'id' => 'heading-' . $i,
            'type' => 'heading',
            'name' => 'Спецификаия №' . $i,
        );

        $spec_fields[] = array(
            'id' => $prefix . 'spec-svg-icon-' . $i,
            'type' => 'text',
            'name' => 'SVG иконка',
            'desc' => 'SVG icons list (<b>roller, stairs, gas-pipe, electric-meter, plug, heater-radiator, grill, heater, paving, bricks, facade, doors, windows, foundation, roof, gates, terrace</b>)',
        );

        $spec_fields[] = array(
            'id' => $prefix . 'spec-image-icon-' . $i,
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'max_status' => false,
            'name' => 'Иконка jpg, png формата',
        );

        $spec_fields[] = array(
            'id' => $prefix . 'spec-text-' . $i,
            'type' => 'text',
            'name' => 'Текст',
        );
    }

    $meta_boxes[] = array(
        'id' => 'spec',
        'title' => 'Спецификация поселка',
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => $spec_fields,
    );

    $philosophy_fields = array();

    $philosophy_fields[] = array(
        'id' => $prefix . 'philosophy-headline',
        'type' => 'text',
        'name' => 'Название блока',
        'placeholder' => 'Философия <span class="highlight">комфорта</span>',
    );

    for ($i = 1; $i < 9; $i++) {
        $philosophy_fields[] = array(
            'id' => 'heading_' . $i,
            'type' => 'heading',
            'name' => 'Блок №' . $i,
        );

        $philosophy_fields[] = array(
            'id' => $prefix . 'philosophy-image-' . $i,
            'type' => 'image_advanced',
            'name' => 'Изображение',
            'max_file_uploads' => 1,
            'max_status' => false,
        );

        $philosophy_fields[] = array(
            'id' => $prefix . 'philosophy-title-' . $i,
            'type' => 'text',
            'name' => 'Название',
        );

        $philosophy_fields[] = array(
            'id' => $prefix . 'philosophy-desc-' . $i,
            'type' => 'textarea',
            'name' => 'Описание',
        );
    }

    $meta_boxes[] = array(
        'id' => 'philosophy',
        'title' => 'Философия комфорта',
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => $philosophy_fields,
    );

    $meta_boxes[] = array(
        'id' => 'visit',
        'title' => 'Блок заявки на просмотр',
        'post_types' => array('projects'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'visit-image',
                'type' => 'image_advanced',
                'name' => 'Фон',
                'max_file_uploads' => 1,
                'max_status' => false,
            ),
            array(
                'id' => $prefix . 'visit-title',
                'type' => 'textarea',
                'name' => 'Название',
                'placeholder' => 'Побывайте в «Балтик Хаус», чтобы:',
            ),
            array(
                'id' => $prefix . 'visit-list',
                'type' => 'text',
                'name' => 'Список',
                'size' => 75,
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Добавить еще',
            ),
            array(
                'id' => $prefix . 'visit-form',
                'name' => 'Form shortcode',
                'type' => 'text',
            ),

        ),
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'projects_get_meta_box');