<?php

/**
 * Third party plugins that hijack the theme will call wp_footer() to get the footer template.
 * We use this to end our output buffer (started in header.php) and render into the view/page-plugin.twig template.
 *
 * If you're not using a plugin that requires this behavior (ones that do include Events Calendar Pro and
 * WooCommerce) you can delete this file and header.php
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */
$timberContext = $GLOBALS['timberContext']; // @codingStandardsIgnoreFile
if (!isset($timberContext)) {
    throw new RuntimeException('Timber context not set in footer.');
}
$timberContext['content'] = ob_get_clean();
$templates = ['page-customs/page-plugin.html.twig'];
Timber::render($templates, $timberContext);
