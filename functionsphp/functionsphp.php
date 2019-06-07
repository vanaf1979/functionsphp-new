<?php

namespace FunctionsPhp;


class FunctionsPhp {


    public function __construct() {

        $this->register_constants();

    }


    public function get_service_classes(): array {

        return [
            'TextDomain' => \FunctionsPhp\Services\TextDomain::class,
            'FrontEndEnqueue' => \FunctionsPhp\Services\FrontEndEnqueue::class,
            'AdminEditor' => \FunctionsPhp\Services\AdminEditor::class,
        ];

    }


    private function register_constants() : void {

        $theme = \wp_get_theme();

        define( 'TEXT_DOMAIN' , $theme->get( 'TextDomain' ) );
        define( 'THEME_VERSION' , $theme->get( 'Version' ) );
        define( 'THEME_PATH' , get_template_directory_uri() );

    }

}
