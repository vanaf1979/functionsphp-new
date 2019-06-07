<?php
/**
 * Add theme support for specific features.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;


final class FrontendThemeSupport implements Service, Registerable {


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

        \add_action( 'init' , array( $this , 'add_theme_support' ) , 1 , 1 );

    }


    /**
     * add_theme_support.
     *
     * Add theme support for specific features.
     *
     * @return void
     */
    public function add_theme_support() : void {

        \add_theme_support( 'menus' );

        \add_theme_support( 'html5' , array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption'
        ));

        \add_theme_support('post-formats' , array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat'
        ));

    }


}