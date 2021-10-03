<?php

$context = Timber::context();
$context['subtype'] = get_query_var('oblast');
$templates = ['post-types/teach_material.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
