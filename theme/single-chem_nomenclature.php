<?php

use Timber\Post;
use Timber\Term;

$context = Timber::context();
$templates = ['single-customs/single-nomenclature.html.twig', 'post-types/page.html.twig'];

$context['categories'] = $context['post']->terms('nomenclature_cat');

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

usort(
    $context['equations'],
    static fn (Post $a, Post $b) => $a->meta('level') <=> $b->meta('level'),
);

Timber::render($templates, $context);
