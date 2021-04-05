<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other 'pages'
 * on your WordPress site will use a different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/templates/page-mypage.twig (which will still route through this PHP file) OR
 * /mytheme/page-mypage.php (in which case you'll want to duplicate this file and save to the above path)
 */
$context = Timber::context();

$widgets = ['content', 'footer_banner', 'footer_banner_fluid', 'footer_left', 'footer_right'];
foreach ($widgets as $widget) {
    $context['sidebars'][$widget] = Timber::get_widgets($widget);
}
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log("WIDGETS WIDGETS WIDGETS");
error_log(var_export($widgets, true));

$postSlug = $context['post']->slug;
$templates = ["page-customs/page-$postSlug.html.twig", 'post-types/page.html.twig'];
if (is_home() || is_front_page()) {
    $context['isHome'] = true;
    $context['posts'] = Timber::get_posts(['type' => 'page']);
}
Timber::render($templates, $context);
