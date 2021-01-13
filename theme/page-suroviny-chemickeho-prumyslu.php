<?php

$context             = Timber::context();
$postSlug            = $context['post']->slug;
$context['elements'] = Timber::get_posts(['post_type' => 'industry_material']);
$templates           = ["page-customs/page-$postSlug.html.twig", 'post-types/page.html.twig'];
Timber::render($templates, $context);
