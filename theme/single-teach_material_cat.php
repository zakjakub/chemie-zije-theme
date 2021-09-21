<?php

$context = Timber::context();
$templates = ['post-types/teach_material_cat.html.twig', 'post-types/page.html.twig'];
$terms = $context['post']->terms('teach_mat_cat_type');
$context['materials'] = new Timber\PostQuery(
    new WP_Query([
        'post_type' => 'teach_material',
        'orderby'   => 'title',
        'order'     => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'teach_mat_cat_type',
                'field'    => 'slug',
                'terms'    => array_map(static fn(\Timber\Term $term) => $term->__toString(), $terms),
            ],
        ],
    ])
);
Timber::render($templates, $context);
