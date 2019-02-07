<<<<<<< HEAD
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ship shop');

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
define('AUTH_KEY',         '_X:z#AB[Tn_w-b$j|VJ4^bZ!67uc{gyzdMTC5q3mxm4Q(utF_AKzq(>YSXGZ?;er');
define('SECURE_AUTH_KEY',  '(HF3OWK/)31N?w`KsgNI+l(a U_(U5mbcVZ5ksz3<MTMp.FWT0,kU lX&?[@{Dz4');
define('LOGGED_IN_KEY',    'qRPw,v)hcf7Kl?ytqN7uZ:jGV6&z6$[(e=lIxqYvCi~Z^8o=mLOy^g-cb4I4H)2A');
define('NONCE_KEY',        'SQdnr?0[&wn3~snJ*Aq!-vK}_hR+Ru2!2LHNVNo6l(LY:8Upqt0d#5CEQyVp!bFK');
define('AUTH_SALT',        'ST;%<FLl)>YPTOUd$pgm^%f*Ml+GJo|C|)d)V t)1S{cSw ><pIcb,lJj&S[tjv+');
define('SECURE_AUTH_SALT', '8[EK1y6issDn+tDhQ~{;%e@7yW@prriM^W*)7u9;zO.lI~D}>Oyp&DRp9. %DslC');
define('LOGGED_IN_SALT',   '~<8cT&V4eiBv3{`-PS!$]~sT,xgy[jb,e16 XxXmx$s9Hpzq>@$Zm3d;[]sBvH+2');
define('NONCE_SALT',       'pE:fm-9d*ih$K70|/Hcn=GCO.T+B1qBax%GNUz|P ksrO%gp<W=>iGEF*$:HlZ}V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_ship_shop';

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
=======
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ship shop');

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
define('AUTH_KEY',         '_X:z#AB[Tn_w-b$j|VJ4^bZ!67uc{gyzdMTC5q3mxm4Q(utF_AKzq(>YSXGZ?;er');
define('SECURE_AUTH_KEY',  '(HF3OWK/)31N?w`KsgNI+l(a U_(U5mbcVZ5ksz3<MTMp.FWT0,kU lX&?[@{Dz4');
define('LOGGED_IN_KEY',    'qRPw,v)hcf7Kl?ytqN7uZ:jGV6&z6$[(e=lIxqYvCi~Z^8o=mLOy^g-cb4I4H)2A');
define('NONCE_KEY',        'SQdnr?0[&wn3~snJ*Aq!-vK}_hR+Ru2!2LHNVNo6l(LY:8Upqt0d#5CEQyVp!bFK');
define('AUTH_SALT',        'ST;%<FLl)>YPTOUd$pgm^%f*Ml+GJo|C|)d)V t)1S{cSw ><pIcb,lJj&S[tjv+');
define('SECURE_AUTH_SALT', '8[EK1y6issDn+tDhQ~{;%e@7yW@prriM^W*)7u9;zO.lI~D}>Oyp&DRp9. %DslC');
define('LOGGED_IN_SALT',   '~<8cT&V4eiBv3{`-PS!$]~sT,xgy[jb,e16 XxXmx$s9Hpzq>@$Zm3d;[]sBvH+2');
define('NONCE_SALT',       'pE:fm-9d*ih$K70|/Hcn=GCO.T+B1qBax%GNUz|P ksrO%gp<W=>iGEF*$:HlZ}V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_ship_shop';

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
>>>>>>> e76afae64fb959fde37d7ea31038a54c29429428
