<?php
/*
 * Template Name: Stránka s oblastmi průmyslové chemie
 * Template Post Type: study_material_cat
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts([
    'post_type'      => 'industry_field',
    'post_parent'    => 0,
    'orderby'        => ['priority' => 'ASC'],
    'posts_per_page' => 100,
]);
$templates = ['custom-templates/industry-fields.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
