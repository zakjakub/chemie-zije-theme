<?php

$context = Timber::context();
$templates = ['single-customs/single-industry-material.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
