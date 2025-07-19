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
define('DB_NAME', 'annuitie_netdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'D5n6w-!e^Uj@by');
//define('DB_PASSWORD', '8Cf!XcZkh8-e');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'S(3 RI26[3M|*mk>4yK5ACw:R9>s(]2 |$U0,7#O0e7? pbsT*`dJMGF/s/LRE4x');
define('SECURE_AUTH_KEY',  '2uf88IrE>uO}+dT*][eh3V_yp8Nt<8(39>}>9DfcXWg1T,6zO_ *kZ9:52mUB&dZ');
define('LOGGED_IN_KEY',    ';5}fzQ~A[;YPehjS_R&?-uN>m!7v/k] ^&z[@!uR@@nV&Qcv:606Ll#1k9kKmNQW');
define('NONCE_KEY',        'n|BU-$dF&~i`.s<#oeo[p].iqa;h<O]Xc`d,h3s9Wvq8KE5L$,O+1xmP1BaJ07Ao');
define('AUTH_SALT',        'm=3O%$Fgmk+L <T1`f;jNcSE,*p(5zAh9|zT!>24@l@O^i>-@9[PG,6Q6gT-pZ22');
define('SECURE_AUTH_SALT', '(@CIJX+az^v@%;Z^s1sIgWfW}Et?rc|7./ (Z&le?dH1[?fgOo2b87Tx7gl7|}E=');
define('LOGGED_IN_SALT',   'P1uea(is;?Uu_LocC6~p%g#(a.7.@GPj_G@N[2!i!Qq[?B1<+}hvM!?ARqlh*3oO');
define('NONCE_SALT',       'gy7(:Yd8r|8@B}qRS?T(+HL8:SgmzFEX4mVU_+%W@qt+~(EA9jR/h.cSA]}q6*>g');

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
define( 'WP_MEMORY_LIMIT', '256M' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
