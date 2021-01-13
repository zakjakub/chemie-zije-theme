<?php

$context             = Timber::context();
$context['post']     = Timber::get_post();
$context['elements'] = Timber::get_posts(['post_type' => 'industry_material']);
$templates           = ['page-customs/page-'.$context['post']->slug.'.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
