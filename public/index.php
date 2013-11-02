<?php

/**
 * Femto Framework
 *
 * @author James White <dev.jameswhite@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

// Define the application root
define('APP_ROOT', realpath(dirname(__FILE__) . '/../'));

// Define the core folder root
define('CORE_ROOT', APP_ROOT . '/core');

// Load the application core
require CORE_ROOT . '/femto.php';

// Get an instance of Femto
$app = new Femto;

// Leeroyyyyy!
$app->launch();
