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
            <span class="contacts-map">
                <?php google_map(false); ?>
            </span>
            <div class="container contacts-box">
                <article id="page-<?php the_ID(); ?>" <?php post_class('section-content article'); ?>>
                    <div class="text-center">
                        <?php if (function_exists('kama_breadcrumbs')) {
                            kama_breadcrumbs(' &mdash; ');
                        } ?>
                        <h1 class="text-uppercase section-headline"><?php the_title(); ?></h1>
                    </div>

                    <div class="box-group">
                        <i class="fas fa-map-marker-alt box-icon" aria-hidden="true"></i>
                        <div class="box-head text-uppercase">Адрес</div>
                        <div class="box-body">
                            г. Киев, ул. Уличная 17, офис 100
                            <br>
                            Пн–Сб: 09<sup>00</sup> – 19<sup>00</sup>
                        </div>
                    </div>
                    <div class="box-group">
                        <i class="fas fa-map-marker-alt box-icon" aria-hidden="true"></i>
                        <div class="box-head text-uppercase">Контактная информация</div>
                        <p class="box-body">
                            <a href="tel:+380503139223">+38 (050) 313 92 23</a>
                            <br>
                            <a href="tel:+380632123482">+38 (063) 212-34-82</a>
                            <br>
                            <a href="mailto:sales@vego.com.ua">sales@vego.com.ua</a>
                        </p>
                    </div>

                    <?php the_content(); ?>

                    <div class="feedback-box">
                        <div class="feedback-headline text-center text-uppercase">Обратная связь</div>
                        <form action="./" method="post" class="feedback-form">
                            <div class="form-row form-columns">
                                <div class="form-column">
                                    <input class="form-field" type="text" name="name" placeholder="Введите Ваше имя">
                                </div>
                                <div class="form-column">
                                    <input class="form-field" type="tel" name="tel"
                                           placeholder="Введите номер телефона">
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

