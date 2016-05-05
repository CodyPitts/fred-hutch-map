<?php
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
define('DB_NAME', 'fh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** ADDED: allow for font files to be uploaded */
define('ALLOW_UNFILTERED_UPLOADS', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qW7.o0lG>XCq@xpX1exI6a}c-=fB@v1jtYx@xoY-+VmJ }.0QUW)GsF>~uH{40Ti');
define('SECURE_AUTH_KEY',  '|xhPCloNRrAp&Ep#;sC~K;Z|(.tpL>h_?44IYC.,PoFJ3R)QRuA-#OZ80TVVc4(p');
define('LOGGED_IN_KEY',    'xYoy|%o`6^e&Ik2wjT&.Rnt$j:h;9t~=|ZId)eN+v=)ew6eWSv}Rwy9jzhu$-.T%');
define('NONCE_KEY',        '<O|26Z?~?,$CHBdf@V,>L:`z]O1OjGsl2;0qH0@J1MvnPM|y 8]+{3vyOQC6Tg9h');
define('AUTH_SALT',        '6EA8I5cc]Ft*)cbhSc-?pzXtH;,n+s8RjYqCu{WzplO<Q8Q@>Ty;&&rsMw1s9<iw');
define('SECURE_AUTH_SALT', 'Y?<f m2=l@(R9oL>A2w^69b6}HLl`j{L |M(v|*peF/J /bLwNg:2_U7]1Uc4OM*');
define('LOGGED_IN_SALT',   'I:_EimU&3hn}hyZKGH[[-UH*RQsiT+S!8q}~y?G2,x%/#4u<{_Jx&IQp3v!7g$f3');
define('NONCE_SALT',       '$]UUblJ-8^enaCAN}`w73)KQ((HkT;@p1Cg$k]or|0gVdP IdJ#--VTdtt2M*Wz ');

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
