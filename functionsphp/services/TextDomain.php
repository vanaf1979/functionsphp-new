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


final class TextDomain implements Service, Registerable {

    /**
     * the constructor.
     */
    public function __construct() { }


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

        \load_theme_textdomain( TEXT_DOMAIN , THEME_PATH . '/languages' );

    }

}