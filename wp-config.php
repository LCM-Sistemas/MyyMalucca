<?php
define( 'WP_CACHE', true );


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
define( 'DB_NAME', "myymalucca" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',          '.d*7&`rY],Z~GCyaGvEWm~>wwZzky6]~H lw@reXWz/s/g.Gze P4[=|E!+DsE/|' );
define( 'SECURE_AUTH_KEY',   'Pmg%VR;)`BA5YKiN8uD,v-%%hS^QAn}g(N<!EB1/*35I>!,}DsM~1{nPJ_O66|kR' );
define( 'LOGGED_IN_KEY',     '|Vfsnp@Dy=j`Z`6eVs$v:yvUDPvZ>XyCfA|[Jvi70l,Qo`[2}x!.a}@h=>t1K)f0' );
define( 'NONCE_KEY',         'TgeG8=Q+]<db%MZ_m<$D~uh|Z,H,|t&K?~bY%J*uqtef#5>]uUbx]<rl%V.,y,Y*' );
define( 'AUTH_SALT',         'F0#^U4]c+_5mh$U#D vUqe13qz>4z6B1]K(&w64IpD[TpNCa.k-k{o<?&>H+amPI' );
define( 'SECURE_AUTH_SALT',  '-Y3FxC5it<o__lfd)@YUs(kSsqYxk9#x,BAa.2E&WaAZV&1FnRdheR4eE3(_M{PQ' );
define( 'LOGGED_IN_SALT',    '4:1ERDe[W5tvZ1j,r&S~]*&1f|DsV|Jq@>4,JYOfC[j%vHxDeE$8R&JtxLJ/Y`;*' );
define( 'NONCE_SALT',        'kcAw=yEePFJd`U,CZzfY#j&+/oWrukEg(Th Wp<6:EH3|M}eTpdnbtewT=X`7#xf' );
define( 'WP_CACHE_KEY_SALT', '#l^Eo ,F7cmF?4RS+FYTp^+uqJ.9HjlunBaC9c4mmKQ%a?<?[vsXsF`T5:I*#|s&' );


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



define( 'WP_AUTO_UPDATE_CORE', 'minor' );
define( 'WP_SITEURL', 'http://localhost/myymalucca/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
