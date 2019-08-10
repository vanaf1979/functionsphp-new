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
use FunctionsPhp\Lib\Conditional;
use FunctionsPhp\Dependencies\Dep;
use FunctionsPhp\Dependencies\Single;


final class FrontendEnqueue implements Service, Registerable, Conditional {

    protected $dep;

    protected $single;


    /**
     * the constructor.
     */
    public function __construct( Dep $dep, Single $single ) { 

        $this->dep = $dep;

        $single->echo();

    }


    /**
     * is_needed.
     *
     * Should this service bee initialized?
     *
     * @return bool
     */
    static function is_needed() : bool {

        return ! \is_admin() ? true : false;

    }


    /**
     * register.
     *
     * Register hooks with WordPress.
     *
     * @return void
     */
    public function register() : void {

        \add_action( 'wp_enqueue_scripts' , array( $this , 'enqueue_styles' ) );
        \add_action( 'wp_enqueue_scripts' , array( $this , 'enqueue_scripts' ) );

    }


    /**
     * enqueue_styles.
     *
     * Enqueue stylesheets for the frontend.
     *
     * @return void
     */
    public function enqueue_styles() : void {

        \wp_enqueue_style( TEXT_DOMAIN  . '-app' , THEME_PATH . '/style.css' , array() , THEME_VERSION , 'all' );

    }


    /**
     * enqueue_scripts.
     *
     * Enqueue scripts for the frontend.
     *
     * @return void
     */
    public function enqueue_scripts() : void {

        \wp_enqueue_style( TEXT_DOMAIN  . '-app' , THEME_PATH . '/style.css' , array() , THEME_VERSION , 'all' );

    }

}