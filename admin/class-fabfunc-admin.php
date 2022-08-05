<?php

class Fabfunc_Admin {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu() {
		add_menu_page( __( 'Fabfunc Main Page', 'fabfunc' ), __( 'Fabfunc', 'fabfunc' ), 'manage_options', 'fabfunc-main', array( $this, 'render_main_page' ), 'dashicons-welcome-learn-more' );
	}

	public function render_main_page() {
		require_once FABFUNC_PLUGIN_DIR . 'admin/templates/main-page.php';
	}

	public static function get_content() {
		global $wpdb;
		return $wpdb->get_row( "SELECT content FROM fabfunc_tbl", ARRAY_A );
	}

}
