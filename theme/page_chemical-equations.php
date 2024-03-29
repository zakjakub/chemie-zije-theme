<?php
/*
 * Template Name: Stránka s kategoriemi chemických výpočtů
 * Template Post Type: study_material_cat
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts([
    'post_type' => 'equation_category',
    'numberposts' => 1000,
    'posts_per_page' => 1000,
]);
$templates = [
    'custom-templates/chemical-calculations.html.twig',
    'post-types/study_material_cat.html.twig',
    'post-types/page.html.twig',
];
Timber::render($templates, $context);
