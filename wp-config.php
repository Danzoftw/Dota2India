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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dota2ind_dota2india' );

/** MySQL database username */
define( 'DB_USER', 'dota2india' );

/** MySQL database password */
define( 'DB_PASSWORD', '?jUsT&#;2_zP' );

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
define( 'AUTH_KEY',         '6[I>wBUl(xYDlLXSU{[BO|r[0E/`ojj,x`Tux-iMnCd&=SJrE;# :g$DgHsf+h^.' );
define( 'SECURE_AUTH_KEY',  '%G:^B9fQvh~w}~Fc^oETwpA$,F2/8bYVvB{Qm&?]pNd,wEZwKva^_9M<ITqxuu,2' );
define( 'LOGGED_IN_KEY',    '(Rsgfw-zP$i[6s&ZmPlK%X%|w`=rc3@]S.VVc,u!9lY1g5<-U_*xg&0=8Ok<`qX`' );
define( 'NONCE_KEY',        '+Y;WZrG[e_I<4X&c`DRe~p5EgoZhHc`lDI?SL2^3>s}]LVTkZ3vCN(FGmlFU#hUR' );
define( 'AUTH_SALT',        'giFB,8zqC-cyIjVSJ+Fl4+9Nt?z+H:6BpKM /D,++[/U#;4wlVS$5x,5[,GnZem#' );
define( 'SECURE_AUTH_SALT', '2( XSm7Yzf6oS]]M]4tX-tnQ8zw/aFxQ>[s/O$.CJ`=kKi0ia5GwBz8li8`fFYp5' );
define( 'LOGGED_IN_SALT',   'dnJF}0W86_&n1v1/(,F$,)g($DHM#-put<PEK.rKlppf-M4q6DJ9YE1.#6F1Wo<9' );
define( 'NONCE_SALT',       'hXQ#I``6LSoZhy&r]9S=N|U9tdy+5&0K;6*XL]6D{lNX&uib~`@lSQ?uIM@&},Qd' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
