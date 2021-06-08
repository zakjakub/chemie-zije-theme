<?php

$context = Timber::context();
$templates = ['single-customs/single-equation-category.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
