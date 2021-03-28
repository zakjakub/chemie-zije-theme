<?php

use Timber\Post;
use Timber\Term;

$context = Timber::context();
$context['contacts'] = carbon_get_theme_option('contact');
$context['departments'] = [];
foreach (Timber::get_posts(['post_type' => 'contact_person']) as $person) {
    assert($person instanceof Post);
    $departments = $person->terms('sub_department');
    if (empty($departments)) {
        $departments[] = 'Další kontakty';
    }
    foreach ($departments as $department) {
        assert($department instanceof Term);
        $context['departments'][$department->path()]['name'] = $department->title();
        $context['departments'][$department->path()]['persons'][] = $person;
    }
}
$context['departments'] = array_reverse($context['departments']);
$templates = ['page-customs/page-'.$context['post']->slug.'.html.twig', 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
