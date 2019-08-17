<?php
/**
 * Eneble/Dissable editor options theme support.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;
use FunctionsPhp\Lib\Conditional;


final class Gutenberg implements Service, Registerable, Conditional {

    /**
     * the constructor.
     */
    public function __construct() { }


    /**
     * is_needed.
     *
     * Should this service bee initialized?
     *
     * @return bool
     */
    static function is_needed() : bool {

        return  \is_admin() ? true : false;

    }


    /**
     * register.
     *
     * Register hooks with WordPress.
     *
     * @return void
     */
    public function register() : Void {

        \add_action( 'admin_init' , array( $this , 'add_editor_styles' ) );
        \add_action( 'after_setup_theme' , array( $this , 'editor_theme_supported_features' ) );

    }


    /**
     * add_editor_styles.
     *
     * Enable editor stylesheet.
     *
     * @return void
     */
    public function add_editor_styles() : void {

        \add_editor_style();

    }


    /**
     * editor_theme_supported_features.
     *
     * Eneble/Dissable editor options theme support.
     *
     * @return void
     */
    public function editor_theme_supported_features() : void {

        \add_theme_support('editor-styles'); 

        // \add_theme_support( 'dark-editor-style' );

        \add_theme_support( 'align-wide' );

        \add_theme_support( 'wp-block-styles' );

        \add_theme_support( 'responsive-embeds' );

        \add_theme_support( 'disable-custom-colors' );

        \add_theme_support( 'editor-color-palette', array(

            array(
                'name' => __( 'Dark green', TEXT_DOMAIN ),
                'slug' => 'dark-green',
                'color' => '#646567',
            ),

            array(
                'name' => __( 'Light green', TEXT_DOMAIN ),
                'slug' => 'light-green',
                'color' => '#399d8f',
            ),

            array(
                'name' => __( 'White', TEXT_DOMAIN ),
                'slug' => 'white',
                'color' => '#ffffff',
            ),

            array(
                'name' => __( 'Black', TEXT_DOMAIN ),
                'slug' => 'black',
                'color' => '#000000',
            ),

        ));

        // add_theme_support('disable-custom-font-sizes');

        \add_theme_support( 'editor-font-sizes', array(

            array(
                'name' => __( 'Small', TEXT_DOMAIN ),
                'size' => 12,
                'slug' => 'small'
            ),

            array(
                'name' => __( 'Normal', TEXT_DOMAIN ),
                'size' => 14,
                'slug' => 'normal'
            ),

            array(
                'name' => __( 'Large', TEXT_DOMAIN ),
                'size' => 18,
                'slug' => 'large'
            ),

            array(
                'name' => __( 'Huge', TEXT_DOMAIN ),
                'size' => 22,
                'slug' => 'huge'
            )

        ));

    }

}