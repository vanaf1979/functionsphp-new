<?php

namespace FunctionsPhp\Dependencies;

final class Single {

    protected $instance = null;


    protected $string = null;
    
    /**
     * the constructor.
     */
    public function __construct() { }


    public function instande() : self {

        if( ! $this->instance ) {

            $this->instance = new Self();

        }
        
        return $this->instance;

    }


    public function set( $value ) {

        $this->string = $value;

    }


    public function echo() {

        echo $this->string;

    }

}

?>