<?php
if (function_exists('rwmb_meta')) {
    $visit = array(
        'title' => rwmb_meta('project-visit-title'),
        'list' => rwmb_meta('project-visit-list'),
        'image' => rwmb_meta('project-visit-image'),
        'form' => rwmb_meta('project-visit-form'),
    );
    $image = reset($visit['image']);
    $bg = !empty($image) ? esc_url($image['full_url']) : esc_url(get_template_directory_uri() . '/assets/img/application-bg.jpg');
    ?>
    <!-- Start Application -->
    <div class="application" style="background-image: url('<?php echo $bg; ?>')">
        <div class="container">
            <div class="application-content">
                <?php if (!empty($visit['title'])) { ?>
                    <div class="application-action text-bold">
                        <?php echo strip_tags($visit['title'], '<br><span>'); ?>
                    </div>
                <?php }
                if (!empty($visit['list'])) { ?>
                    <ul class="application-list">
                        <?php foreach ($visit['list'] as $item) { ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
            <div class="application-form">
                <div class="feedback-box">
                    <div class="feedback-headline text-center text-uppercase">Заявка на перегляд</div>
                    <?php if (empty($visit['form'])) { ?>
                        <form action="./" method="post" class="feedback-form">
                            <div class="form-row">
                                <input class="form-field" type="text" name="name" placeholder="Введіть ваше ім'я">
                            </div>
                            <div class="form-row">
                                <input class="form-field" type="tel" name="tel" placeholder="Введіть номер телефону">
                            </div>
                            <div class="form-row">
                                <label class="custom-checkbox">
                                    <input type="checkbox" name="agree" value="yes" checked="">
                                    <span class="checkbox"></span>
                                    Я згоден на обробку моїх персональних даних
                                </label>
                            </div>
                            <button class="button-medium" type="submit">Відправити</button>
                        </form>
                    <?php } else {
                        echo do_shortcode($visit['form']);
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Application -->
<?php } ?>
