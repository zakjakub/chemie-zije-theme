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
$context         = Timber::context();
$context['post'] = Timber::get_post();
$templates       = ['page-customs/page-'.$context['post']->slug.'.html.twig', 'post-types/page.html.twig'];
if (is_home() || is_front_page()) {
    $context['isHome'] = true;
    $context['posts']  = Timber::get_posts(['type' => 'page']);
}
Timber::render($templates, $context);
