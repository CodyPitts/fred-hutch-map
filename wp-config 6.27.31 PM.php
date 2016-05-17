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
define('DB_NAME', 'fredhutchcontent');

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
define('AUTH_KEY',         'J#+q-BTkw z.r*}z4l-t@NX7j+||)?mk9LlDc$7|:zyx}0@+u)[:7^d->RT]aO[u');
define('SECURE_AUTH_KEY',  '~Q%i|mJiOKk;wglB] 2B|q HQ!(h@|lq3jM}-0/3&}w|}j+gL19z+[>|g>Qky=C!');
define('LOGGED_IN_KEY',    'mMe1BX-|hUndw*e+P|j{$i-KMC/1d|H^SAIl0C+7P s>C7J2v?+.{o|h5TJQ<`}<');
define('NONCE_KEY',        '`$^|f2:@rm_5WiRI|=MO|.v6yEs[@2o#&2g@gya#ji+M_}m2~[{R^~j-zZb-g@hl');
define('AUTH_SALT',        'uEq:PH|FSn{VYZT+|(p--I__ERC?}e=A/Q^{[Hr*4VJ<F&rkE)3jTRTF-jU{]|sP');
define('SECURE_AUTH_SALT', 'W:xS$7k.?X%mr?Pj&c(d5*cs&[7uKWZA;[=<jkS`IsGLP5|CjZO4cuo)8^@3v=z(');
define('LOGGED_IN_SALT',   'oM!RWQ->L_[;L/?9O!@Gt^x G<22?V7t##*aYOuL@9YD8>?,^B[!X9#,2_ybpIt^');
define('NONCE_SALT',       'n}9eMWWd!9drcc3J )h?k<{@ICL++6*|}yo<W)~X[?M;(|zQp)IEd#I`5aPb1pJh');

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
