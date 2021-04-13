<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */

use Timber\PostQuery;

$templates = array('post-types/search.html.twig', 'post-types/archive.html.twig', 'post-types/page.html.twig');
$context = Timber::context();
$context['title'] = 'Search results for '.get_search_query();
$context['posts'] = new PostQuery(new WP_Query());
Timber::render($templates, $context);
