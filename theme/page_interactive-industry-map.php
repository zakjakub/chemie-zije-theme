<?php
/*
 * Template Name: Interaktivní mapa chemického průmyslu
 * Description: Stránka s interaktivní mapou chemického průmyslu.
 * Template Post Type: page, study_material_cat, teach_material_cat
 */

$context = Timber::context();
$context['companies'] = Timber::get_posts([
    'post_type' => 'map_company',
    'posts_per_page' => 1000,
    'numberposts' => 1000,
    'orderby' => ['title' => 'ASC'],
]);
Timber::render(
    ["custom-templates/interactive-industry-map.html.twig", 'post-types/page-layout.html.twig'],
    $context,
);
