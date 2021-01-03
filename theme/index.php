<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 */
$context   = Timber::context();
$templates = ['post-types/index.html.twig'];
if (is_home() || is_front_page()) {
    $context['isHome']   = true;
    $context['articles'] = Timber::get_posts(['post_type' => 'article',]);
    $templates           = ['post-types/home.html.twig', 'post-types/home.html.twig', ...$templates];
}
Timber::render($templates, $context);
