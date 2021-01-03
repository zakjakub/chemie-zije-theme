<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 */
$context          = Timber::context();
$context['posts'] = new Timber\PostQuery(new WP_Query());
$context['foo']   = 'bar';
$templates        = array('post-types/index.html.twig');
if (is_home()) {
    array_unshift($templates, 'post-types/front-page.html.twig', 'post-types/home.html.twig');
}
Timber::render($templates, $context);
