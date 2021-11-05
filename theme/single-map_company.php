<?php

$context = Timber::context();
$templates = ['post-types/single-map_company.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
