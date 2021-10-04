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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sammywp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '>?.*j.qdhFGQJ/rq+3W;602MTrIw<ZbM;c(%Hj<6TUr4}_yh,.X/nNxI{gXh|8CX' );
define( 'SECURE_AUTH_KEY',  '8RxQ|M_2Ws{9`t,OBDl+3PmsXW&lO_s.{^W`#kAgL!EHiZMD76}h.|q$]%xoNxq4' );
define( 'LOGGED_IN_KEY',    'E}xyb_F;7e_iK8{21K$zEMU?y9)Y3wI.~gflfF>e?-lhC]66MT.pY[K2dqr:wp*=' );
define( 'NONCE_KEY',        '~D?Jfq}@L.gLzQ_rW>&!ix1XT*mtVA8dx8X`#;:r8 f,Bhrq8%/i:/vq;+g<?/V ' );
define( 'AUTH_SALT',        '_N-/z>$,3bz4+tpmTu8[jZv&Lb}KotL%%C94SZoZP4L[={)qp(`b@M pE*3+- %4' );
define( 'SECURE_AUTH_SALT', 'GfwJp<oAHRjciMvn9B0UBHDbLYrX(hI=F*UQm!R7i%ll(eMLl&[xt)ZOqJs/Q|V+' );
define( 'LOGGED_IN_SALT',   'LOn `he V#<c_r_D_ KSmifYS4^1gmA)8trO8#Q:W?=a<3/.p`l=6k_NQ U`ASpO' );
define( 'NONCE_SALT',       '+`N-WL!1t*8eye?dcdEv#c|5Dy/Pc)1fd%#&j#plynTsLCnHx9eqbg)?lwJZH8Ms' );

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
