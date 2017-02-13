<?php
declare(strict_types = 1);

use \Slim\App;

require '../vendor/autoload.php';

/**
 * Initialise the app and pass in the config options
 */
$app = new App(require __DIR__ . '/../src/config.php');

/**
 * Register application dependencies.
 */
require __DIR__ . '/../src/dependencies.php';

/**
 * Register application routes.
 */
require __DIR__ . '/../src/routes.php';


$app->run();
