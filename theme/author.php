<?php
/**
 * The template for displaying Author Archive pages
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */

use Timber\Timber;

global $wp_query;
$context = Timber::context();
// $context['posts'] = new PostQuery(new WP_Query());
if (isset($wp_query->query_vars['author'])) {
    $author = Timber::get_user($wp_query->query_vars['author']);
    $context['author'] = $author;
    $context['title'] = 'Author Archives: '.$author->name();
}
Timber::render(array('post-types/author.html.twig', 'post-types/archive.html.twig'), $context);
