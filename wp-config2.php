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
define('DB_NAME', 'fuja8cd1_fujiya ');

/** MySQL database username */
define('DB_USER', 'fuja8cd1_admin');

/** MySQL database password */
define('DB_PASSWORD', 'g4H%Rtft^q#3');

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
define('AUTH_KEY',         'V2bLSkl!@z>XgOw8h~PhdK.$*lI/HoPW5W8Ow_4{-|(bTvpvP?Tz}N]{>s1xH-um');
define('SECURE_AUTH_KEY',  'FC:Zh$Bb6KQDz1?((!KucGxynja~6hnzYB@vlTGR:v|WsaH&* m-zH3T6HMOQZIi');
define('LOGGED_IN_KEY',    ';W4{8i}XUgm2yrJm;DiL]Im)RT]h#(UvVxj<a5#xR{w5Bz34VXznmP@&0h#B6-xc');
define('NONCE_KEY',        '`KWKw#S_~Z(BzZ53%Ur)D)RrVqV 9N;-lavOU^OlC--)e{t[`nWluj[r4CTx=h^N');
define('AUTH_SALT',        '|66_^xSpShb6*F,[{( c:@Fqv:N +c9!+Zok+^cn9_/S&[L.9UbSsW[.3ViT.:YN');
define('SECURE_AUTH_SALT', 'w[S^z-bt:_g6+,nR4f0NjTv71, .4!E+-5sa{0=UEuVAuF9R^Y`lg=~=I_a<dP&b');
define('LOGGED_IN_SALT',   '!r,De}Lg@{e`/bMy%ga_[IVQ#el?!^pki TV0`+8XP_pdj|iIu*YHy<|<lv07Zqg');
define('NONCE_SALT',       'u(+bh4,,z`iJ{hmE<8Xne+WB_-zgbH*2l`~xyi|V]l/Y?Z2^f-)tU`I1(0)]U].z');

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
