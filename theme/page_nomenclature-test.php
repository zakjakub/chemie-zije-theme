<?php
/*
 * Template Name: Test - názvosloví
 * Template Post Type: page, chem_nomenclature
 */

$context = Timber::context();
$templates = ['custom-templates/nomenclature-test.html.twig', 'post-types/page.html.twig'];
$context['allCategories'] = \Timber\Timber::get_terms('nomenclature_cat');
Timber::render($templates, $context);
