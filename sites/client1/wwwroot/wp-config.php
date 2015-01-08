<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'anton');

/** MySQL database username */
define('DB_USER', 'anton');

/** MySQL database password */
define('DB_PASSWORD', 'Gspice1988');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '+2LhmVjYT_K]l9z%w] ,|Z$rT+_JN YJ/`4h-K[-(F<NBO)5?w3:gpc+%#n>[NYt');
define('SECURE_AUTH_KEY',  '+qslP=s1DvEwo7LFE;b[k*c|V}`4/@Ws8&}V-=fu--ljm%x$1gV.c>5sf#}{@x ?');
define('LOGGED_IN_KEY',    'BwgBY3T^$j:ISu8ahrUY~IRYqU+K]E*;~*CNuNLw^UhQpsx1`}8[-ScLxj5h#_6x');
define('NONCE_KEY',        'B*J`?G7L x?[>v`nXiNw-7<o`b.xtv%#)CjiQ#oqI?/!U9/2kBm5]F.LJ-`E`|+3');
define('AUTH_SALT',        'Nbc3J]*i+{dSZXZ-%yTOEGiq]j;z;di6 #cxd01zlyD3v<F-AXE^y>NSl& VV&$!');
define('SECURE_AUTH_SALT', 'iL>Swq{38[ncI:!H]}835?9!$]Xu--|W~RZ3KEn!u-ohHUl?t<b=lzOCL,4-FF-*');
define('LOGGED_IN_SALT',   'm-Y[I5{UV7JTn}J--I))`jz-3xM$5c#t)[CvH;@-R%V;JTbq#C6/R^*#Sk3v)>am');
define('NONCE_SALT',       'j:9igQhRLC@|I|3-!3jA^AJlJ.;^u+[zDlC#6*x}2F4|*{Jr5Viz8Pce)Dl6A<cd');
define('WP_MEMORY_LIMIT', '64M');
define('FTP_HOST', 'localhost');
define('FTP_USER', 'teflonton');
define('FTP_PASS', 'Gspice1988');
define('FS_TIMEOUT', 900);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
