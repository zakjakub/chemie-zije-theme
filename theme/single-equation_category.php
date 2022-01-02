<?php

$context = Timber::context();
$templates = ['single-customs/single-equation-category.html.twig', 'post-types/page.html.twig'];
$context['equations'] = carbon_get_the_post_meta('solved_equations');
Timber::render($templates, $context);
