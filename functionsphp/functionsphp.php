<?php
/**
 * Configure functionsphp and the theme.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp
 */

namespace FunctionsPhp;


class FunctionsPhp {


    /**
     * the constructor.
     */
    public function __construct() {

        $this->register_constants();

    }


    /**
     * get_service_classes.
     *
     * Store and return all services classes.
     *
     * @return array
     */
    public function get_service_classes(): array {

        return [
            'TextDomain' => \FunctionsPhp\Services\TextDomain::class,
            'RegisterWidgetAreas' => \FunctionsPhp\Services\RegisterWidgetAreas::class,
            'RegisterMenus' => \FunctionsPhp\Services\RegisterMenus::class,
            'FrontendImagesSizes' => \FunctionsPhp\Services\FrontendImagesSizes::class,
            'FrontendThemeSupport' => \FunctionsPhp\Services\FrontendThemeSupport::class,
            'FontendCleanup' => \FunctionsPhp\Services\FontendCleanup::class,
            'FrontendEnqueue' => \FunctionsPhp\Services\FrontendEnqueue::class,
            'Gutenberg' => \FunctionsPhp\Services\Gutenberg::class,
            'TestEl' => \FunctionsPhp\Services\TestView::class
        ];

    }


    /**
     * get_definitions.
     *
     * Store and return all definitions.
     *
     * @return array
     */
    public function get_definitions(): array {

        return [
            FunctionsPhp\Dependencies\Theme::class => \DI\factory('FunctionsPhp\Dependencies\Theme::instance'),
            FunctionsPhp\Dependencies\Single::class => \DI\factory('FunctionsPhp\Dependencies\Single::instance'),
        ];

    }


    /**
     * register_constants.
     *
     * Register all constants for this theme.
     *
     * @return void
     */
    private function register_constants() : void {

        $theme = \wp_get_theme();

        define( 'TEXT_DOMAIN' , $theme->get( 'TextDomain' ) );
        define( 'THEME_VERSION' , $theme->get( 'Version' ) );
        define( 'THEME_PATH' , get_template_directory_uri() );

    }

}
