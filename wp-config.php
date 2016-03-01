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
define('DB_NAME', 'scotchbox');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY', '_Z8[:u3-Df,TQBIkc%[rtk}@X/^4AIMqq|~{.9Mq2Eg:kkZW|;@V5!D;]3Ujw9He');
define('SECURE_AUTH_KEY', 'L;_`MwM0{i|W~g-P-e+jxcy?(*S<VOXTKZ>:Aj68DyAayVp:tc94FY?7bSc|M`9d');
define('LOGGED_IN_KEY', '{!EY[$xg<#u)Hl[xL;I#t|DVHBK-WT-MGbzFZNeP|MbScJ:%5L[$b>9CPa9}[KM~');
define('NONCE_KEY', 't3.4eN^i@kL+EylVgU)+:z(HR:6I7eo1$HCm+dXRYLL|-R,lsnu-Q_Y3XmU[M? 2');
define('AUTH_SALT', ',hI<nibMo+%5J07obsz|){p*k0K=-l%omzD6]-q-}}.fS?}hm5ci=HiwQMzKRwgr');
define('SECURE_AUTH_SALT', 'Es7ioA5/9o)$]UF_|lor%PTlL:4ATvwPM*^D%LFd/]|---Y*^&!D]Bpa K%*`ZU)');
define('LOGGED_IN_SALT', '@|FO$*mH+?Y4AP7Q]qw&-IO4fqNxsi;|~[!u)K4Y?X)=:2dS}bAhd9nypaIc,Ggz');
define('NONCE_SALT', 'IF,mNCPw2C@1ML4re??0^Y1Ke^D?-(?61opHNC~M=cu t^^`6(L?:}klg&S?goK<');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_ENV', 'development');