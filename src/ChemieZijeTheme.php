<?php
/**
 * @noinspection PhpUnused
 * @noinspection UnknownInspectionInspection
 */

namespace Zakjakub\ChemieZijeTheme;

use Timber;
use Timber\Site;
use Twig\Environment;
use Twig\Extension\StringLoaderExtension;
use WPackio\Enqueue;
use Zakjakub\ChemieZijeTheme\widgets\EuMsmtWidget;

class ChemieZijeTheme extends Site
{
    public Enqueue $enqueue;

    public function __construct()
    {
        // Timber
        add_action('after_setup_theme', [$this, 'themeSupports']);
        add_filter('timber/context', [$this, 'addToContext']);
        add_filter('timber/twig', [$this, 'addToTwig']);
        add_filter('timber/context', [$this, 'addToContext']);
        add_action('init', [$this, 'registerPostTypes']);
        add_action('init', [$this, 'registerTaxonomies']);
        add_action('init', [$this, 'registerSidebars']);
        add_action('widgets_init', [$this, 'registerWidgets']);
        // WPackIO Enqueue
        $this->enqueue = $this->getEnqueue();
        add_action('wp_enqueue_scripts', [$this, 'themeEnqueue']);
        add_action(
            'after_setup_theme',
            fn() => register_nav_menus(['primary' => 'Primární menu (v záhlaví)'])
        );
        parent::__construct();
    }

    private function getEnqueue(): Enqueue
    {
        // @formatter:off
        return $this->enqueue ?? new Enqueue(
            appName: 'chemieZijeTheme',
            outputPath: 'dist',
            version: '1.0.0',
            type: 'theme',
            pluginPath: 'theme',
            themeType: 'regular',
        );
        // @formatter:on
    }

    final public function themeEnqueue(): void
    {
        $this->enqueue->enqueue('app', 'main', []);
    }

    /**
     * This is where you can register custom post types.
     */
    final public function registerPostTypes(): void
    {
    }

    /**
     * This is where you can register custom taxonomies.
     */
    final public function registerTaxonomies(): void
    {
    }

    final public function registerWidgets(): void
    {
        register_widget(new EuMsmtWidget());
    }

    final public function registerSidebars(): void
    {
        $sidebars = [
            ['id' => 'content', 'name' => 'Pravý boční panel'],
            ['id' => 'footer_banner', 'name' => 'Nad zápatím'],
            ['id' => 'footer_banner_fluid', 'name' => 'Nad zápatím (celá šířka stránky)'],
            ['id' => 'footer_left', 'name' => 'Zápatí vlevo'],
            ['id' => 'footer_right', 'name' => 'Zápatí vpravo'],
        ];
        foreach ($sidebars as $index => $sidebar) {
            register_sidebar(
                [
                    'id'             => $sidebar['id'] ?? "sidebar-$index",
                    'name'           => $sidebar['name'] ?? "Sidebar $index",
                    'description'    => $sidebar['description'] ?? '',
                    'before_widget'  => '',
                    'after_widget'   => '',
                    'before_title'   => '',
                    'after_title'    => '',
                    'before_sidebar' => '',
                    'after_sidebar'  => '',
                ]
            );
        }
    }

    /**
     * This is where you add some context
     *
     * @param  array  $context  context['this'] Being the Twig's {{ this }}.
     *
     * @return array
     */
    final public function addToContext(array $context): array
    {
        $context['site'] = $this;
        foreach (array_keys(get_registered_nav_menus()) as $location) {
            if (!has_nav_menu($location)) {
                continue;
            }
            $context['menu'][$location] = Timber::get_menu($location);
        }

        return $context;
    }

    final public function themeSupports(): void
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']
        );
        /*
         * Enable support for Post Formats.
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            ['aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio',]
        );
        add_theme_support('menus');
    }

    /**
     * This is where you can add your own functions to twig.
     *
     * @param  Environment  $twig  get extension.
     *
     * @return Environment
     */
    final public function addToTwig(Environment $twig): Environment
    {
        $twig->addExtension(new StringLoaderExtension());

        // $twig->addFilter(new TwigFilter('myFunction', array($this, 'myFunction')));
        return $twig;
    }
}
