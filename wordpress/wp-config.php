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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'test' );

/** Database hostname */
define( 'DB_HOST', '172.25.0.6' );

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
define( 'AUTH_KEY',         '2Y7)v>d=hfjQ Z_@rEv`VUs CtC Rj=zFn+O4aBKdpUt:o}H/mgNj<xlYRv2~oLy' );
define( 'SECURE_AUTH_KEY',  'jMNpK&r#w1YPB~ wo+lX~E.Qq_RL;qvZuBl(1nK`Q/ P;?:kl~rN`x*Slu,#D;`i' );
define( 'LOGGED_IN_KEY',    '`vGlibT!,Ka`gxuKKwGRAG+qUZ%nJOH+_9tsOm+ohzqzv8U2g^.T|8*YX$mA9JP1' );
define( 'NONCE_KEY',        'T<)I ?,8*E4-DTFN<<t*u,+RC^BS9kp#,E;4nmhNj#A&,~$XUBl;^IQ<H8LQ!et]' );
define( 'AUTH_SALT',        'HiZ Uz0}Uunn4Cj{|7#|=$*nk$d<lyt*9MT8]b.-(q?D(]lni<-zRkc}8.ZPIb9Y' );
define( 'SECURE_AUTH_SALT', '&,OTL19&|o;dHx~|QRKd2e/+cS;,AUxqk+j8/}_f/2.mB;~WMZa*uP^sqph,rA&%' );
define( 'LOGGED_IN_SALT',   'e|{CiT4Fh$#])fxOmQR1h~HAi#Hz~J<Pn^BWmmnjuL#0slu&^4%:wnmJH[6SWIS<' );
define( 'NONCE_SALT',       '2dc^J:=U1Qa6T<jCo1CgnQnEITuzuF?c[Rq=AtK)X~NL=%b+*akPa^Yp*ZiAGL#g' );

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
