<?php

namespace Zakjakub\ChemieZijeTheme\Widgets;

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
        Timber::render('widgets/department-contacts-widget/department-contacts-widget.html.twig', Timber::context());
    }
}
