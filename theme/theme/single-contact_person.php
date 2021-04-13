<?php

$context = Timber::context();
$templates = ['post-types/contact_person.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
