<?php

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
            'FrontEndEnqueue' => \FunctionsPhp\Services\FrontEndEnqueue::class,
            'AdminEditor' => \FunctionsPhp\Services\AdminEditor::class,
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
