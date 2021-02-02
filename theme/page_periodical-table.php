<?php
/*
 * Template Name: Periodická tabulka prvků
 * Description: Stránka s interaktivní periodickou tabulkou prvků.
 * Template Post Type: page
 */

$context             = Timber::context();
// $context['elements'] = Timber::get_posts(['post_type' => '']);
$templates           = ["custom-templates/periodical-table.html.twig", 'post-types/page.html.twig'];
Timber::render($templates, $context);
