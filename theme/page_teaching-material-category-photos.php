<?php
/*
 * Template Name: Výukové materiály - fotografie
 * Description: Stránka s fotografiemi sloužícími jako výukové materiály.
 * Template Post Type: teach_material_cat
 */

use Timber\Term;

$context = Timber::context();
$context['subtype'] = get_query_var('oblast');
$templates = [
    'custom-templates/teach_material_cat_photos.html.twig',
    'post-types/teach_material_cat.html.twig',
    'post-types/page.html.twig',
];
$context['categories'] = $context['post']->terms('teach_mat_cat_type');
$context['subtypes'] = $context['post']->terms('teach_mat_sub_type');

$context['materials'] = Timber::get_posts(
    new WP_Query([
        'post_type' => 'teach_material',
        'orderby'   => 'title',
        'order'     => 'ASC',
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'teach_mat_cat_type',
                'field'    => 'slug',
                'terms'    => array_map(static fn(Term $term) => $term->__toString(), $context['categories']),
            ],
            [
                'taxonomy' => 'teach_mat_sub_type',
                'field'    => 'slug',
                'terms'    => [''.$context['subtype']],
            ],
        ],
    ])
);
Timber::render($templates, $context);
