<?php

use Timber\Term;

$context = Timber::context();
$context['categories'] = $context['post']->terms('teach_mat_cat_type');
$context['subtitle'] = implode(', ', array_map(static fn(Term $term) => $term->title(), $context['categories']));
$templates = ['post-types/teach_material.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
