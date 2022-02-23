<?php
/*
 * Template Name: Test - výpočty
 * Template Post Type: page, equation_category
 */

$context = Timber::context();
$templates = ['custom-templates/equation-test.html.twig', 'post-types/page.html.twig'];
$context['allCategories'] = \Timber\Timber::get_terms('equation_cat');
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
$taxQuery = count($context['categories']) ? [
    'relation' => 'AND',
    [
        'taxonomy' => 'equation_cat',
        'field'    => 'slug',
        'terms'    => $context['categories'],
    ],
] : null;
$allEquations = Timber::get_posts(
    new WP_Query([
            'post_type'      => 'equation_category',
            'orderby'        => 'title',
            'order'          => 'ASC',
            'posts_per_page' => 1000,
            'tax_query'      => $taxQuery,
        ])
) ?? [];
$context['equations'] = [];
foreach ($allEquations as $equation) {
    if ((int)$equation->meta('_level') <= $context['level']) {
        $context['equations'][] = $equation;
    }
}
// Randomize order.
shuffle($context['equations']);
// Select required amount.
$context['equations'] = array_slice($context['equations'], 0, $context['count']);
Timber::render($templates, $context);
