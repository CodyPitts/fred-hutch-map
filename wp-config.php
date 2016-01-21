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
define('DB_NAME', 'fredhutchmap-local');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'f5Wd2JWcv,;2&2RZ` hd94SC29`+[l9hQrh+dL|x~)_q^GYC+~<S4+4|>5PL+~~7');
define('SECURE_AUTH_KEY',  'CC7^]%vB?Jaa O@1@_r8.xL!u}q}_DG}C81/xkeFdK_|M!tIc;M6x|9;`7{sT/`.');
define('LOGGED_IN_KEY',    'A9b{Bv.,v^6pm+8iB.>S_DL<XT?9K`CN+?f,o18~?KJ1RvBw-b6c;Tq3E~%5aCo|');
define('NONCE_KEY',        'R47)/jd&&;]_Te>ByKKb2fSuB-u!ah}T-~Kv3xn(ARd6Y+D:zhawbgUu.?.M-UkG');
define('AUTH_SALT',        't?#]X||m_Wp5^g}2#rJ!&`^d^FS&H?7#|p+K(J9cgzs:R!!RTJHH9T+b8BTMz-9U');
define('SECURE_AUTH_SALT', '%b2vQi9GE%@Icb_@ G5Yc&y*x0Bv]=p-5 y}lyw i.y}<@Yq*<tgQo#;iP2AV5|3');
define('LOGGED_IN_SALT',   'Zwcp_QuaC3O ]y:t{%}O; t]p1W@-;<]4_H@&kGH~_[-x-Y=GRSF4A(E1n-|Z1o_');
define('NONCE_SALT',       '6*cjyfF @LIT50Z|J(E:J8V^:3kq!1OPL1t|L%#|J-e:-?>WQOy30-CI{+UcS/A?');

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
