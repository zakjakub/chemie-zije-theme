<?php

/**
 * The Template for the sidebar containing the main widget area
 *
 * @package     WordPress
 * @subpackage  Timber
 */
Timber::render(array('post-parts/sidebar.html.twig'), $data ?? null);
