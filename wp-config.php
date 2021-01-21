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
define( 'DB_NAME', 'acv' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ',RJ|NCu-5$C(dVfWBUqQ{N86^6W(0G-2Y^|-0?bw~d2*+0;whs96MRzCiW3-7v-0' );
define( 'SECURE_AUTH_KEY',  'K!ZT!p @Podvi`[@:-9#QSzln;7 Esbn>,bCA9z;rh~=SIQ1]o-B+i8wMtoWzm%5' );
define( 'LOGGED_IN_KEY',    'SDdy#Gs?~XCZ_q?*QU=Y3U$=^;CB8FQ8HH,g}^(UPeCD~~/):&#iMeb#AD6h-OEp' );
define( 'NONCE_KEY',        'KB&~-]BMbe$=_*KaoP/}-l4P[{M&_G&Mp fPWXGpm2%x@{Es^m67)W096m}PaMGo' );
define( 'AUTH_SALT',        '_&PkLW3pi8I F{YhQe4dvLa) FO>_Gb@Hz-&?4@y*uJ,Sr3758WIZ|P*Dtkd>G<=' );
define( 'SECURE_AUTH_SALT', 'X?(!dWw1c}[}X[}Cw^Pb!&G<gqJyB,|5G{B0!6/MDKQ.k9l:0f.T><@A]B!^LIm#' );
define( 'LOGGED_IN_SALT',   'gb)eE*WhOfV[z?]4;TVxZ+8Y10)Ny~w<.b4vRl$E2]A)3Aw7C-_4G}1Kb82:G+`B' );
define( 'NONCE_SALT',       '4A85nh^(8s5~,D%6pAT|zG.^=-Q/SW<B_k5a0 }E$!<kqzfqWa`:cu!yT?p?o.h?' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
