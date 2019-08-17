<?php

namespace FunctionsPhp;


/* Enable autoloading */
//require_once __DIR__ . '/Autoloader.php';

//( new \FunctionsPhp\Lib\Autoloader() )->add_namespace( __NAMESPACE__, get_template_directory() . '/functionsphp' )->register();

require_once __DIR__ . '/../vendor/autoload.php';

/* Run the theme */
( new \FunctionsPhp\Lib\ServiceBasedTheme() );