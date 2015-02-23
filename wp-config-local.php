<?php

require_once(__DIR__ . '/vendor/autoload.php');

Dotenv::load(__DIR__);

define( 'DB_NAME', getenv('DB_NAME'));
define( 'DB_USER', getenv('DB_USER'));
define( 'DB_PASSWORD', getenv('DB_PASSWORD'));
define( 'WP_DEBUG', getenv('DEBUG') );
