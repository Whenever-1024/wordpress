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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'test1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '+rSX+`w-cnq)JEp`Gy#7q[yeovG=(P*6@gY2j<Z7|vz!XRup=!-ICaIC?741ox&*' );
define( 'SECURE_AUTH_KEY',  '|Z>%H7 /uhN%#[^X7wMx-SV}l#)hk!he5fm3%Z2>!fny,r_H@qNubagQWUR7USj6' );
define( 'LOGGED_IN_KEY',    '?Xzf0;GcpzHEH)]R3p)gT$-NZh+wheBIR48b(n~H &W=W~AX/.?Y;O6:A.DY/$7&' );
define( 'NONCE_KEY',        '2UY|kDuqAt@2Ca@g|uq*RVPXV,/hFcFNni>6/x01`,3mO~)M)sJ]2.zd&=P TFdV' );
define( 'AUTH_SALT',        ' M+84#w{G3qocOYe%HcRvz=yu8<_FlDjln3h Y6PkGt |N9j6qxGLpcmE$nHm?n!' );
define( 'SECURE_AUTH_SALT', '75X3oZz]k6{+qdPb)9}$h_~1F%,XAHl8Dlykmx}bSY.N]Q{<V{zS]96%;<*Om{c1' );
define( 'LOGGED_IN_SALT',   '&Daxv=LZ?w[D7bmJvz[Z@ZkFD5]D.19N5ug]4f:;/9jxMmgEd%riTy4vyE}&jPot' );
define( 'NONCE_SALT',       'v|}bNF45}6Q::*v%%10=}+@Aq4_g[&,F^ls+Vwy|uID7P#`0OjjoR#xV_=(MizIS' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'woo_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
