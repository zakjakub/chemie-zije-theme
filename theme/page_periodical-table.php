<?php
/*
 * Template Name: Periodická tabulka prvků
 * Description: Stránka s interaktivní periodickou tabulkou prvků.
 * Template Post Type: page, study_material_cat, teach_material_cat
 */

require_once "includes/elements-gsheet.php";
require_once "includes/elements.php";

$context = Timber::context();
$context['elements'] = $oldElements;
$templates = ["custom-templates/periodical-table.html.twig", 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
