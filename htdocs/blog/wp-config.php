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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'ArturMaster');

/** MySQL database password */
define('DB_PASSWORD', 'imod007');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '* 9<wG3N-9~^uEqFh^07nQ^@6sj<EAUN[F,~c!E3;f)LbMCA7yFN86w]!X*j*]vP');
define('SECURE_AUTH_KEY',  'tOXMUU6cE+hTz!5p/JyM])muQNu5NE(f7:[%V2sr-0REe,{f [Meyu5OB48~5+&W');
define('LOGGED_IN_KEY',    'eKt9M0F.@/*&K0)%i,qTLkPLivP60T&Td39L:gH9*iq>-:4rdC*.4+!/hsxoNvYn');
define('NONCE_KEY',        'MZMPuMya9!V4w dmGV)sRL:~9KglK++4S;fZwLtt:F6nBGLNujzMJq^A#ILKT_:m');
define('AUTH_SALT',        'mIeN!UK{+&Ijk^L]i?,N3z^J>D_UH)Kd0Rs%sm}I=Oxzh]%le@cg[7`9VxYe/aKC');
define('SECURE_AUTH_SALT', 'Yq|Sju*e#8I+6^QVfUhSJl PeLps-IwjP3E2pr^`/2lpR9A5<95PXe.P[@<%pAg[');
define('LOGGED_IN_SALT',   'K)>)|b@#rLNFK(}]V|{gqYKrri`,?{bXX.R=Q-&w](f%[N,WtjUhe/&JQYZWkhh*');
define('NONCE_SALT',       'bS&Z_W8S mH;%#4qJ,:4]AO|%71V}_G ZnS.9zF!,5/8+V3Sy_bODqXBd,$<r:26');

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
