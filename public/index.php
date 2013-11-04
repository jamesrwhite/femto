<?php

/**
 * Femto Framework
 *
 * @author James White <dev.jameswhite@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

// Define the application root
define('APP_ROOT', realpath(dirname(__FILE__) . '/../'));


// Load the application core
require APP_ROOT . '/core/femto.php';

// Get an instance of Femto
$app = new Femto;

// Set the application root
$app->setAppRoot(APP_ROOT);

// Leeroyyyyy!
$app->launch();
