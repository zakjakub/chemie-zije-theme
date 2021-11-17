<?php

use Zakjakub\ChemieZijeTheme\Model\ChemicalElement;

$context = Timber::context();
$context['element'] = ChemicalElement::getElement(carbon_get_the_post_meta('proton_number'));
$templates = ['single-customs/single-chemical_element.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
