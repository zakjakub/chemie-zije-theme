<?php
/*
 * Template Name: Přehled kategorií obecné chemie
 * Template Post Type: page, study_material_cat
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts(['post_type' => 'general_chemistry']);
$templates = [
    'post-types/study_material_cat.html.twig',
    'post-types/page.html.twig',
];
Timber::render($templates, $context);
