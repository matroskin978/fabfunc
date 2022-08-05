<?php

class Fabfunc_Activate {

	public static function activate() {
		global $wpdb;
		$wpdb->query( "CREATE TABLE IF NOT EXISTS `fabfunc_tbl` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci" );
	}

}
