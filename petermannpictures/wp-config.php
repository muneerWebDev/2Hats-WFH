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
define('DB_NAME', 'filmtruck');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'um5*vl6*nN2%3j^RUqDc&U*qI)OepRCysX*7WCbOETURBfycd%UoZlnDyA^KYow9');
define('SECURE_AUTH_KEY',  '*kyRa%XZYb1gJX1)5fgX)t(%xDp(xpO*YuF!WZ0X4aIXyw1MQ&x7@lbPKJ!1edHD');
define('LOGGED_IN_KEY',    'W5y4G!erfL%un7&FFWSA%m)JhW(x4ob0))qsbr6f0uKd91l%VsnEYLvG2Ii(i0eE');
define('NONCE_KEY',        'iy9BJo4*jom^AcE#xo0xx!9M5c@2kMeWb%EwsLhPt#PHFitOlwOvTtVDs8sLaGOR');
define('AUTH_SALT',        'TiKQGp5btXPfflJS#SeGBcUuFKeu4DX21zNBQniS5dAVsq&RYTV@kzkbNX#8ToQH');
define('SECURE_AUTH_SALT', 'hghX(CBVCO51WQ&CM9dOdoC5jSEIg6mHvR8wi1lxztPcm1A1*P4gCjJYBZ0Zm3Db');
define('LOGGED_IN_SALT',   'D9EOJ7mMnkg9Sw1oBEN#mh)k!8E&NhnAfbeKRf%khX3Wli0fK*D))O6jro%T1jEX');
define('NONCE_SALT',       'jYm3RQASxdVkLfaGBp!)nv10@KObS5s9*cNLnCWQPMfw*P2VMZsMYlPndgYHyCf&');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');

add_filter( "auto_update_plugin", "__return_true" );
add_filter( "auto_update_theme", "__return_true" );
add_filter( "allow_dev_auto_core_updates", "__return_true" ); 
add_filter( "allow_major_auto_core_updates", "__return_true" );