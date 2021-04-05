<?php

namespace Zakjakub\ChemieZijeTheme\widgets;

use Timber;
use WP_Widget;

class EuMsmtWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('eu_msmt_widget', 'EU MŠMT zápatí', ['description' => 'Banner EU a MŠMT do zápatí.']);
    }

    final public function widget($args, $instance): void
    {
        Timber::render('widgets/eu-msmt-widget/eu-msmt-widget.html.twig', Timber::context());
    }
}
