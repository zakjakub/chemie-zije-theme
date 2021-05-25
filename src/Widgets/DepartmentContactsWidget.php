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
        $context = Timber::context();
        $context['contact'] = [
            'name' => carbon_get_theme_option('contact_name'),
            'department' => carbon_get_theme_option('contact_department'),
            'faculty' => carbon_get_theme_option('contact_faculty'),
            'university' => carbon_get_theme_option('contact_university'),
            'street' => carbon_get_theme_option('contact_street'),
            'house_number' => carbon_get_theme_option('contact_house_number'),
            'postal_code' => carbon_get_theme_option('contact_postal_code'),
            'city' => carbon_get_theme_option('contact_city'),
            'phone' => carbon_get_theme_option('contact_phone'),
            'fax' => carbon_get_theme_option('contact_fax'),
            'e_mail' => carbon_get_theme_option('contact_e_mail'),
            'gps' => carbon_get_theme_option('contact_gps'),
        ];
        Timber::render('widgets/department-contacts-widget/department-contacts-widget.html.twig', $context);
    }
}
