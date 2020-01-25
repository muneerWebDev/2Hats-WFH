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
define( 'DB_NAME', 'landing' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'q3fsKP~la+4)a8Z9J*C(xf2O)Z%:^gl6cVtrC-Nm9/Y~~pcmD+dM>d>19)x9h[J;' );
define( 'SECURE_AUTH_KEY',  'HJo-X7OCS3d4z1j(]`%S^L2zIcD%)[Gi&9yS@sM42QiOC/dduD$M8L)giv8h{OK#' );
define( 'LOGGED_IN_KEY',    '8a-kR1!r.u-vU<8S!3$Va5 Im3QR4./5,1]-IQ7pZ/lnVge[:$W&&)!X4=O|<Z~B' );
define( 'NONCE_KEY',        'jUtVk,`:U?jRHU9,o^F~My3Crg>[:&E@*fF~M[UaS`1)I#F-ckYmm Zs=y,t{*h@' );
define( 'AUTH_SALT',        'DmI2;jwAA,#y+d-r4rj4q*LU9ac6kzWFaX$j9iw`Z,~1wuo1H=*tQzVu.ABN,Dha' );
define( 'SECURE_AUTH_SALT', '#[RZu5tzu<wF>Qy8>]gdOE%N-#1~UlC:Q7F@q@R AAt^/yo+hi.vHbu@bGNkDvgU' );
define( 'LOGGED_IN_SALT',   '-QR<DLIHI)XnkEbz~s<{f&m}j/Sm4FK FnM%sf^0&Oz]X%Hn7CA.o>214AvV0H6^' );
define( 'NONCE_SALT',       'O[%uVpgz*cyc5O/}u1aivHA}ZOaDZAVfh/s-il)%^1#~tg-&PB6cJO5-B$h1q6YB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
