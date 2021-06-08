<?php
/*
 * Template Name: Stránka s kategoriemi chemických výpočtů
 * Template Post Type: page
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts(['post_type' => 'calculation_category']);
$templates = ['custom-templates/chemical-calculations.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
