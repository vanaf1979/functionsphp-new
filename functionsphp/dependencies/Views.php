<?php

namespace FunctionsPhp\Dependencies;


use \stdClass;


final class Views {

    protected $data = null;

    /**
     * the constructor.
     */
    public function __construct() { }


    /**
     * render.
     *
     * Render a view file with optional data object
     *
     * @return void
     */
    public function render( string $view = null , array $data = null ) : string {

        $this->data = $this->array_to_object( $data );

        if( $view ) {

            return $this->load_view( $this->determine_filepath( $view ) );

        } else {

            throw new \Exception( 'Class Views: Passed in view name is not valid.' );

        }

    }


    /**
     * load_view.
     *
     * Require and buffer the view file.
     *
     * @param string $viewpath
     * 
     * @return void
     */
    private function load_view( string $viewpath ) : String {

        ob_start();

        global $post; // Get the current post object.

        require( $viewpath );

        return ob_get_clean();

    }


    /**
     * determine_filepath.
     *
     * Chack if the view file exists as either a .php or a .html file.
     *
     * @param string $view 
     * 
     * @return string
     */
    private function determine_filepath( string $view ) : string {

        $path = __DIR__ . '/../views/' . $view;

        if( file_exists( $path . '.php' ) ) { // Is file in views as .php

            return $path . '.php';

        } else if( file_exists( $path . '.html' ) ) { // Is file in views as .html

            return $path . '.html';

        } else if( '' != $themefile = \locate_template( $view . '.php' ) ) { // Is file in theme as .php

            return $themefile;

        } else {

            throw new \Exception( 'Class Views: Passed in view is not a valid file.' );

        }

    }


    /**
     * array_to_object.
     *
     * Concvert an array to a object.
     *
     * @param array $array
     * 
     * @return stdClass
     */
    private function array_to_object( array $array ) : stdClass {
        
        $object = new \stdClass();

        foreach ( $array as $key => $value ) {

            $object->$key = $value;

        }

        return $object;

    }

}