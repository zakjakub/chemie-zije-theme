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
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;
if (is_home() || is_front_page()) {
    $context['isHome']   = true;
    $context['articles'] = Timber::get_posts(['post_type' => 'article',]);
}
Timber::render(array('page-customs/page-'.$timber_post->slug.'.html.twig', 'post-types/page.html.twig'), $context);
