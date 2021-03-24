<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
define( 'DB_NAME', 'foot24_db' );

/** MySQL database username */
define( 'DB_USER', 'foot24-admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'P@$$w0rdFOOT24' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**API football rapidAPi Key   */
define( 'API_KEY','b0a87c0b1dmshf1baac56fb88b7dp17a0f3jsn15693fbddc16');

/**API football rapiApi host */
define('RAPID_HOST','api-football-v1.p.rapidapi.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jGOzW+F?8NO] ~|~w@y>XYyq0!W{zHAIy-?!eY9m K2.!e-1&@q4qU83!@:sNN:.' );
define( 'SECURE_AUTH_KEY',  'fo)f|D4 5ZU:1<^xaKoyC>|?k&I]xs_JvBnfu-8GPo*9^`9HdSq^a_H>Td@4g^`&' );
define( 'LOGGED_IN_KEY',    'b>{rzbSN&Bhskw{A;`Klr Sfq0|Ep)tR_tW<1ck`%YUG :-,Tx0W@e#Thpo1^R.~' );
define( 'NONCE_KEY',        'LMpij<O]cM)Jb2nVL&)Ot1KHKToa6c=d1;=.R?duH`AY~u,uk]r):h$RFBxM2<7t' );
define( 'AUTH_SALT',        '?c5EY1K8jS>IM^Dd=|cYQ.aZVv2ul>O}RPSa1s()zymWGt2wdHoH3`WtME}N]rlo' );
define( 'SECURE_AUTH_SALT', 'I{xln[DL1k<J4`*/YUWkx 9H,X*9%31PmXNTwuj6PZB#O^L#]8M0*ydlhtMgABYz' );
define( 'LOGGED_IN_SALT',   '}<.nlKJ+uWy)SiRIv%*Z[]7]+`{h,QrHmJ3CRTnm~#F/WjCK=?TKlCmd7B$mU<Hm' );
define( 'NONCE_SALT',       '.If*2#_pGyz~}doi`1h/!TIP&?afR^7Vq^A<o5lr|$Owl49TD9.ONr[)Ug^]u:x<' );

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
define('FS_METHOD', 'direct');
