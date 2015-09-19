<?php

require __DIR__ . '/vendor/autoload.php';

if ( file_exists( __DIR__ . '/.env' ) ) {
	$dotenv = new Dotenv\Dotenv( __DIR__ );
	$dotenv->load();
	$dotenv->required( [ 'DB_NAME', 'DB_USER', 'DB_PASSWORD' ] );
}

if ( file_exists( __DIR__ . '/wp-config-local.php' ) ) {
	require __DIR__ . '/wp-config-local.php';
} else if ( file_exists( dirname( __DIR__ ) . '/wp-config-local.php' ) ) {
	require dirname( __DIR__ ) . '/wp-config-local.php';
}

if ( ! defined( 'APP_DOMAIN' ) ) {
	define( 'APP_DOMAIN', $_SERVER['HTTP_HOST'] );
}

define( 'WP_HOME', 'http://' . APP_DOMAIN );
define( 'WP_SITEURL', 'http://' . APP_DOMAIN . '/wp' );

define( 'WP_CONTENT_DIR', __DIR__ . '/content' );
define( 'WP_CONTENT_URL', 'http://' . APP_DOMAIN . '/content' );

if ( ! defined( 'DB_NAME' ) ) {
	define( 'DB_NAME', getenv( 'DB_NAME' ) );
}

if ( ! defined( 'DB_USER' ) ) {
	define( 'DB_USER', getenv( 'DB_USER' ) );
}

if ( ! defined( 'DB_PASSWORD' ) ) {
	define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );
}

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
	define( 'WP_DEBUG', filter_var( getenv( 'DEBUG' ), FILTER_VALIDATE_BOOLEAN ) );
}

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

if ( ! isset( $table_prefix ) ) {
	$table_prefix = 'wp_';
}

// https://api.wordpress.org/secret-key/1.1/salt/
if ( file_exists( __DIR__ . '/salt.php' ) ) {
	require __DIR__ . '/salt.php';
}

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/wp' );
}

require_once( ABSPATH . 'wp-settings.php' );