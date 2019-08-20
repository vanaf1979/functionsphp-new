<?php
/**
 * Transients class.
 * 
 * Wrapper class to handle WordPress transients.
 *
 * @package   FunctionsPhp\Dependencies
 * @author    Stephan Nijman.
 * @license   MIT
 * @link      https://vanaf1979.nl
 * @copyright 2019 Stephan Nijman.
 */

namespace Vanaf1979\Transients;


final class Transients {

    /**
     * the constructor.
     */
    public function __construct() { }


    /**
     * set_transient.
     *
     * Set transient with data and experation time.
     * 
     * @uses set_transient https://developer.wordpress.org/reference/functions/set_transient/
     *
     * @param string $transient transient name.
     * @param string $data transient data.
     * @param string $time transient experation time.
     * 
     * @return bool
     */
    public function set_transient( string $transient = null , string $data = null , string $time = YEAR_IN_SECONDS ) : bool {

        return \set_transient( $transient , $data , $time );
        
    }


    /**
     * get_transient.
     *
     * Get transient from database.
     * 
     * @uses get_transient https://developer.wordpress.org/reference/functions/get_transient/
     *
     * @param string $transient transient name.
     * 
     * @return mixed
     */
    public function get_transient( string $transient = null ) {

        return \get_transient( $transient );

    }


    /**
     * delete_transient.
     *
     * delete transient from database.
     * 
     * @uses delete_transient https://developer.wordpress.org/reference/functions/delete_transient/
     *
     * @param string $transient transient name.
     * 
     * @return bool
     */
    public function delete_transient( string $transient = null ) : bool {

        return \delete_transient( $transient );

    }


    /**
     * optional.
     *
     * Check if transient exists, else run callback function and store transient data.
     * 
     * @uses call_user_funtion https://www.php.net/manual/en/function.call-user-func.php
     *
     * @param string $transient transient name.
     * @param string $data transient data.
     * @param string $time transient experation time.
     * 
     * @return mixed
     */
    public function optional( string $transient = null , callable $callback = null , string $time = YEAR_IN_SECONDS ) {

        if ( '' != $transient_data = $this->get_transient( $transient ) ) {

            return $transient_data;
        
        } else {

            $data = \call_user_func( $callback );

            $this->set_transient( $transient , $data , $time );

            return $data;
            
        }

    }

}