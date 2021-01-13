<?php

$context         = Timber::context();
$templates       = ['page-types/page-contact_person.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
