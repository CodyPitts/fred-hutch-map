<?php
if ( file_exists( 'wp-config-local.php' ) ) {
require_once 'wp-config-local.php';
}
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if ( ! defined( 'DB_NAME' ) ) {
define( 'DB_NAME', 'wordpress' );
}

/** MySQL database username */
if ( ! defined( 'DB_USER' ) ) {
define('DB_USER', 'root');
}

/** MySQL database password */
if ( ! defined( 'DB_PASSWORD' ) ) {
define('DB_PASSWORD', 'root');
}

/** MySQL hostname */
if ( ! defined( 'DB_HOST' ) ) {
define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2;NZ97F*r:|o*$&vd-PZhUqX`1D!m}*6HH%,v-K$jn1f{#p#q0S*Dul 8QP4Gf[^');
define('SECURE_AUTH_KEY',  'k2pGBN7Z^(m){J,`gQIiVW{[hq:DF@`+%iT% +Gf!dyLs 6vI#kRqtI>MI+3*r>&');
define('LOGGED_IN_KEY',    's4}*1Qym~iW|aDz=1(C8fsj.5CPMy6:nsO2s ce3=I%gzftEjt0 )n<=[G{#aU:D');
define('NONCE_KEY',        '^}a !o+aJH/&_XYVeZl(|6Y2gcJ%-[<spYRU~PL,j`/n-r Gbm#q*.jc.1)9I+Y;');
define('AUTH_SALT',        'n4WYq-]]&*Ci+4BQ41bd-71y0|W?%V|&9GD~38&1Wt.@.5W|6yy~3b2Q+lok&*P?');
define('SECURE_AUTH_SALT', '/%>%d`i{D4:+b?,vL,I4IxjF|7Y W>3&nj(:+xcebrlalI&.rEOodTK[%+-+}J`i');
define('LOGGED_IN_SALT',   '}-1w-= c+X<.:NMpS0`|<[@o@du1WpX@M5m.iD:<C~{?+@A,`21Ce{=S@3oLXe f');
define('NONCE_SALT',       '|Cv%z%47@8,88f[3l7OvIBJSw!r{SeheD;>R:i=fg-)9vQS?5|O|+mF?|HX0@f_A');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
