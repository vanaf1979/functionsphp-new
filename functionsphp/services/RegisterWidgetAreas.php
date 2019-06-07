<?php
/**
 * Register widget areas for this theme.
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Services
 */

namespace FunctionsPhp\Services;


use FunctionsPhp\Lib\Service;
use FunctionsPhp\Lib\Registerable;


final class RegisterWidgetAreas implements Service, Registerable {


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

        \add_action( 'widgets_init' , array( $this , 'register_widget_areas' ) );

    }


    /**
     * register_widget_areas.
     *
     * Register widget areas for this theme.
     *
     * @return void
     */
    public function register_widget_areas() : void {

        \register_sidebar( array(
            'name'          => 'Footer area one',
            'id'            => 'footer_area_one',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-one">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        \register_sidebar( array(
            'name'          => 'Footer area two',
            'id'            => 'footer_area_two',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-two">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        \register_sidebar( array(
            'name'          => 'Footer area three',
            'id'            => 'footer_area_three',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-three">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        \register_sidebar( array(
            'name'          => 'Footer area four',
            'id'            => 'footer_area_four',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-three">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

    }

}