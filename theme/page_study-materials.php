<?php
/*
 * Template Name: Stránka se studijními materiály (kategoriemi studijních materiálů)
 * Template Post Type: page
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts([
    'post_type' => 'study_material_cat',
    'orderby' => ['priority' => 'ASC', 'menu_order' => 'ASC', 'meta_value' => 'ASC'],
]);
$templates = ['custom-templates/study-materials.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
