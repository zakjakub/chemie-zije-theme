<?php

/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */
$context         = Timber::context();
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;
if (post_password_required($timber_post->ID)) {
    Timber::render('post-types/single-password.html.twig', $context);
} else {
    Timber::render(
        [
            'single-customs/single-'.$timber_post->ID.'.html.twig',
            'single-customs/single-'.$timber_post->post_type.'.html.twig',
            'single-customs/single-'.$timber_post->slug.'.html.twig',
            'post-types/single.html.twig',
        ],
        $context
    );
}
