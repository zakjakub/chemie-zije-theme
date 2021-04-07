<?php

namespace Zakjakub\ChemieZijeTheme\widgets;

use Timber;
use WP_Widget;

class DepartmentContactsWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'department_contacts_widget',
            'Kontakt na katedru',
            ['description' => 'Kontaktní údaje katedry.']
        );
    }

    final public function widget($args, $instance): void
    {
        $context = Timber::context();
        $context['contacts'] = carbon_get_theme_option('contact');
        Timber::render('widgets/department-contacts-widget/department-contacts-widget.html.twig', $context);
    }
}
