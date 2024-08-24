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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('MYSQL_NAME') ?: 'wordpress_db');

/** Database username */
define( 'DB_USER', getenv('MYSQL_USER') ?: 'root');

/** Database password */
define( 'DB_PASSWORD', getenv('MYSQL_PASSWORD') ?: 'admin');

/** Database hostname */
define( 'DB_HOST', getenv('MYSQL_HOST') ?: '192.168.0.23:3306');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ',A3MLt@:af,Cg83lEd2R-nwT},lFm!@-L#*q/lee]Q}6C$}?}e#2%VQRm}%-O.k$' );
define( 'SECURE_AUTH_KEY',   '*yRZh|f4QwPGCEn_Z}T0yZ1Y8>AGrt$mrcmOKNLEKvGTWJ?|cjn?^l<=L)PIgF3u' );
define( 'LOGGED_IN_KEY',     ',@]FF%i2L5YQ>P&MYexK-,0qP8h#e?aW:8B#A(Tp@mue!~SOgy~K&|2#{R<,g];N' );
define( 'NONCE_KEY',         'TyP|iZP8!ID}-, f5U7uuhI=3IUh[S,,KZRVt,vJw,<ojGbYt4<$B/V9jY,Y|;hO' );
define( 'AUTH_SALT',         'a+P_hW<kgb2`En;=kYs2HX <dKw|yqg=9uHi*ojmmcs9tKT[c(np1_]qqW8:5[@u' );
define( 'SECURE_AUTH_SALT',  '^JpNm-08J_W_P!js0IZ]pi*#rsVmh?RlOujUa&__L,SOp/Q%&}:>1}R-p 1xVV@f' );
define( 'LOGGED_IN_SALT',    'i+d4g<*MD4X6OY=YMVvWI$^u|X{m{[nN>Rs2u0!3M+S`>Z?fn)hG}5F;|Uvid$$[' );
define( 'NONCE_SALT',        'A%Z147h+q<N?2MhLvrT~o,*>6]j.tDXCBv3S2&a9F9FuyE?[T6bV7$gh/t}lZ;D&' );
define( 'WP_CACHE_KEY_SALT', 'tjEq]L*|_qzZ8U;4wL(3g&I3z.=df5:RG|x^GR6b(*.3A,inXWHEr*,uu@8y~=Hm' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
