<?php
/*
 * Template Name: Výukové materiály - videa
 * Description: Stránka se seznamem videí sloužících jako výukové materiály.
 * Template Post Type: teach_material_cat
 */

use Timber\Term;

$context = Timber::context();
$templates = [
    'custom-templates/teach_material_cat_videos.html.twig',
    'post-types/teach_material_cat.html.twig',
    'post-types/page.html.twig',
];
$context['categories'] = $context['post']->terms('teach_mat_cat_type');
$context['subtypes'] = $context['post']->terms('teach_mat_sub_type');
usort($context['subtypes'], static fn(Term $a, Term $b) => $a->description() <=> $b->description());
$parts = explode('/', $context['subtypes'][0]?->path() ?? '');
$firstSubTypeSlug = $parts[array_key_last($parts)] ?? null;
if (empty($firstSubTypeSlug)) {
    $firstSubTypeSlug = $parts[array_key_last($parts) - 1] ?? 'ostatni';
}
$context['subtype'] = get_query_var('oblast', $firstSubTypeSlug) ?? $firstSubTypeSlug;
$context['materials'] = Timber::get_posts(
    new WP_Query([
        'post_type'      => 'teach_material',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => 1000,
        'tax_query'      => [
            'relation' => 'AND',
            [
                'taxonomy' => 'teach_mat_cat_type',
                'field'    => 'title',
                'terms'    => array_map(static fn(Term $term) => $term->__toString(), $context['categories']),
            ],
            [
                'taxonomy' => 'teach_mat_sub_type',
                'field'    => 'slug',
                'terms'    => [$context['subtype']],
            ],
        ],
    ])
);
Timber::render($templates, $context);
