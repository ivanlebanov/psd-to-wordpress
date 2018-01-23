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
define('DB_NAME', 'wordpress_test');

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
define('AUTH_KEY',         '()>*znTB^+a&xkaDn/uD~0rv1j.A,ga3b|?eB+qKVQYL>H.oeEpL9b`O7U,mK8[`');
define('SECURE_AUTH_KEY',  'W%k9R[}!h3@4{|wcMy<q/q=l+2sa*GzokSiVc{,Uy>ZM03^@xzEo~-lXL`Pj4o$+');
define('LOGGED_IN_KEY',    '$.4[PI~~qU;-Of5?0!g@:_v7?&xeIwe{7tw0AguO&$XCC>) H5@+E12<Oqd.;678');
define('NONCE_KEY',        '@($T9SA+My%p))1VjRP{G_=VKE#DKkcnr{Hm!{r`ZTipX<P`L.55zuHu(BlS)+M6');
define('AUTH_SALT',        '5:jrYHam*tt[bhEH^Dl m60</@) ZkA9@&VHjRZU(GgrN40q=,kuX-bNxJ!aR-0<');
define('SECURE_AUTH_SALT', '* m%K$dT*~P !,OWFrG>rbm5Jd*nG&;;pwllWnsw#^zYxXE001L]{MV4S]WYw=}L');
define('LOGGED_IN_SALT',   'PT+AV3&y$J=dlQ2Ii<f-!No]{^DS{iYp0F)C&:kP+BsN)lbFH/a{EWb70Ta1CmgH');
define('NONCE_SALT',       'J`U^.YDh`T!>CfmVv`#ll$~`0An3STzAaiWxZkWCl8R+^J$:JUE2m%:h{pOZO(%e');

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
