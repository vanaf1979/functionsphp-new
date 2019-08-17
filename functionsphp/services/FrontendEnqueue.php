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
use FunctionsPhp\Dependencies\Theme;


final class FrontendEnqueue implements Service, Registerable, Conditional {

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

        \wp_enqueue_style( 
            $this->theme->textdomain  . '-app',
            $this->theme->path . '/style.css',
            array() , $this->theme->version,
            'all'
        );

    }


    /**
     * enqueue_scripts.
     *
     * Enqueue scripts for the frontend.
     *
     * @return void
     */
    public function enqueue_scripts() : void {

        \wp_enqueue_script(
            $this->theme->textdomain  . '-app',
            $this->theme->path . '/style.css',
            array() , $this->theme->version,
            'all'
        );

    }

}