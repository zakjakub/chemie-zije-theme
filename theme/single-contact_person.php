<?php

$context         = Timber::context();
$templates       = ['post-types/contact_person.html.twig', 'post-types/page.html.twig'];
Timber::render($templates, $context);
