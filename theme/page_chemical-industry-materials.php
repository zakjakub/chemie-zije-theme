<?php
/*
 * Template Name: Suroviny chemického průmyslu
 * Description: Stránka s přehledem oblastí surovin chemického průmyslu.
 * Template Post Type: page, study_material_cat
 */

$context = Timber::context();
$context['elements'] = Timber::get_posts([
    'post_type'      => 'industry_material',
    'orderby'        => ['priority' => 'ASC'],
    'posts_per_page' => 100,
]);
$templates = ["custom-templates/industry-materials.html.twig", 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
