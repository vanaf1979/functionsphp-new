<?php

namespace FunctionsPhp\Dependencies;

final class Theme {

    protected $instance = null;

    protected $theme = null;

    public $textdomain = null;

    public $version = null;

    public $path = null;

    
    /**
     * the constructor.
     */
    public function __construct() { 

        echo 'construct theme class';

        $this->theme = \wp_get_theme();

        $this->textdomain = $this->theme->get( 'TextDomain' );

        $this->version = $this->theme->get( 'Version' );

        $this->path = get_template_directory_uri();

    }


    public function instande() : self {

        if( ! $this->instance ) {

            $this->instance = new Self();

        }
        
        return $this->instance;

    }

}

?>