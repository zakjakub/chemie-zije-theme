<?php
/*
 * Template Name: Periodická tabulka prvků
 * Description: Stránka s interaktivní periodickou tabulkou prvků.
 * Template Post Type: page, study_material_cat, teach_material_cat
 */

use Zakjakub\ChemieZijeTheme\Model\ChemicalElement;

$context = Timber::context();
$context['elements'] = ChemicalElement::getElements();
$templates = [
    "custom-templates/periodical-table.html.twig",
    'post-types/study_material_cat.html.twig',
    'post-types/page.html.twig',
];
Timber::render($templates, $context);
