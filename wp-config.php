<?php
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) { 
require_once dirname( __FILE__ ) . '/wp-config-local.php';
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
define('AUTH_KEY',         'M;dr?qpLyAWC-04Yd}Y5.e5ni=qej9U))J]~pGFVP]1)z7&z9@T=|n-Q:vu>*QqD');
define('SECURE_AUTH_KEY',  '$&B43sU?FweM8lv~{.[imxoDQq5:Z#?YaZ-`-OgMI#M+~zYZdt_!D.7+BsgrRCG~');
define('LOGGED_IN_KEY',    '$1>}<dtbk=>ZE:0t.b4kC.l} b<8|;Md3Bs;c@.K=~s7wp#b,},av35Vx/-p*CGK');
define('NONCE_KEY',        'Lg-3` 9;fgUetFUo6VQ.~^3x/DGWFg/uY]_20d/D3.^?tB0A`:gNP.=,Fj~#G:[x');
define('AUTH_SALT',        'T>H7:;`0ni>`bkv4=jrm`}c&C}E$W!WMg `snB](hZ9JUlrHlt-gNfDks,@UufY,');
define('SECURE_AUTH_SALT', '`0@@@0TOl8917}?:Etw~&2/p0(-~7XtEciPbIkcNC7RYi=J8JsDr!cCT(zEu$bRq');
define('LOGGED_IN_SALT',   'g b[HBW/nD-;QkB#J>%[,g(pW5`CzU*eY^Be@FlXc?6`>nI*9xUO4yP,vcDsgCdj');
define('NONCE_SALT',       '_xQT1fWIf;R`Ti&$SNwc>+WOP2f!I-XT+W*?COh&iC`~7SqQfp;BwOw,GF}rqrO ');

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
