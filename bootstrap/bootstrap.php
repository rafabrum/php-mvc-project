<?php

/*
 * whoops is a nice little library that helps you develop and maintain
 * your projects better, by helping you deal with errors and exceptions
 * in a less painful way.
 *
 * Here we'l set up the lib config.
 */

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$whoops  = new Run;
$handler = new PrettyPageHandler();
$handler->setPageTitle("Whoops! There was a problem.");
$whoops->prependHandler($handler);
$whoops->register();

/*
 * Configs like libs to use
 */
require_once('../config/config.php');

/*
 * Route files definition
 */
require_once('../app/Routes/api.php');