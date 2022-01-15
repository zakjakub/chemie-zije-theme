<?php
/*
 * Template Name: Test - názvosloví
 * Template Post Type: page, chem_nomenclature
 */

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
$context['categories'] = (int)$context['categories'];
Timber::render($templates, $context);
