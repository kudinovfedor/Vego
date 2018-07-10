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
            <span class="contacts-map"></span>
            <div class="container">
                <?php if (function_exists('kama_breadcrumbs')) {
                    kama_breadcrumbs(' &mdash; ');
                } ?>
                <article id="page-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                    <h1 class="text-center text-uppercase section-headline"><?php the_title(); ?></h1>
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <h2>Адрес</h2>
                    <p>
                        г. Киев, ул. Уличная 17, офис 100
                        <br>
                        Пн–Сб: 09<sup>00</sup> – 19<sup>00</sup>
                    </p>
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <h2>Контактная информация</h2>
                    <p>
                        <a href="tel:+380503139223">+38 (050) 313 92 23</a>
                        <br>
                        <a href="tel:+380632123482">+38 (063) 212-34-82</a>
                        <br>
                        <a href="mailto:sales@vego.com.ua">sales@vego.com.ua</a>
                    </p>
                    <?php the_content(); ?>

                    <div class="feedback-box">
                        <div class="feedback-headline text-center text-uppercase">Обратная связь</div>
                        <form action="./" method="post" class="feedback-form">
                            <div class="form-row form-columns">
                                <div class="form-column">
                                    <input class="form-field" type="text" name="name" placeholder="Введите Ваше имя">
                                </div>
                                <div class="form-column">
                                    <input class="form-field" type="tel" name="tel" placeholder="Введите номер телефона">
                                </div>
                            </div>
                            <div class="form-row">
                                <textarea class="form-field" name="message" placeholder="Введите текст сообщения"></textarea>
                            </div>
                            <div class="form-row form-columns">
                                <div class="form-column">
                                    <button class="button-medium" type="submit">Отправить</button>
                                </div>
                                <div class="form-column">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="agree" value="yes" checked>
                                        <span class="checkbox"></span>
                                        Я согласен на обработку моих персональных данных
                                    </label>
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

