<?php
/**
 * All the functions are in the PHP pages in the `inc/` folder.
 */

show_admin_bar(false);

require_once locate_template('/inc/helpers.php');
require_once locate_template('/inc/admin.php');
require_once locate_template('/inc/login.php');
require_once locate_template('/inc/customizer.php');

require_once locate_template('/inc/breadcrumbs.php');
require_once locate_template('/inc/cleanup.php');
require_once locate_template('/inc/custom-logo.php');
require_once locate_template('/inc/setup.php');
require_once locate_template('/inc/enqueues.php');
require_once locate_template('/inc/navbar.php');
require_once locate_template('/inc/widgets.php');
require_once locate_template('/inc/index-pagination.php');
require_once locate_template('/inc/split-post-pagination.php');
require_once locate_template('/inc/feedback.php');
require_once locate_template('/inc/shortcodes.php');
require_once locate_template('/inc/meta-boxes.php');
require_once locate_template('/inc/rest-api.php');

require_once('inc/SnazzyMaps.php');
require_once('inc/GoogleMaps.php');
require_once('inc/GoogleMapsCustomizer.php');

require_once('inc/pagination.php');
require_once('inc/custom-post-types.php');
require_once('inc/post-type-info.php');
require_once('inc/post-type-project.php');
require_once('inc/post-type-house.php');

function dump($expression)
{
    echo '<pre>';
    var_dump($expression);
    echo '</pre>';
}

function dd($expression)
{
    dump($expression);
    die();
}
