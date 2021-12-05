<?php

/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib subdirectory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */
$context = Timber::context();
$post = Timber::get_post();
if (post_password_required($post->ID)) {
    Timber::render('post-types/single-password.html.twig', $context);
} else {
    Timber::render(
        [
            'single-customs/single-'.$post->ID.'.html.twig',
            'single-customs/single-'.$post->post_type.'.html.twig',
            'single-customs/single-'.$post->slug.'.html.twig',
            'post-types/single.html.twig',
        ],
        $context
    );
}
