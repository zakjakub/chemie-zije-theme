<?php
/*
 * Template Name: Stránka s výukovými materiály (kategoriemi výukových materiálů)
 * Template Post Type: page
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts([
    'post_type' => 'teach_material_cat',
    'orderby' => ['priority' => 'ASC', 'menu_order' => 'ASC', 'meta_value' => 'ASC'],
]);
$templates = ['custom-templates/teaching-materials.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
