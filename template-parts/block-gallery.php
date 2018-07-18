<?php
if (function_exists('rwmb_meta')) {
    $gallery = rwmb_meta('project-gallery');

    if (!empty($gallery)) { ?>
        <!-- Start Gallery -->
        <div class="gallery">
            <h2 class="section-title with-divider text-center">Галерея</h2>
            <div class="container">
                <div class="gallery-preview">
                <span class="gallery-count">
                    <span class="gallery-current"></span>/<span class="gallery-total"></span>
                </span>
                    <div class="js-gallery">
                        <?php foreach ($gallery as $item) { ?>
                            <img src="<?php echo esc_url($item['full_url']); ?>"
                                 alt="<?php echo esc_attr($item['alt']); ?>">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="gallery-nav">
                <div class="js-gallery-nav">
                    <?php foreach ($gallery as $item) { ?>
                        <div class="gallery-thumbnail">
                            <span class="image"
                                  style="background-image: url('<?php echo esc_url($item['url']); ?>')"></span>
                        </div>
                    <?php } ?>
                </div>
                <div class="container gallery-arrows"></div>
            </div>
        </div>
        <script>
            (function ($) {
                "use strict";
                $(function () {
                    var gallery = $('.js-gallery'), galleryNav = $('.js-gallery-nav'),
                        total = $('.gallery-total'), current = $('.gallery-current');

                    if (gallery.length) {
                        gallery.slick({
                            infinite: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            fade: true,
                            asNavFor: '.js-gallery-nav',
                        });

                        current.text(getCurrentSlideIndex());
                        total.text(gallery.find('img').length);

                        gallery.on('afterChange', function (slick, currentSlide) {
                            current.text(getCurrentSlideIndex());
                        });

                        gallery.on('edge', function (slick, direction) {
                            current.text(getCurrentSlideIndex());
                        });

                        gallery.on('swipe', function (event, slick, direction) {
                            current.text(getCurrentSlideIndex());
                        });

                        galleryNav.slick({
                            slidesToShow: 6,
                            slidesToScroll: 1,
                            dots: false,
                            centerMode: true,
                            focusOnSelect: true,
                            appendArrows: '.gallery-arrows',
                            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left" aria-hidden="true"></i></button>',
                            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right" aria-hidden="true"></i></button>',
                            asNavFor: '.js-gallery',
                            responsive: [
                                {
                                    breakpoint: 1200,
                                    settings: {
                                        slidesToShow: 4,
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 3,
                                    }
                                },
                                {
                                    breakpoint: 600,
                                    settings: {
                                        slidesToShow: 2,
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                    }
                                }
                            ]
                        });
                    }

                    function getCurrentSlideIndex() {
                        return gallery.slick('slickCurrentSlide') + 1;
                    }
                });
            })(jQuery);
        </script>
        <!-- End Gallery -->
    <?php }
}
