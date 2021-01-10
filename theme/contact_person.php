<?php

$context         = Timber::context();
$context['post'] = Timber::get_post();
$templates       = ['page-types/page-contact_person.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
