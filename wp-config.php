<?php

require __DIR__ . '/vendor/autoload.php';

use wpscholar\phpdotenv\Loader;

/**
 * Trick Local by Flywheel into reading these values
 *
 * define( 'DB_HOST', 'localhost' );
 * define( 'DB_NAME', 'local' );
 * define( 'DB_USER', 'root' );
 * define( 'DB_PASSWORD', 'root' );
 */

$is_ssl = (boolean) getenv( 'HTTPS' ) || 443 == getenv( 'SERVER_PORT' ) || 'https' === getenv( 'HTTP_X_FORWARDED_PROTO' );
$scheme = $is_ssl ? 'https' : 'http';

$loader = new Loader();
$loader
	->config( [ 'adapters' => 'define' ] )
	->required( [
		'DB_NAME',
		'DB_USER',
		'DB_PASSWORD',
	] )
	->setDefaults( [
		'ABSPATH'         => __DIR__ . '/wp',
		'DB_CHARSET'      => 'utf8',
		'DB_COLLATE'      => '',
		'DB_HOST'         => 'localhost',
		'WP_DEBUG'        => false,
		'WP_TABLE_PREFIX' => 'wp_',
	] )
	->parse( __DIR__ . '/.env' )
	->set( 'WP_CONTENT_DIR', __DIR__ . '/content' )
	->set( 'DISALLOW_FILE_EDIT', true );

// Ensure that we don't cause trouble when running WP-CLI.
if( isset( $_SERVER['HTTP_HOST'] ) ) {
	$loader
		->set( 'WP_HOME', $scheme . '://' . $_SERVER['HTTP_HOST'] )
		->set( 'WP_SITEURL', $loader->get( 'WP_HOME' ) . '/wp' )
		->set( 'WP_CONTENT_URL', $loader->get( 'WP_HOME' ) . '/content' );
}

$loader->load();

$table_prefix = WP_TABLE_PREFIX;

// https://api.wordpress.org/secret-key/1.1/salt/
if ( ! file_exists( __DIR__ . '/salt.php' ) ) {
	throw new RuntimeException( "Please run 'composer run generate-salts'. You are missing a salt.php file" );
}

require __DIR__ . '/salt.php';

if ( file_exists( __DIR__ . '/wp-config-local.php' ) ) {
	require __DIR__ . '/wp-config-local.php';
} else if ( file_exists( dirname( __DIR__ ) . '/wp-config-local.php' ) ) {
	require dirname( __DIR__ ) . '/wp-config-local.php';
}

require_once( ABSPATH . 'wp-settings.php' );
