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
define( 'DB_NAME', 'petermannpictures' );

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
define( 'AUTH_KEY',         '2Jt<(::GTsLpT74]QBtUY#NnG{Ohe[)[`<!@5.SHwkb#|| K0H$0V|dxUfTxZPs;' );
define( 'SECURE_AUTH_KEY',  '<SGtJm+<#/MFxZ%Y|EYQkuu+)Ge$DR%j@d9fm#Y$p`d1]W(<6Kv_+RmA/M--1qA ' );
define( 'LOGGED_IN_KEY',    '@lXJ3.XqbK:)#<&!n Z0R#pY`c,a?CCK]aP|bzp|./IRb6_5tpid`|)i5S KSCz_' );
define( 'NONCE_KEY',        'QWCf&s<wT9`u`_A9&eOKr}4mi-8<!w;YcCielE<$u4]#))`tg!:qAsEyk2>fADXb' );
define( 'AUTH_SALT',        'K&!II,n`gY-2ib5G.J7e]:_=M5~Gn%}BXv7--}&giMo[zsgU444ip><(-)[g(Y})' );
define( 'SECURE_AUTH_SALT', '^LgZW#p5E u7$I2WdiL9chOJly|LFGRb>f%7_l/Ur(rEllRA`K&V/PI*U/o-BhzK' );
define( 'LOGGED_IN_SALT',   '*^+{7IJcJBZINb#2w_yMu[czOAej9D-ohae%9K Z71tpuaIQwcBuHr5HNCGDpgAc' );
define( 'NONCE_SALT',       'Rzw]k;L(Ii2tu|}_ZxUd,eyH^`Q-:C88E+sc!jViY~TQrp|96P YN2(kodk~64z@' );

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
