<?php

namespace FunctionsPhp\Lib;


use FunctionsPhp\FunctionsPhp;
use FunctionsPhp\Lib\Container;


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
     * Array of services.
     */
    private $definitions = null;


    /**
     * Array of services.
     */
    private $container = null;


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

        $this->get_theme_definitions();

        $this->build_container();

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
     * get_theme_definitions.
     *
     * Get array of definitions.
     *
     * @return void
     */
    private function get_theme_definitions() : void {

        if( $this->definitions == null ) {

            $this->definitions = $this->themeclass->get_definitions();

        }
        
    }


    /**
     * build_container.
     *
     * ...
     *
     * @return void
     */
    private function build_container() : void {

        if( $this->container == null ) {

            $builder = new \DI\ContainerBuilder();

            $builder->addDefinitions( $this->definitions );

            $this->container = $builder->build();

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

        foreach ( $this->services as $id => $service ) {

            if ( is_subclass_of( $service , 'FunctionsPhp\Lib\Conditional' ) ) {
                
                if( ! $service::is_needed() ) {
   
                    continue;

                }
                
            }

            $service = $this->container->get( $service  );

            if ( is_subclass_of( $service , 'FunctionsPhp\Lib\Registerable' ) ) {

                $service->register();

            }

        }

    }
    
}
