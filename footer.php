<footer class="footer">
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container text-center text-uppercase">
        <div class="footer-copyright ">
            <?php /* <?php echo date('Y'); ?> &copy; <?php bloginfo('name'); ?>
            Все права защищены */ ?>
            Сайт розроблений <a href="https://brainworks.pro/" target="_blank" rel="noopener">BRAIN WORKS</a> <?php echo date('Y'); ?> &copy; VEGO ВСІ ПРАВА ЗАХИЩЕНІ
        </div>
    </div>
</footer>

</div><!-- .wrapper end-->

<?php scroll_top(); ?>

<div class="is-hide"><?php svg_sprite(); ?></div>

<?php wp_footer(); ?>

</body>
</html>
