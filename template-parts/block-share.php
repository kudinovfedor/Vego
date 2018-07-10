<div class="share text-uppercase">
    <span class="share-text">Поделиться</span>
    <?php $share = array(
        'twitter' => sprintf('https://twitter.com/intent/tweet?url={%s}&text={%s}', get_the_permalink(),
            get_the_title()),
        'facebook' => sprintf('https://www.facebook.com/sharer.php?u={%s}', get_the_permalink()),
        'google-plus' => sprintf('https://plus.google.com/share?url={%s}&text={%s}', get_the_permalink(),
            get_the_title()),
    ) ?>
    <ul class="social share-social">
        <li class="social-item">
            <a class="social-link" href="<?php echo esc_attr(esc_url($share['twitter'])) ?>" target="_blank">
                <i class="fab fa-twitter" aria-hidden="true" aria-label="Twitter"></i>
            </a>
        </li>
        <li class="social-item">
            <a class="social-link" href="<?php echo esc_attr(esc_url($share['facebook'])) ?>" target="_blank">
                <i class="fab fa-facebook-f" aria-hidden="true" aria-label="Facebook"></i>
            </a>
        </li>
        <li class="social-item">
            <a class="social-link" href="<?php echo esc_attr(esc_url($share['google-plus'])) ?>"
               target="_blank">
                <i class="fab fa-google-plus-g" aria-hidden="true" aria-label="Google Plus"></i>
            </a>
        </li>
    </ul>
</div>
