<?php
/**
 * Template Name: Contacts Page
 * Template Post Type: page
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) { ?>
    <div class="contacts">
        <?php while (have_posts()) : the_post(); ?>
            <div class="contacts-map">
                <?php google_map(array(
                    'marker' => array(
                        'icon' => get_template_directory_uri() . '/assets/img/marker-without-shadow.png',
                    ),
                    'dimensions' => false,
                )); ?>
            </div>
            <div class="container contacts-box">
                <article id="page-<?php the_ID(); ?>" <?php post_class('section-content article'); ?>>
                    <div class="text-center">
                        <?php if (function_exists('kama_breadcrumbs')) {
                            kama_breadcrumbs(' &mdash; ');
                        } ?>
                        <h1 class="text-uppercase section-headline"><?php the_title(); ?></h1>
                    </div>
                    <?php
                    $address = get_theme_mod('bw_additional_address');
                    $time_work = get_theme_mod('bw_additional_time_work');
                    if (!empty($address) || !empty($time_work)) { ?>
                        <div class="box-group">
                            <i class="fas fa-map-marker-alt box-icon" aria-hidden="true"></i>
                            <div class="box-head text-uppercase">Адрес</div>
                            <div class="box-body">
                                <?php echo strip_tags($address, '<br>'); ?>
                                <br>
                                <?php echo strip_tags($time_work, '<sup>'); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="box-group">
                        <i class="fas fa-map-marker-alt box-icon" aria-hidden="true"></i>
                        <div class="box-head text-uppercase">Контактная информация</div>
                        <div class="box-body mb-20">
                            <?php if (has_phones()) {
                                foreach (get_phones() as $key => $phone) { ?>
                                    <a href="tel:<?php echo esc_attr(get_phone_number($phone)); ?>">
                                        <?php echo esc_html($phone); ?>
                                    </a>
                                    <br>
                                <?php }
                            } ?>
                            <?php if ($email = get_theme_mod('bw_additional_email')) { ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php the_content(); ?>
                    <div class="feedback-box">
                        <div class="feedback-headline text-center text-uppercase">Обратная связь</div>
                        <form action="<?php echo esc_url( home_url() . '/wp-json/brainworks/contact' ); ?>" method="post" class="feedback-form">
                            <div class="form-row">
                                <div class="alert alert-danger" style="display: none;"></div>
                                <div class="alert alert-success" style="display: none;"></div>
                            </div>
                            <div class="form-row form-columns">
                                <div class="form-column">
                                    <input class="form-field" type="text" name="name"
                                           placeholder="Введите Ваше имя" required>
                                </div>
                                <div class="form-column">
                                    <input class="form-field" type="tel" name="tel"
                                           placeholder="Введите номер телефона" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <textarea class="form-field" name="message"
                                          placeholder="Введите текст сообщения"></textarea>
                            </div>
                            <div class="form-row form-columns">
                                <div class="form-column pull-right">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="agree" value="yes" checked>
                                        <span class="checkbox"></span>
                                        Я согласен на обработку моих персональных данных
                                    </label>
                                </div>
                                <div class="form-column">
                                    <button class="button-medium" type="submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </article>
            </div>
        <?php endwhile; ?>
    </div>
<?php } ?>

<?php get_footer(); ?>

