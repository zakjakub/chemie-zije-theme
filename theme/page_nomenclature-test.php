<?php
/*
 * Template Name: Test - názvosloví
 * Template Post Type: page, chem_nomenclature
 */

use Timber\Post;
use Timber\Term;

$context = Timber::context();
$templates = ['custom-templates/nomenclature-test.html.twig', 'post-types/page.html.twig'];
$context['allCategories'] = \Timber\Timber::get_terms('nomenclature_cat');
// Levels:
$context['allLevels'] = [
    ['level' => 1, 'name' => 'Lehká'],
    ['level' => 3, 'name' => 'Středně těžká'],
    ['level' => 5, 'name' => 'Těžká'],
];
// Level.
$context['level'] = get_query_var('level', '1') ?? 1;
if (is_iterable($context['level'])) {
    $context['level'] = $context['level'][0];
}
$context['level'] = (int)$context['level'];
// Count.
$context['count'] = get_query_var('count', '5') ?? 5;
if (is_iterable($context['count'])) {
    $context['count'] = $context['count'][0];
}
$context['count'] = (int)$context['count'];
// Categories.
$context['categories'] = get_query_var('categories', []) ?? [];
if (is_string($context['categories'])) {
    $context['categories'] = [$context['categories']];
}
// Test
$context['equations'] = Timber::get_posts(
    new WP_Query([
        'post_type'      => 'nomenclat_equation',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => 1000,
        'tax_query'      => [
            'relation' => 'AND',
            [
                'taxonomy' => 'nomenclature_cat',
                'field'    => 'name',
                'terms'    => array_map(static fn(Term $term) => $term->__toString(), $context['categories']),
            ],
        ],
    ])
);
// Filter by level.
$context['equations'] = array_filter(
    $context['equations'],
    static fn(Post $equation) => $equation->meta('_level' <= $context['level']),
);
// Randomize order.
shuffle($context['equations']);
// Select required amount.
$context['equations'] = array_slice($context['equations'], 0, $context['count']);
Timber::render($templates, $context);
