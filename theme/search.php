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

$search = get_search_query();
$templates = ['post-types/search.html.twig', 'post-types/archive.html.twig', 'post-types/page.html.twig'];
$context = Timber::context();
$context['title'] = "Vyhledávání \"$search\"";
$context['posts'] = new PostQuery(new WP_Query([
    's' => $search,
    'numberposts' => -1,
]));
Timber::render($templates, $context);
