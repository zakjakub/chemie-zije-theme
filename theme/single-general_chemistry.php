<?php

use Timber\Term;

$context = Timber::context();
$templates = ['single-customs/single-general_chemistry.html.twig', 'post-types/page.html.twig'];
$context['categories'] = $context['post']->terms('gen_chem_cat');
$context['equations'] = Timber::get_posts(
    new WP_Query([
        'post_type' => 'gen_chem_equation',
        'meta_key' => '_level',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'posts_per_page' => 1000,
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'gen_chem_cat',
                'field' => 'name',
                'terms' => array_map(static fn(Term $term) => $term->__toString(), $context['categories']),
            ],
        ],
    ])
);
Timber::render($templates, $context);
