<?php
if (function_exists('rwmb_meta')) {
    $philosophy = [];
    for ($i = 1; $i < 9; $i++) {
        $philosophy[] = array(
            'image' => rwmb_meta('project-philosophy-image-' . $i),
            'title' => esc_html(rwmb_meta('project-philosophy-title-' . $i)),
            'desc' => esc_html(rwmb_meta('project-philosophy-desc-' . $i)),
        );
    }
    ?>
    <!-- Start Philosophy -->
    <div class="philosophy">
        <h2 class="section-title with-divider text-center">Философия <span class="highlight">комфорта</span></h2>
        <ul class="philosophy-list">
            <?php foreach ($philosophy as $key => $item) {
                if (empty($item['image']) || empty($item['title']) || empty($item['desc'])) {
                    continue;
                }
                $n = $key % 2;
                $image = reset($item['image']);
                $bg = !empty($image) ? sprintf("url('%s')", $image['full_url']) : 'none';
                ?>
                <li class="philosophy-item">
                    <span class="philosophy-thumbnail d-block <?php echo $n === 0 ? 'on-left' : 'on-right'; ?>"
                          style="background-image: <?php echo $bg; ?>;"></span>
                    <div class="philosophy-box <?php echo $n === 0 ? 'on-right' : 'on-left'; ?>">
                        <div class="philosophy-content">
                            <?php if (!empty($item['title'])) { ?>
                                <h3 class="philosophy-title text-uppercase"><?php echo $item['title']; ?></h3>
                            <?php }
                            if (!empty($item['desc'])) { ?>
                                <p class="philosophy-desc"><?php echo $item['desc']; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- End Philosophy -->
<?php } ?>
