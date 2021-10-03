<?php

$context = Timber::context();
$templates = ['post-types/teach_material.html.twig', 'post-types/page.html.twig'];

dd($context);

Timber::render($templates, $context);
