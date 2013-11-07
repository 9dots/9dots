<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Heroku Postgres settings - from Heroku Environment ** //
$db = parse_url($_ENV["DATABASE_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'f^y2tE8-~3<p2T`C`y;Z9/2B+gW3G0w_,B.aDm3+~eA}u#*--R-V53c#RpKxZ+Gw');
define('SECURE_AUTH_KEY',  'E?gD#b(08+|X$;ajMku!Y(hW |+Q-upyD^$WJI/y24i:s<R;Den[S]qX9#q(H.sW');
define('LOGGED_IN_KEY',    'r$m{P/EgHDR>xG`m`l3`yYHpr?bp#p_kGtwK<(Luhj`F,}EF!|LDv.!_2Mj2KE/<');
define('NONCE_KEY',        'ELsVrpK- qrg.k_SwtB5-V]NuCmYUQ3~Abjnqi=Cqw<@u&JAY]<t*0=+y/A9`-qJ');
define('AUTH_SALT',        'q2I_:|F;u[_QORz*0zYD&)b0JO;F^l_5l5.krzo#1V+_9P|yz;s`&g5pU2=0J+p_');
define('SECURE_AUTH_SALT', ']0haJV1U*AWV 5/&{{7HW.VQ4q<!nA v&/@EVph5`wynehX-}3|H{mql1nzH(H~#');
define('LOGGED_IN_SALT',   'W<ixQFphg%([DkW9t<T^e;;PD.CszIwY1Ym-la;r2|Z|x@756VhU]:dP_*@P<YC:');
define('NONCE_SALT',       'eud8VeS2J-^XB%b+};(]V/.Eo?p=Vj|5{-(5=K}l/xRot+S+UjBGTv2U(_Aq~Pn1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
