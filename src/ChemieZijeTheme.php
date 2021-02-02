<?php

namespace Zakjakub\ChemieZijeTheme;

use Timber;
use Timber\Site;
use Twig\Environment;
use Twig\Extension\StringLoaderExtension;
use WPackio\Enqueue;

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
        // WPackIO Enqueue
        $this->enqueue = new Enqueue('chemieZijeTheme', 'dist', '1.0.0', 'theme', 'theme', 'regular');
        add_action('wp_enqueue_scripts', [$this, 'themeEnqueue']);
        add_action('after_setup_theme', function () {
            register_nav_menus(['primary' => 'Primární menu (v záhlaví)']);
        });
        parent::__construct();
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
        add_theme_support('html5', ['comment-form', 'comment-list', 'gallery', 'caption']);
        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', [
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ]);
        add_theme_support('menus');
    }

    //    /**
    //     * This Would return 'foo bar!'.
    //     *
    //     * @param  string  $text  being 'foo', then returned 'foo bar!'.
    //     *
    //     * @return string
    //     */
    //    final public function myfoo(string $text): string
    //    {
    //        $text .= ' bar!';
    //
    //        return $text;
    //    }
    /** This is where you can add your own functions to twig.
     *
     * @param  Environment  $twig  get extension.
     *
     * @return Environment
     */
    final public function addToTwig(Environment $twig): Environment
    {
        $twig->addExtension(new StringLoaderExtension());

        // $twig->addFilter(new TwigFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }
}
