<?php

namespace FunctionsPhp\Dependencies;


use \stdClass;


final class Transients {

    // Time constants
    // MINUTE_IN_SECONDS
    // HOUR_IN_SECONDS
    // DAY_IN_SECONDS
    // WEEK_IN_SECONDS
    // MONTH_IN_SECONDS
    // YEAR_IN_SECONDS


    /**
     * the constructor.
     */
    public function __construct() { }


    /**
     * set_transient.
     *
     * Set transient with data and experation time.
     *
     * @return void
     */
    public function set_transient( string $transient = null , string $data = null , string $time = YEAR_IN_SECONDS ) {

        \set_transient( $transient , $data , $time );

    }


    /**
     * get_transient.
     *
     * Set transient with data and experation time.
     *
     * @return void
     */
    public function get_transient( string $transient = null ) {

        \get_transient( $transient );

    }


    /**
     * optional.
     *
     * Check if transient exists, else run callback function and store transient.
     *
     * @return void
     */
    public function optional( string $transient = null , callable $callback = null , string $time = YEAR_IN_SECONDS ) : string {

        if( '' != $transient_data = $this->get_transient( $transient ) ) {

            return $transient_data;
        
        } else {

            $data = \call_user_func( $callback );

            $this->set_transient( $transient , $data , $time );

            return $data;
            
        }

    }

}