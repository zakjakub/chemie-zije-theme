<?php
/*
 * Template Name: Stránka se studijními materiály (kategoriemi studijních materiálů)
 * Template Post Type: page
 */

$context = Timber::context();
$context['subPosts'] = Timber::get_posts(['post_type' => 'study_material_cat']);
$templates = ['custom-templates/teaching-materials.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
