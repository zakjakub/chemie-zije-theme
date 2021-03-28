<?php
/*
 * Template Name: Interaktivní mapa chemického průmyslu
 * Description: Stránka s interaktivní mapou chemického průmyslu.
 * Template Post Type: page
 */

Timber::render(
    ["custom-templates/interactive-industry-map.html.twig", 'post-types/page-layout.html.twig'],
    Timber::context()
);
