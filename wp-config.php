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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cI e(6xvu(X&pYVw&[SVdAmzLq=wih=kQzNf%i{r0K0H_gRKN0r[~dbUwJ/*m.~n' );
define( 'SECURE_AUTH_KEY',  '$/h+y%2z8(lP.qBii#d%SYB@9^4;!IIKDzUshE{67Ble`J;igGOzw64Y/CqS +}5' );
define( 'LOGGED_IN_KEY',    'H;;2vti,H^((6MzJOUGsTlEY$_024M=B1Y<`Z5*TdAF~Z3At<M+M>j>_u6~{yAhe' );
define( 'NONCE_KEY',        'j;?9>:s:5ACf@4j6<*0[X!HH&ajBbtUbQdP ^{Z x(adqy$xKEre:ztN5Jnsz3>S' );
define( 'AUTH_SALT',        'fL,.mK,,Km<TVVzk}<[#Lth0&ofGNmT+I95]M>U[*|%9MUuI[[fe}o(()FGfswyu' );
define( 'SECURE_AUTH_SALT', '^s+_$0o@Q]%Mu*Cex<?>r`Kx-Y5@|2>gHQoS5&iQ7-e&ndTK8fgr`3QiJUs2DeZR' );
define( 'LOGGED_IN_SALT',   'B.p0IYm%c%n5IY.=bUI`Lg:c;)BNfO1DI]O>@?DG~)h%^~|PzQ>K:Z%%O<o-e+mS' );
define( 'NONCE_SALT',       'c]V{S%?Gmn:FiI*}De8|vVgJ;yHO}Oj7eCP!+6 yc#C~|7&T(5#B3{FRJi}>~I[c' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
