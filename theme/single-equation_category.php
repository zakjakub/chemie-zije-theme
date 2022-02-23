<?php

use Timber\Term;

$context = Timber::context();
$templates = ['single-customs/single-equation-category.html.twig', 'post-types/page.html.twig'];
## $context['equations'] = carbon_get_the_post_meta('solved_equations');
$context['categories'] = $context['post']->terms('equation_cat');
$context['equations'] = Timber::get_posts(
    new WP_Query([
        'post_type'      => 'equation',
        'meta_key'       => '_level',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'posts_per_page' => 1000,
        'tax_query'      => [
            'relation' => 'AND',
            [
                'taxonomy' => 'equation_cat',
                'field'    => 'name',
                'terms'    => array_map(static fn(Term $term) => $term->__toString(), $context['categories']),
            ],
        ],
    ])
);
Timber::render($templates, $context);
