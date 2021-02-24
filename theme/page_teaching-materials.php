<?php
/*
 * Template Name: Stránka s výukovými materiály
 * Template Post Type: page
 */

$context             = Timber::context();
$context['subPosts'] = Timber::get_posts(['post_type' => 'teach_material_cat']);
$templates           = ['custom-templates/teaching-materials.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
