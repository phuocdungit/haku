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

define('DB_NAME', 'haku');



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

define('AUTH_KEY',         '@+V9jodek!-4-o6(CG.[Jw|)lln.?xL%R2+ymZO8q10))e@(%lrg6?vKSmwa@`S3');

define('SECURE_AUTH_KEY',  'aoZ}hhYXBm+qZEqhdUBRu&$=#7n2hv?^![!u%mHA]7/T`O2AjWo)Mmq,Bj`OKdis');

define('LOGGED_IN_KEY',    'O`zfR+TdpPOSj}qT#X;%.t G0uA:;s@0s%]5S{1#FMBFX&m[84L?K=H5<zVh1+`C');

define('NONCE_KEY',        '4k;[j: &wjSNdYfmtW9u[V5@NthGAxxHAZoPXBCoKm3>GCY,`j@!c@gi9xFDP9ik');

define('AUTH_SALT',        'a7cA^;{O[>7/B9n@w9IB##t{NSkd4br/QQj<M2DggD(OVa`ON<IEKK%NJZy2q^],');

define('SECURE_AUTH_SALT', 'zly+#0b&D_GZ#8Td(Q%#Y:I*<Uo/qVCg:r#=39d*;iVYT@f:>Szc%AMfoUkGkk!l');

define('LOGGED_IN_SALT',   'UwCjJ0H<iK]yH(o2M*1_gNw J%(GrWO<QsBqzyMeU-BPaQr4Efa%# zqs]Eyombe');

define('NONCE_SALT',       '9dc|Ir.zeYZGF1@Qd:)4gnshp8g9~*z6d(`%U~`n_[JVh@Fge*D$*JdF+Q,YDsrV');

define( 'WP_SITEURL','http://'.$_SERVER['SERVER_NAME'] );
define( 'WP_HOME','http://'.$_SERVER['SERVER_NAME'] );

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

