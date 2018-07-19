<?php
if (function_exists('rwmb_meta')) {
    $project = array(
        'address' => esc_html(rwmb_meta('project-address')),
        'distance' => esc_html(rwmb_meta('project-distance')),
        'latitude' => esc_html(rwmb_meta('project-latitude')),
        'longitude' => esc_html(rwmb_meta('project-longitude')),
        'zoom' => esc_html(rwmb_meta('project-zoom')),
    );

    $zoom = !empty($project['zoom']) ? $project['zoom'] : 10;
    $google_url = sprintf(
        'https://www.google.com/maps/dir/%1$s,%2$s/@%1$s,%2$s,%3$sz',
        $project['latitude'], $project['longitude'], $zoom
    );
    ?>
    <!-- Start Location -->
    <div class="location">
        <div class="location-map">
            <?php google_map(false); ?>
        </div>
        <div class="container location-box">
            <h2 class="text-center section-title">Рассположение <span class="highlight">обьекта</span></h2>
            <div class="feedback-box">
                <?php if (!empty($project['address'])) { ?>
                    <div class="box-group">
                        <i class="fas fa-map-marker-alt box-icon" aria-hidden="true"></i>
                        <div class="box-head text-uppercase">Адрес</div>
                        <div class="box-body"><?php echo $project['address']; ?></div>
                    </div>
                <?php }
                if (!empty($project['distance'])) { ?>
                    <div class="box-group">
                        <i class="fas fa-car box-icon" aria-hidden="true"></i>
                        <div class="box-head text-uppercase">Расстояние</div>
                        <div class="box-body"><?php echo $project['distance']; ?></div>
                    </div>
                <?php } ?>
                <div class="box-group mb-0">
                    <a class="button-medium" href="<?php echo esc_url($google_url); ?>" target="_blank">Проложить маршрут</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Location -->
<?php } ?>
