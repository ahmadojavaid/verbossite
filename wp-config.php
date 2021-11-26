<?php
define('WP_AUTO_UPDATE_CORE', 'minor');
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
define('DB_NAME', 'verbosjobesk_db');

/** MySQL database username */
define('DB_USER', 'verbosjobesk_root');

/** MySQL database password */
define('DB_PASSWORD', 'Gmail&me009');

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
define('AUTH_KEY',         'sfTAuLJD0JFcpKA90pnEDsX6a8vPytDA5whgAi5K2vGBDzvYMr6PxzjuqHQ2HkhX');
define('SECURE_AUTH_KEY',  '567FySUciexOkR0H4my7MnG5YXMhsZ9wfpCy9XowPyr5D9IOwE4ygjr0RloMcsqP');
define('LOGGED_IN_KEY',    'bbL8p2NVj6I32Kfv4AmiXK9WZ9mpwtrc92v94ZAZqrIDUOWiwocAwbQAJgw5JHKo');
define('NONCE_KEY',        'iEQQJDuz7rHTG1dZo1FH4fsYSPLQC2HF4CAAJcSYC4GVfsyZfgrzmiWarvO7xXJv');
define('AUTH_SALT',        'dxOzkxWDfpExrSAoSctuiSjTigZkyRigR3LI4gk9yQVe4hY2in0beZ8XhVeVZc9k');
define('SECURE_AUTH_SALT', 'ilJc3QLsS6wACMyFxOqMTTwyWc1gTsjp0HVtfhnYWY74SAIPXRcTjCucAKgvHFL1');
define('LOGGED_IN_SALT',   'zMQ0rXWt9glZy1BiYUiq3VujT6KhuiHA3AILFfEiCa9gW34iKDZ8qKodTYcZWLNO');
define('NONCE_SALT',       'PgXiBfMiWXNO79ItniMQJeno8h2idw0aJYxx90mlN5kHz5xTLb0RTPD4NBOw92cu');

/**
 * Other customizations.
 *
 */
define('FS_METHOD','direct');
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


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

define( 'AUTOMATIC_UPDATER_DISABLED', true );
