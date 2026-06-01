<?php
if (preg_match("/test\.ioudou\.co\.jp/", $_SERVER["SERVER_NAME"])) {
} elseif (preg_match("/ioudou\.co\.jp/", $_SERVER["SERVER_NAME"])) {
} else {
	define('DB_NAME', 'xxxxxx');
	define('DB_USER', 'spadmin');
	define('DB_PASSWORD', '$Fe8wrXL');
	define('DB_HOST', '127.0.0.1');
	define('WP_DEBUG', true);
}

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// https://api.wordpress.org/secret-key/1.1/salt/

$table_prefix = 'wp_xxxxx_';

define('WP_DEBUG', true);
define('DISALLOW_FILE_EDIT', true);


/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
