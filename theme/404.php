<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions subdirectory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */
$context = Timber::context();
Timber::render('post-types/errors/404.html.twig', $context);
