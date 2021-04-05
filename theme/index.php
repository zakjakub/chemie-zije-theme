<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 */

$context = Timber::context();
$templates = ['post-types/page.html.twig'];

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


if (is_home() || is_front_page()) {
    $context['isHome'] = true;
    $context['posts'] = Timber::get_posts(['type' => 'page']);
    $templates = ['post-types/front-page-layout.html.twig', 'post-types/home.html.twig', ...$templates];
}
Timber::render($templates, $context);
