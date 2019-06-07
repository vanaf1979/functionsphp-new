<?php
/**
 * Register menus for this theme.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;


final class RegisterMenus implements Service, Registerable {

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

        \add_action( 'init' , array( $this , 'register_menus' ) );

    }


    /**
     * register_menus.
     *
     * Register menus for this theme.
     *
     * @return void
     */
    public function register_menus() : void {

        \register_nav_menus(
            array(
                'header-menu' => __( 'Header Menu' ),
                'footer-menu' => __( 'Footer Menu' ),
                'mobile-menu' => __( 'Mobile Menu' )
            )
        );

    }

}