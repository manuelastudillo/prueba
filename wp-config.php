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
define('DB_NAME', 'curso');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Dwh[3H!{XGCT~1[(qvBiNv7juY+fFycM0gyw5|A!!F#[Y$2x_Wj*#fAgRf9`I=CQ');
define('SECURE_AUTH_KEY',  'jq@.~y9-b~.5hwo?0uY>YoTn=+lb`L!2x?$Kli:HuS7|Lq3;p`K|U}z~;xol(X|H');
define('LOGGED_IN_KEY',    '(?v/j%9`l-{qFYylk/!B?^ynU}GR}%G!}~]OR:A5Y2D.ilRQ.3_N3-!PK 7# ,rC');
define('NONCE_KEY',        '@J4<[lrv7A@~8*Rdl9JA^CDc3U07Z~GIT?Xa5MGkp)P%tSFsEc[*R>FjPn)t!rkZ');
define('AUTH_SALT',        '.tM5b(v*/l;I|Q(LT5q{_e2z:8(6c]V[9iPaF(5cl0-kk<t&ltG6)]r0w|Z;fU{-');
define('SECURE_AUTH_SALT', 'm).0L]b8ccN5+n{.l<_@P7nY!b[$RKo{$]?Jtz(oWf w}/]jJa h3`2$a%54se+Q');
define('LOGGED_IN_SALT',   '&N(G3iLa`lP^P+2J&U /$(?@!gq}#u)p3O2O;y/Mptg3?!rRVbaIN73/xm4U0l@p');
define('NONCE_SALT',       '/QMA7gte<MT5H`T6=f$ZN 2D|l,C#H<uw4I_2W$*2EvfCo~i):P9KJ=)v}]j,D50');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
