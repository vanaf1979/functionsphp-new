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
use FunctionsPhp\Dependencies\Views;


final class TestView implements Service, Registerable, Conditional {

    /**
     * ...
     */
    protected $views = null;


    /**
     * the constructor.
     */
    public function __construct( Views $views ) { 

        $this->views = new $views();

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
    
        \add_action( 'testview' , array( $this , 'test_view' ) );

    }


    /**
     * after_body_open_tag.
     *
     * ...
     *
     * @return void
     */
    public function test_view() : void {

        echo $this->views->render( 'footer' , [ 'test' => 'String' ] , false );

    }

}