<?php

class Fabfunc_Admin {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_post_save_content', array( $this, 'save_content' ) );
	}

	public function admin_menu() {
		add_menu_page( __( 'Fabfunc Main Page', 'fabfunc' ), __( 'Fabfunc', 'fabfunc' ), 'manage_options', 'fabfunc-main', array( $this, 'render_main_page' ), 'dashicons-welcome-learn-more' );
	}

	public function render_main_page() {
		require_once FABFUNC_PLUGIN_DIR . 'admin/templates/main-page.php';
	}

	public static function get_content() {
		global $wpdb;
		return $wpdb->get_row( "SELECT * FROM fabfunc_tbl", ARRAY_A );
	}

	public function save_content() {
		if ( ! isset( $_POST['fabfunc_nonce'] ) || ! wp_verify_nonce( $_POST['fabfunc_nonce'], 'fabfunc_action' ) ) {
			wp_die( __( 'Error!', 'fabfunc' ) );
		}

		$content = isset( $_POST['fabfunc_content'] ) ? trim( wp_unslash( $_POST['fabfunc_content'] ) ) : '';
		$id = isset( $_POST['fabfunc_id'] ) ? (int) $_POST['fabfunc_id'] : 0;

		global $wpdb;
		$query = "UPDATE fabfunc_tbl SET content = %s WHERE id = $id";
		$wpdb->query( $wpdb->prepare( $query, $content ) );

		wp_redirect( $_POST['_wp_http_referer'] );
		exit;
	}

}
