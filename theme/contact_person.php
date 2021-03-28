<?php

$context = Timber::context();
$templates = ['page-types/page-contact_person.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
