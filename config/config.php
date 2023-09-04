<?php

/* ### DotEnv
 * Sensitive configuration files are located in the environment variables file.
 * This library is used to access these variables within the application.
 */

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/enviroments', 'dg.env');
$dotenv->load();