<?php
/**
 * Register textdomain for theme translation.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;
use FunctionsPhp\Dependencies\Theme;


final class TextDomain implements Service, Registerable {

    /**
     * Themke data class.
     */
    protected $theme = null;

    
    /**
     * the constructor.
     */
    public function __construct( Theme $theme ) { 

        $this->theme = $theme;

    }


    /**
     * register.
     *
     * Register hooks with WordPress.
     *
     * @return void
     */
    public function register() : void {

        \add_action( 'after_setup_theme' , array( $this , 'load_theme_textdomain' ), 1 );

    }


    /**
     * load_theme_textdomain.
     *
     * Register textdomain for theme translation.
     *
     * @return void
     */
    public function load_theme_textdomain() : void {

        \load_theme_textdomain( $this->theme->textdomain , $this->theme->path . '/languages' );

    }

}