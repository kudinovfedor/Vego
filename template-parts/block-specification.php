<?php
if (function_exists('rwmb_meta')) {
    $specification = [];

    for ($i = 1; $i < 17; $i++) {
        $specification[] = array(
            'svg-icon' => esc_html(rwmb_meta('project-spec-svg-icon-' . $i)),
            'image-icon' => rwmb_meta('project-spec-image-icon-' . $i),
            'text' => strip_tags(rwmb_meta('project-spec-text-' . $i), '<br><sup>'),
        );
    }

    $icons = array(
        'bricks' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'bricks'),
        'facade' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'facade'),
        'doors' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'doors'),
        'windows' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'windows'),
        'foundation' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'foundation'),
        'roof' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'roof'),
        'gates' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'gates'),
        'terrace' => array('width' => '35', 'height' => '35', 'color' => '#ff9f00', 'href' => 'terrace'),
    );
    ?>
    <!-- Start Specification -->
    <div class="specification">
        <div class="container text-center">
            <h2 class="section-title with-divider">Спецификация <span class="highlight">поселка</span></h2>
            <ul class="specification-list">
                <?php foreach ($specification as $key => $item) {
                    if (empty($item['text'])) {
                        continue;
                    } ?>
                    <li class="specification-item">
                        <span class="specification-icon">
                            <?php if (!empty($item['svg-icon']) && array_key_exists($item['svg-icon'], $icons)) {
                                $icon = $icons[$item['svg-icon']];
                                $width = $icon['width'];
                                $height = $icon['height'];
                                $color = $icon['color'];
                                $name = $icon['href'];
                                ?>
                                <svg class="svg-icon" fill="<?php echo $color; ?>"
                                     width="<?php echo $width; ?>" height="<?php echo $height; ?>">
                                    <use xlink:href="#<?php echo $name; ?>"></use>
                                </svg>
                            <?php }
                            if (empty($item['svg-icon']) && !empty($item['image-icon'])) {
                                $image = reset($item['image-icon']); ?>
                                <img src="<?php echo esc_url($image['full_url']); ?>"
                                     alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php } ?>
                        </span>
                        <?php echo $item['text']; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- End Specification -->
<?php } ?>
