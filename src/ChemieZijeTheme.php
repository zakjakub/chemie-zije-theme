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
use Zakjakub\ChemieZijeTheme\Post\ChemicalIndustryFieldPost;
use Zakjakub\ChemieZijeTheme\Post\ChemicalIndustryMaterialPost;
use Zakjakub\ChemieZijeTheme\Post\MapCompanyPost;
use Zakjakub\ChemieZijeTheme\Post\TeachMaterialCategoryPost;
use Zakjakub\ChemieZijeTheme\Post\TeachMaterialPost;
use Zakjakub\ChemieZijeTheme\Widget\DepartmentContactsWidget;
use Zakjakub\ChemieZijeTheme\Widget\EuMsmtWidget;

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
        add_action('init', [$this, 'registerShortcodes']);
        add_action('widgets_init', [$this, 'registerWidgets']);
        add_filter('query_vars', [$this, 'addQueryVarsFilter']);
        // WPackIO Enqueue
        $this->enqueue = $this->getEnqueue();
        add_action('wp_enqueue_scripts', [$this, 'themeEnqueue']);
        add_action('after_setup_theme', [$this, 'registerNavMenus']);
        add_filter(
            'timber/post/classmap',
            fn($classmap) => array_merge(
                $classmap,
                [
                    'industry_material'  => ChemicalIndustryMaterialPost::class,
                    'industry_field'     => ChemicalIndustryFieldPost::class,
                    'map_company'        => MapCompanyPost::class,
                    'teach_material'     => TeachMaterialPost::class,
                    'teach_material_cat' => TeachMaterialCategoryPost::class,
                ],
            ),
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

    /**
     * @throws \Exception
     */
    final public function solution(mixed $atts = [], mixed $content = null, mixed $tag = ''): string
    {
        // override default attributes with user attributes
        $name = shortcode_atts(
            ['name' => 'Zobrazit řešení'],
            array_change_key_case((array)$atts, CASE_LOWER),
            $tag
        )['name'] ?? '';
        $rand = wp_rand(100, 9999999);

        return <<<EOF
            <a data-bs-toggle="collapse" href="#sol$rand" role="button" aria-expanded="false" aria-controls="sol$rand">
                $name                        
            </a>
            <div class="m-1 p-1 px-2 border border-2 border-success collapse" id="sol$rand">
                $content
            </div>
        EOF;
    }

    final public function addQueryVarsFilter(array $vars): array
    {
        $vars[] = 'oblast';

        return $vars;
    }

    /**
     * The [wporg] shortcode.
     *
     * Accepts a title and will display a box.
     *
     * @param  array  $atts  Shortcode attributes. Default empty.
     * @param  string  $content  Shortcode content. Default null.
     * @param  string  $tag  Shortcode tag (name). Default empty.
     *
     * @return string Shortcode output.
     */
    final public function wporg_shortcode(mixed $atts = [], $content = null, $tag = ''): string
    {
        // normalize attribute keys, lowercase
        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        // override default attributes with user attributes
        $wporg_atts = shortcode_atts(
            [
                'title' => 'WordPress.org',
            ],
            $atts,
            $tag
        );
        // start box
        $o = '<div class="wporg-box">';
        // title
        $o .= '<h2>'.esc_html__($wporg_atts['title'], 'wporg').'</h2>';
        // enclosing tags
        if (!is_null($content)) {
            // secure output by executing the_content filter hook on $content
            $o .= apply_filters('the_content', $content);
            // run shortcode parser recursively
            $o .= do_shortcode($content);
        }
        // end box
        $o .= '</div>';

        // return output
        return $o;
    }

    final public function themeEnqueue(): void
    {
        $this->enqueue->enqueue('app', 'main', []);
    }

    final public function registerShortcodes(): void
    {
        add_shortcode('wporg', [$this, 'wporg_shortcode']);
        add_shortcode('reseni', [$this, 'solution']);
    }

    final public function registerPostTypes(): void
    {
    }

    final public function registerTaxonomies(): void
    {
    }

    final public function registerWidgets(): void
    {
        register_widget(new EuMsmtWidget());
        register_widget(new DepartmentContactsWidget());
    }

    final public function registerSidebars(): void
    {
        $sidebars = [
            ['id' => 'content', 'name' => 'Pravý boční panel'],
            ['id' => 'footer_banner', 'name' => 'Nad zápatím'],
            ['id' => 'footer_banner_fluid', 'name' => 'Nad zápatím (celá šířka stránky)'],
            ['id' => 'footer_left', 'name' => 'Zápatí vlevo'],
            ['id' => 'footer_center', 'name' => 'Zápatí střed'],
            ['id' => 'footer_right', 'name' => 'Zápatí vpravo'],
        ];
        foreach ($sidebars as $index => $sidebar) {
            register_sidebar([
                'id'             => $sidebar['id'] ?? "sidebar-$index",
                'name'           => $sidebar['name'] ?? "Sidebar $index",
                'description'    => $sidebar['description'] ?? '',
                'before_widget'  => '',
                'after_widget'   => '',
                'before_title'   => '',
                'after_title'    => '',
                'before_sidebar' => '',
                'after_sidebar'  => '',
            ]);
        }
    }

    final public function registerNavMenus(): void
    {
        register_nav_menus([
            'primary'       => 'Primární menu (v záhlaví)',
            'footer_left'   => 'Menu v levém sloupci zápatí',
            'footer_center' => 'Menu v prostředním sloupci zápatí',
            'footer_right'  => 'Menu v pravém sloupci zápatí',
        ]);
    }

    /**
     * This is where you add some context
     *;
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
        $widgets = ['content', 'footer_banner', 'footer_banner_fluid', 'footer_left', 'footer_center', 'footer_right'];
        foreach ($widgets as $widget) {
            $context['sidebars'][$widget] = Timber::get_widgets($widget);
        }
        // Contact fields.
        $context['contact'] = [
            'name'         => carbon_get_theme_option('contact_name'),
            'department'   => carbon_get_theme_option('contact_department'),
            'faculty'      => carbon_get_theme_option('contact_faculty'),
            'university'   => carbon_get_theme_option('contact_university'),
            'street'       => carbon_get_theme_option('contact_street'),
            'house_number' => carbon_get_theme_option('contact_house_number'),
            'postal_code'  => carbon_get_theme_option('contact_postal_code'),
            'city'         => carbon_get_theme_option('contact_city'),
            'phone'        => carbon_get_theme_option('contact_phone'),
            'fax'          => carbon_get_theme_option('contact_fax'),
            'e_mail'       => carbon_get_theme_option('contact_e_mail'),
            'gps'          => carbon_get_theme_option('contact_gps'),
        ];

        return $context;
    }

    final public function themeSupports(): void
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding, we declare that this theme does not use a hard-coded <title> tag in the document head,
         * and expect WordPress to provide it for us.
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
            ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'],
        );
        /*
         * Enable support for Post Formats.
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', ['aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio',]);
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

        return $twig;
    }
}
