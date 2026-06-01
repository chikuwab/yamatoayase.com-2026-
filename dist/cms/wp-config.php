<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

if (preg_match("/www\.yamatoayase\.com/", $_SERVER["SERVER_NAME"])) {
  define('DB_NAME', '_yamatoayase');
  define('DB_USER', '_yamatoayase');
  define('DB_PASSWORD', 'm24gipxf');
  define('DB_HOST', 'mysql107.phy.heteml.lan');
  define('WP_DEBUG', false);
} elseif (preg_match("/test\.yamatoayase\.com/", $_SERVER["SERVER_NAME"])) {
  define('DB_NAME', '_yamatoayase2');
  define('DB_USER', '_yamatoayase2');
  define('DB_PASSWORD', 'm24gipxf');
  define('DB_HOST', 'mysql322.phy.heteml.lan');
  define('WP_DEBUG', true);
} else {
  define('DB_NAME', 'ys_yamatoayase');
  define('DB_USER', 'spadmin');
  define('DB_PASSWORD', '$Fe8wrXL');
  define('DB_HOST', '127.0.0.1');
  define('WP_DEBUG', true);
}

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/mkf/|KF{%<SE4Jg85?|(6%/^S--81Ljm:m{{f{kvG%*IsW79djU#m++CfuQ_cC~');
define('SECURE_AUTH_KEY',  '?E1.jFrX[N7+(`X!uW==H%A=3Q/q#;7MSQN|dDBdv3;R}4N;wL9%phvud!D+_oFw');
define('LOGGED_IN_KEY',    '~(DUH,lDh*jLY9-H997r+4is +n9$?{/GO(-y=i~Rq#$=Kzl|1Y0rtKBa-StO!42');
define('NONCE_KEY',        'tb12IlQ_2K2Vu-Xfl1Y5Fnlrc=K.-9|Sp0Y!{13^56-oGs205O5%|>y2<eoJ+c#P');
define('AUTH_SALT',        'Y~[-`h5EY|dwU@O|wvu_F>2p[4$78t>L1Eu|p+1 J)^f7%+%uxyK6l#_/RJ$gX6$');
define('SECURE_AUTH_SALT', '|-|t2UCy:weZgGB,zCi1ps9=)PKr|iul;w+CgPuP5xD}Wm@(4Z)r|xyl_eG9~L(a');
define('LOGGED_IN_SALT',   'q]f0JOk:&[6eGqxK-xPK5RWHZ/A/rha  _YV?Twws&{fyR}3hx]!j$?Q+c.%&R_(');
define('NONCE_SALT',       'mOR#DJ$Jh,QpV&vIWf}C$HW4>.JQ~1-+zlE,N3_{7Y*Mt@NJ/&7C;`mnpWr0n+mx');
/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
// define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
