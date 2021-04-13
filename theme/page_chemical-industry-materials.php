<?php
/*
 * Template Name: Suroviny chemického průmyslu
 * Description: Stránka s přehledem oblastí surovin chemického průmyslu.
 * Template Post Type: page
 */

$context = Timber::context();
$postSlug = $context['post']->slug;
$context['elements'] = Timber::get_posts(['post_type' => 'industry_material']);
$templates = ["custom-templates/industry-materials.html.twig", 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
