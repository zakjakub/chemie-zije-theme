<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib subdirectory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.2
 */

use Timber\PostQuery;

$templates = ['post-types/archive.html.twig', 'post-types/index.html.twig'];
$context = Timber::context();
$context['title'] = __('Archive');
if (is_day()) {
    $context['title'] .= ': ' . get_the_date('D M Y');
} elseif (is_month()) {
    $context['title'] .= ': ' . get_the_date('M Y');
} elseif (is_year()) {
    $context['title'] .= ': ' . get_the_date('Y');
} elseif (is_tag()) {
    $context['title'] = single_tag_title('', false);
} elseif (is_category()) {
    $context['title'] = single_cat_title('', false);
    $templates = ['post-types/archive-' . get_query_var('cat') . '.html.twig', ...$templates];
} elseif (is_post_type_archive()) {
    $context['title'] = post_type_archive_title('', false);
    $templates = ['post-types/archive-' . get_post_type() . '.html.twig', ...$templates];
}
$context['posts'] = new PostQuery(new WP_Query());
Timber::render($templates, $context);
