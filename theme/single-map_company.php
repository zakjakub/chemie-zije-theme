<?php
$context = Timber::context();
$templates = ['post-types/single-map_company.html.twig', 'post-types/page.html.twig'];

dd($context);

Timber::render($templates, $context);
