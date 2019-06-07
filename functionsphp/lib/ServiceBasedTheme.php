<?php

namespace FunctionsPhp\lib;


use FunctionsPhp\FunctionsPhp;


class ServiceBasedTheme {

    /**
     * The main theme class.
     */
    private $themeclass = null;

    /**
     * Array of services.
     */
    private $services = null;


    /**
     * the constructor.
     */
    public function __construct() {

        $this->initialize_theme();
        
    }


    /**
     * initialize_theme.
     *
     * Call the main theme class and run all services.
     *
     * @return void
     */
    public function initialize_theme() : void {

        $this->set_theme_class();

        $this->get_theme_services();

        $this->run_theme_services();

    }


    /**
     * set_theme_class.
     *
     * Get instance of the main theme class.
     *
     * @return void
     */
    private function set_theme_class() : void {

        if( $this->themeclass == null ) {

            $this->themeclass = new FunctionsPhp();

        }
        
    }


    /**
     * get_theme_services.
     *
     * Get array of services.
     *
     * @return void
     */
    private function get_theme_services() : void {

        if( $this->services == null ) {

            $this->services = $this->themeclass->get_service_classes();

        }
        
    }


    /**
     * run_theme_services.
     *
     * Check and instantiate the service classes.
     *
     * @return void
     */
    private function run_theme_services() : void {

        $services = $this->services;

        foreach ( $services as $id => $service ) {

            if ( is_subclass_of( $service , 'FunctionsPhp\Lib\Conditional' ) ) {
                
                if( ! $service::is_needed() ) {
   
                    continue;

                }
                
            }

            $service = new $service;

            if ( is_subclass_of( $service , 'FunctionsPhp\Lib\Registerable' ) ) {

                $service->register();

            }

        }

    }
    
}
