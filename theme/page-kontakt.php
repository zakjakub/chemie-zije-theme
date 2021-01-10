<?php

$context             = Timber::context();
$context['post']     = Timber::get_post();
$context['contacts'] = Timber::get_posts(['post_type' => 'contact_person',]);
$templates           = ['page-customs/page-'.$context['post']->slug.'.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
