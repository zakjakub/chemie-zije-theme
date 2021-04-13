<?php
/*
 * Template Name: Interaktivní mapa chemického průmyslu
 * Description: Stránka s interaktivní mapou chemického průmyslu.
 * Template Post Type: page, study_material_cat, teach_material_cat
 */

Timber::render(
    ["custom-templates/interactive-industry-map.html.twig", 'post-types/page-layout.html.twig'],
    Timber::context()
);
