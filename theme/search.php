<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib subdirectory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */

use Timber\PostQuery;

$templates = ['post-types/search.html.twig', 'post-types/archive.html.twig', 'post-types/page.html.twig'];
$context = Timber::context();
$context['search'] = $search = get_search_query();
$context['title'] = "Vyhledávání \"$search\"";
$context['posts'] = new PostQuery(
    new WP_Query([
        's' => $search,
        'numberposts' => 1000,
        'posts_per_page' => 1000,
    ]),
);
Timber::render($templates, $context);
