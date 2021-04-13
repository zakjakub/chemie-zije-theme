<?php
/*
 * Template Name: Stránka s kategoriemi výukových materiálů
 * Template Post Type: page, study_material
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts(['post_type' => 'chem_nomenclature']);
$templates = ['custom-templates/chemical-nomenclatures.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
