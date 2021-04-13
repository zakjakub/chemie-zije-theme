<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */

use Timber\Timber;
use WPackio\Enqueue;
use Zakjakub\ChemieZijeTheme\ChemieZijeTheme;

$timber = new Timber();
$enqueue = new Enqueue(
    'chemieZijeTheme', 'dist', '1.0.0', 'theme', 'theme', 'regular'
);
if (!class_exists('Timber')) {
    add_action(
        'admin_notices',
        function () {
            $pluginsUrl = esc_url(admin_url('plugins.php'));
            $timberPluginUrl = esc_url(admin_url('plugins.php#timber'));
            $timberPluginLink = "<a href='$timberPluginUrl'>$pluginsUrl</a>";
            $message = "Timber not activated. Make sure you activate the plugin in $timberPluginLink";
            echo "<div class='error'><p>$message</p></div>";
        }
    );
    add_filter('template_include', fn() => dirname(get_stylesheet_directory()).'/static/no-timber.html');

    return;
}
Timber::$dirname = array('../views');
//
// Initialize theme:
new ChemieZijeTheme();
