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
define( 'DB_NAME', "news_portal" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         '.GiIsC8oC=bCVYO=$cvF;D:A_I)-<dneXO>/@d$jBHnXl>35;4Y@G^oY8#%)3E!:' );
define( 'SECURE_AUTH_KEY',  'CqhHl<g;sE>gt2_;}v|r9P0z=v=M=)1$8WXZ_+U@TsA1oq>q]G{T)#S])pvRUFUt' );
define( 'LOGGED_IN_KEY',    'Tp&C5kud#|vlscYLm]2*gDqL!C ^uk*30w!etTi:]5Id[C9]t-wTqKpt)@q`M7$r' );
define( 'NONCE_KEY',        '<mfO|/zK=l2xj!v/C[Ks@MxA9*c6<3V[2Mfj|z=ym+ YEv1<YH:7}ssM`?r]Chbr' );
define( 'AUTH_SALT',        'A`-a^ h-}EMVMmig<XG`|u*S{h[]425To;k*pxmky0Mv@Ji vN@~*7Svg^&N!FZb' );
define( 'SECURE_AUTH_SALT', '9Y@zj3//gFiQ#aidmBqxUVEeZr[]_Pvk7,$rzg|Ffxox4hhu ldD$afjSa=(H<cM' );
define( 'LOGGED_IN_SALT',   'CA2sN!(urnkg_hH_r]T|t^r&Z^,cDm10DRI2awiQ0v!]EJ0P(`6TgT5xhmZEZ3mN' );
define( 'NONCE_SALT',       'l-cg|T4,u=p#J04x2jr/F~-n[IIq$Wa(!{+0A-Z*wPm@;{^QDusj~PP-sQSkTn}}' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_SITEURL', 'http://localhost/duplicator/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
