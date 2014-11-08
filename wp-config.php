<?php

require( __DIR__ . '/vendor/autoload.php' );

if ( ! defined( 'APP_DOMAIN' ) ) {
	define( 'APP_DOMAIN', $_SERVER['HTTP_HOST'] );
}

define( 'WP_HOME', 'http://' . APP_DOMAIN );
define( 'WP_SITEURL', 'http://' . APP_DOMAIN . '/wp' );

define( 'WP_CONTENT_DIR', __DIR__ . '/content' );
define( 'WP_CONTENT_URL', 'http://' . APP_DOMAIN . '/content' );

if ( ! defined( 'DB_HOST' ) ) {
	define( 'DB_HOST', 'localhost' );
}

if ( ! defined( 'DB_CHARSET' ) ) {
	define( 'DB_CHARSET', 'utf8' );
}

if ( ! defined( 'DB_COLLATE' ) ) {
	define( 'DB_COLLATE', '' );
}

if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

if ( ! isset( $table_prefix ) ) {
	$table_prefix = 'wp_';
}

// https://api.wordpress.org/secret-key/1.1/salt/
if ( file_exists( __DIR__ . '/salt.php' ) ) {
	require( __DIR__ . '/salt.php' );
}

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp' );
}

require_once( ABSPATH . 'wp-settings.php' );