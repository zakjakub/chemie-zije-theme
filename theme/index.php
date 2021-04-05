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
if (is_home() || is_front_page()) {
    $context['isHome'] = true;
    $context['posts'] = Timber::get_posts(['type' => 'page']);
    $templates = ['post-types/index.html.twig', ...$templates];
}
Timber::render($templates, $context);
