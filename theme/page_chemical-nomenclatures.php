<?php
/*
 * Template Name: Přehled kategorií chemického názvosloví
 * Template Post Type: page, study_material_cat
 */

$context = Timber::context();
$context['posts'] = Timber::get_posts(['post_type' => 'chem_nomenclature']);
$templates = ['custom-templates/chemical-nomenclatures.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
