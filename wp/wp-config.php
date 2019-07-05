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
define('DB_NAME', 'mft');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ro%O>t;-CA%4Q(V|{hi24ka8QQ+R1kjBMc|xA5b~FuU_{[YZWU@YN:G5uW-TEs&g');
define('SECURE_AUTH_KEY',  '|.1k0d*F=+QP/@Y3Cnba~goqly}z3y*|9X=8ukEz-_M3)4xt0cv.7OT#/fmni0X4');
define('LOGGED_IN_KEY',    'ffKz?@/m<UQl9g2;[3n6Oq#U5MJXFjQDnFYq2&}&`&U9&KdUf6]fP3,iN_djy*;c');
define('NONCE_KEY',        's_}eIg.AH!b-Wt|fBiIOitG;1*#R 8w/MU+3F1UnioB$L3~s=h|Y19QB#%T#H<)@');
define('AUTH_SALT',        'lx!Nf:b6ipzBL$KR|4=J~+kAMv3Cwi8)7K V^mQJCA*?LU&p-|7^(dmi@nTWM>P,');
define('SECURE_AUTH_SALT', 'zq)90<bLbjcxW)KD1]nz>S[MJ&CQP_rMe,8s/)+fB_LW=Rzb A0RUq$x1x/[1x<=');
define('LOGGED_IN_SALT',   'yO2^M{AX2,9.TjTO_R$.,_YQ(I!MVUZ:)N_ctn6Bw)}e]/7$70q+9sPp!1Nwua:&');
define('NONCE_SALT',       's6Zuk?s]`5h0O;Q`_A UGov2P.(7eLoMNu6LMSTO-Gb#T~qE@wS+@S2z<BZ=S]$ ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpinsect_';

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
