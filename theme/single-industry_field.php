<?php

$context = Timber::context();
$templates = ['single-customs/single-industry_field.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
