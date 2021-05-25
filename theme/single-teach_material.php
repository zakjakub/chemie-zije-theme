<?php

$context = Timber::context();
$templates = ['post-types/teach_material.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
