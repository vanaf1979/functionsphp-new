<?php
/**
 * Enqueue styles and scripts for the frontend.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;


final class FrontendImagesSizes implements Service, Registerable {


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

        \add_action( 'init' , array( $this , 'register_thumbnail_sizes' ) , 1 );
        \add_action( 'init' , array( $this , 'add_post_thumbnails_support' ) , 1 );

    }


    /**
     * register_thumbnail_sizes.
     *
     * Register custom thumbnail sizes.
     *
     * @return void
     */
    public function register_thumbnail_sizes() : void {

        \add_image_size( 'custom-thumbnail' , 900 , 600 , true );

    }


    /**
     * add_post_thumbnails_support.
     *
     * Add suport for custom thumbnail sizes.
     *
     * @return void
     */
    public function add_post_thumbnails_support() : void {

        \add_theme_support( 'post-thumbnails' );

    }

}